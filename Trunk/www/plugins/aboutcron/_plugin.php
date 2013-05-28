<?php
/*
    Public-Storm
    Copyright (C) 2008-2012 Mathieu Lory <mathieu@internetcollaboratif.info>
    This file is part of Public-Storm.

    Public-Storm is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    Public-Storm is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Public-Storm. If not, see <http://www.gnu.org/licenses/>.
 */

final class aboutcron extends Plugins {
 	public static $subdirs = array("aboutcron");
 	public static $name = "aboutcron";
	public static $db;
 	
	public function __construct() {
		require(Settings::getVar('prefix') . 'conf/aboutcron.php');
		if( @$_SESSION['isadmin'] == 1 ) {
			Settings::addCss('screen', rtrim(Settings::getVar('ROOT'), "/").Settings::getVar('theme_dir').'plugins/'.self::$name.'/styles/admin.css', 'admin.css');
		}
		if ( !class_exists(Settings::$DB_TYPE) ) {
			Debug::Log("Classe introuvable : ".Settings::$DB_TYPE, ERROR, __LINE__, __FILE__);
		} else {
			if ( self::$db = new Settings::$DB_TYPE ) {
				return true;
			} else {
				Debug::Log($err, ERROR, __LINE__, __FILE__);
				return false;
				exit($err);
			}
		}
	}
	
	public function initAdminMenu() {
		admin::addAdminMenu(array(i18n::L("Crontab list"), "cronlist", "cronlist"));
		return true;
	}
	
	/**
	 * get the list of the actions to be done now 
	 */
	public static function getActions() {
		$query = sprintf("SELECT * FROM crontab WHERE time <= %s", Database::escape_string(time()));# TODO !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		//print $query."<br />";
		$rows = self::$db->q($query, "aboutcron.db", array());
		return is_array($rows)?$rows:false;
	}
	
	/**
	 * play an action
	 */
	public static function playAction($command, $parameters, $id) {
		$com = explode("::", $command);
		$method = $com[1];
		Settings::setVar('prefix', "./"); # TODO : why ????
		$class = new $com[0];
		//print $com[0]."->".$method."<br />\n";
		//print "------>".(($parameters))."<br />\n";
		//print_r($com);
		return $class->$method($parameters, $id);
	}
	
	/**
	 * add an action to the triggers queue 
	 */
	public static function addAction($datas) {
		$q = "INSERT INTO crontab (command, parameters, time) VALUES ('%s', '%s', '%s')";
		$query = sprintf($q, Database::escape_string($datas[0]), Database::escape_string($datas[1]), Database::escape_string($datas[2]));
		if ( DEBUG ) {
			Debug::Log("Erreur addAction".$query, SQL, __LINE__, __FILE__);
		}
		return is_array(self::$db->q($query, "aboutcron.db", array()))?true:false;
	}
	
	/**
	 * remove an action from the triggers queue 
	 */
	public static function removeAction($id) {
		$query = "DELETE FROM crontab WHERE id=%s";
		self::$db->q($query, "aboutcron.db", array(Database::escape_string($id)));
		return true;
	}
	
	/**
	 * get the list of all the actions
	 */
	public static function getCrons($from=0, $nombre=5) {
		$query = sprintf("SELECT * FROM crontab ORDER BY time ASC LIMIT %d, %d", $from, $nombre);
		$rows = self::$db->q($query, "aboutcron.db", array());
		return is_array($rows)?$rows:false;
	}
	
	/**
	 * get the number of crons in the queue
	 */
	public static function getNbCrons() {
		$query = "SELECT * FROM crontab";
		$rows = self::$db->q($query, "aboutcron.db", array());
		return is_array($rows)?sizeOf($rows):false;
	}
	
	/**
	 * Test the aboutCron feature by sending an email
	 */
	public static function testAboutCron($vars, $id) {
		$sPlugAboutCron = new Settings::$VIEWER_TYPE;
		require(Settings::getVar('inc_dir') . "phpMailer/class.phpmailer.php");
		$mail    = new PHPMailer();
		$sPlugAboutCron->AddData("base_url", Settings::getVar('base_url_http'));
		$sPlugAboutCron->AddData("theme_dir", Settings::getVar('theme_dir'));
		$sPlugAboutCron->AddData("theme_dir_http", Settings::getVar('theme_dir_http'));
		$sPlugAboutCron->AddData("vars", json_decode($vars, true));
		$body = $sPlugAboutCron->fetch('testAboutCron.tpl', 'plugins/aboutcron/mails/');
		//print $body; exit;
		$mail->From     = Settings::getVar('From');
		$mail->FromName = Settings::getVar('FromName');
		$mail->Mailer = Settings::getVar('Mailer');
		$mail->Host = Settings::getVar('Host');
		$mail->Subject = i18n::_("testAboutCron");
		$mail->AltBody = i18n::_("To view the message, please use an HTML compatible email viewer!");
		$mail->CharSet = 'utf-8';
		$mail->MsgHTML($body);
		$mail->AddAddress(Settings::getVar('From'), Settings::getVar('FromName'));

		if ( !$mail->Send() ) {
			//Settings::setVar('message', i18n::_("Failed to send mail", array($datas['email'])));
			//$_SESSION["message"] = i18n::_("Failed to send mail", array($datas['email']));
		} else {
			self::removeAction($id);
		}
	}
	
	public function loadLang()
	{
		return parent::loadLang(self::$name);
	}
	
	public function getVersion()
	{
		return parent::getVersion();
	}
	
	public function getName()
	{
		return self::$name;
	}
	
	public function getDescription()
	{
		return parent::getDescription();
	}
	
	public function getAuthor()
	{
		return parent::getAuthor();
	}
	
	public function getSubDirs()
	{
		return self::$subdirs;
	}
	
	public function activer()
	{
	}
	
	public function desactiver()
	{
	}
}

?>