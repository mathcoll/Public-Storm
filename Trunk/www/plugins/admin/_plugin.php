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

final class admin extends Plugins {
	public static $adminMenu = array();
 	public static $subdirs = array('admin', 'install-plugin');
 	public static $name = "admin";
 	
	public function __construct() {
		require(Settings::getVar('prefix') . 'conf/admin.php');
		if( @$_SESSION['isadmin'] == 1 ) {
			Settings::addCss('admin', rtrim(Settings::getVar('ROOT'), "/").Settings::getVar('theme_dir').'plugins/admin/styles/admin.css', 'admin.css');
		}
	}
	
	/**
	 * send an email to the admin with the 'aboutcron' plugin
	 */
	public function sendMailToAdmin($vars, $cronId) {
		$sPlugAboutCron = new Settings::$VIEWER_TYPE;
		require(Settings::getVar('inc_dir') . "phpMailer/class.phpmailer.php");
		$mail    = new PHPMailer();
		$sPlugAboutCron->AddData("base_url_http", Settings::getVar('base_url_http'));
		$sPlugAboutCron->AddData("theme_dir", Settings::getVar('theme_dir'));
		$sPlugAboutCron->AddData("theme_dir_http", Settings::getVar('theme_dir_http'));
		$sPlugAboutCron->AddData("vars", json_decode($vars, true));
		i18n::setLocale("fr_FR.utf8");
		$body = $sPlugAboutCron->fetch('sendMailToAdmin.tpl', 'plugins/admin/mails/');
		//print $body; exit;
		$mail->From     = Settings::getVar('From');
		$mail->FromName = Settings::getVar('FromName');
		$mail->Mailer = Settings::getVar('Mailer');
		$mail->Host = Settings::getVar('Host');
		$mail->Subject = i18n::_("sendMailToAdmin");
		$mail->AltBody = i18n::_("To view the message, please use an HTML compatible email viewer!");
		$mail->CharSet = 'utf-8';
		$mail->MsgHTML($body);
		$mail->AddAddress(Settings::getVar('From'), Settings::getVar('FromName'));

		if ( $mail->Send() ) {
			aboutcron::removeAction($cronId);
			//aboutcron::addAction(array("admin::sendMailToAdmin", json_encode(array("var1"=>"1","var2"=>"2")), time()+3600));
		}
	}
	
	public function initAdminMenu()
	{
		return true;
	}
	
	public static function getAllUsers($from=0, $nombre=5)
	{
		return self::$db->getAllUsers($from, $nombre);
	}
	
	public static function addAdminMenu($menu) {
		array_push(self::$adminMenu, $menu);
		return self::$adminMenu;
	}
	
	public static function getAdminMenu() {
		return self::$adminMenu;
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