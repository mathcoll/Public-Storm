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

final class users extends Plugins {
 	public static $subdirs = array(
 		'users',
 		'utilisateurs'
 	);
 	public static $name = "users";
	public static $db;
 	
	public function __construct() {
		require(Settings::getVar('prefix') . 'conf/'.self::$name.'.php');
		Settings::addCss('screen', rtrim(Settings::getVar('ROOT'), "/").Settings::getVar('theme_dir').'plugins/users/styles/users.css', 'screen.css');
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
	
	/**
	 * send an email 1 week the account creation
	 */
	public function plusOneWeek($vars, $cronId) {
		error_reporting(E_ALL);
		$sPlugAboutCron = new Settings::$VIEWER_TYPE;
		Settings::setVar('inc_dir', Settings::getVar('ROOT') . 'include/'); # TODO: why removing the slash before 'include'?
		//print Settings::getVar('inc_dir')."phpMailer/class.phpmailer.php\n\n";
		//$f = new file(Settings::getVar('inc_dir')."phpMailer/class.phpmailer.php");
		//print "\n-->".$f->IsWritable()."<--\n"; 
		require(Settings::getVar('inc_dir') . "phpMailer/class.phpmailer.php");

		$mail    = new PHPMailer();
		$sPlugAboutCron->AddData("base_url_http", Settings::getVar('base_url_http'));
		$sPlugAboutCron->AddData("theme_dir", Settings::getVar('theme_dir'));
		$sPlugAboutCron->AddData("theme_dir_http", Settings::getVar('theme_dir_http'));
		$sPlugAboutCron->AddData("vars", json_decode($vars, true));
		
		$vars = json_decode(stripslashes($vars), true);
		// get user Infos from the login
		$thisUser = self::getUserInfos($vars["login"]);

		if ( !is_null($thisUser["email"]) ) {
			//print_r($thisUser);
			$sPlugAboutCron->AddData("prenom", $thisUser["prenom"]);
			$sPlugAboutCron->AddData("nom", $thisUser["nom"]);
			$sPlugAboutCron->AddData("email", $thisUser["email"]);
			$sPlugAboutCron->AddData("login", $thisUser["login"]);
			i18n::setLocale($thisUser["lang"]);
			$body = $sPlugAboutCron->fetch('plusOneWeek.tpl', 'plugins/users/mails/');
			
			$mail->From     = Settings::getVar('From');
			$mail->FromName = Settings::getVar('FromName');
			$mail->Mailer = Settings::getVar('Mailer');
			$mail->Host = Settings::getVar('Host');
			$mail->Subject = i18n::_("Membre de Public-Storm depuis plus d'une semaine !");
			$mail->AltBody = i18n::_("To view the message, please use an HTML compatible email viewer!");
			$mail->CharSet = 'utf-8';
			$mail->MsgHTML($body);
			$mail->AddAddress($thisUser["email"], $thisUser["prenom"]." ".$thisUser["nom"]);
			//$mail->AddAddress(Settings::getVar('From'), $thisUser["prenom"]." ".$thisUser["nom"]);
			
			//print $body.$thisUser["email"]; exit;
			try {
				if( DEV ) {
					print i18n::L("DEV mode: on => no mail sent")."<br />\n";
				} elseif ( @$mail->Send() ) {
					//print $cronId."<----------";
					print i18n::L("Mail sent")."<br />\n";
					aboutcron::removeAction($cronId);
				}
			} catch (Exception $e) {
				print i18n::L("Failed to send mail")."<br />\n";
			}
		} else {
			aboutcron::removeAction($cronId);
			print i18n::L("Email was not found ; We had removed the cron from the list.")."<br />\n";
		}

		return true;
	}
	
	/**
	 * send an email 2 weeks the account creation
	 */
	public function plusTwoWeeks($vars, $cronId) {
		error_reporting(E_ALL);
		$sPlugAboutCron = new Settings::$VIEWER_TYPE;
		Settings::setVar('inc_dir', Settings::getVar('ROOT') . 'include/'); # TODO: why removing the slash before 'include'?
		//print Settings::getVar('inc_dir')."phpMailer/class.phpmailer.php\n\n";
		//$f = new file(Settings::getVar('inc_dir')."phpMailer/class.phpmailer.php");
		//print "\n-->".$f->IsWritable()."<--\n"; 
		require(Settings::getVar('inc_dir') . "phpMailer/class.phpmailer.php");

		$mail    = new PHPMailer();
		$sPlugAboutCron->AddData("base_url_http", Settings::getVar('base_url_http'));
		$sPlugAboutCron->AddData("theme_dir", Settings::getVar('theme_dir'));
		$sPlugAboutCron->AddData("theme_dir_http", Settings::getVar('theme_dir_http'));
		$sPlugAboutCron->AddData("vars", json_decode($vars, true));
		
		$vars = json_decode(stripslashes($vars), true);
		// get user Infos from the login
		$thisUser = self::getUserInfos($vars["login"]);

		if ( !is_null($thisUser["email"]) ) {
			//print_r($thisUser);
			$sPlugAboutCron->AddData("prenom", $thisUser["prenom"]);
			$sPlugAboutCron->AddData("nom", $thisUser["nom"]);
			$sPlugAboutCron->AddData("email", $thisUser["email"]);
			$sPlugAboutCron->AddData("login", $thisUser["login"]);
			i18n::setLocale($thisUser["lang"]);
			$body = $sPlugAboutCron->fetch('plusTwoWeeks.tpl', 'plugins/users/mails/');
			
			$mail->From     = Settings::getVar('From');
			$mail->FromName = Settings::getVar('FromName');
			$mail->Mailer = Settings::getVar('Mailer');
			$mail->Host = Settings::getVar('Host');
			$mail->Subject = i18n::_("Membre de Public-Storm depuis plus de 2 semaines !");
			$mail->AltBody = i18n::_("To view the message, please use an HTML compatible email viewer!");
			$mail->CharSet = 'utf-8';
			$mail->MsgHTML($body);
			$mail->AddAddress($thisUser["email"], $thisUser["prenom"]." ".$thisUser["nom"]);
			$mail->AddAddress(Settings::getVar('From'), $thisUser["prenom"]." ".$thisUser["nom"]);
			//$mail->AddAddress(Settings::getVar('From'), $thisUser["prenom"]." ".$thisUser["nom"]);
			
			//print $body.$thisUser["email"]; exit;
			try {
				if( DEV ) {
					print i18n::L("DEV mode: on => no mail sent")."<br />\n";
				} elseif ( @$mail->Send() ) {
					//print $cronId."<----------";
					print i18n::L("Mail sent")."<br />\n";
					aboutcron::removeAction($cronId);
				}
			} catch (Exception $e) {
				print i18n::L("Failed to send mail")."<br />\n";
			}
		} else {
			aboutcron::removeAction($cronId);
			print i18n::L("Email was not found ; We had removed the cron from the list.")."<br />\n";
		}
		return true;
	}

	/**
	 * Get the list of a user meta datas
	 * @return list of datas
	 */
	public function getMetaData($filter=null) {
		if ( isset($_SESSION['id']) ) {
			if ( isset($filter) ) {
				$metaDatas = self::$db->q2("SELECT meta_name, meta_value FROM metas WHERE user_id = :user_id and meta_name=:meta_name", "users.db", array(":user_id" => $_SESSION['id'], "meta_name" => $filter));
			} else {
				$metaDatas = self::$db->q2("SELECT meta_name, meta_value FROM metas WHERE user_id = :user_id", "users.db", array(":user_id" => $_SESSION['id']));
			}
			//print_r($metaDatas);
			return $metaDatas[0];
		} else {
			return null;
		}
	}

	/**
	 * Set the list of a user meta datas
	 * @return boolean
	 */
	public function setMetaData($name, $value) {
		if ( isset($_SESSION['id']) && isset($name) && isset($value ) ) {
			$metaDatas = self::$db->q2("INSERT OR REPLACE INTO metas (meta_name, meta_value, meta_id, user_id) VALUES (:name, :value, (SELECT meta_id from metas where meta_name=:name AND user_id=:user_id), :user_id);", "users.db", array(":name" => $name, ":value" => $value, ":user_id" => $_SESSION['id']));
			//print_r($metaDatas);
			return true;
		} else {
			return false;
		}
	}
	
	public function getUserInfos($username) {
		$user = self::$db->q2("SELECT u.nom, u.prenom, u.email, u.login, u.lang FROM users u WHERE u.login = :username", "users.db", array(":username" => $username));
		return $user[0];
	}
	
	public function addToFavorites($storm_id) {
		if ( isset($_SESSION['id']) ) {
			$favorite = self::$db->q2("INSERT INTO favorites (user_id, storm_id) VALUES (:user_id, :storm_id)", "users.db", array(":user_id" => $_SESSION['id'], ":storm_id" => $storm_id));
			return $favorite[0];
		} else {
			return null;
		}
	}
	
	public function removeFromFavorites($storm_id) {
		if ( isset($_SESSION['id']) ) {
			$favorite = self::$db->q2("DELETE FROM favorites WHERE user_id=:user_id AND storm_id=:storm_id", "users.db", array(":user_id" => $_SESSION['id'], ":storm_id" => $storm_id));
			return $favorite[0];
		} else {
			return null;
		}
	}
	
	public function isFavorites($storm_id) {
		if ( isset($_SESSION['id']) ) {
			$favorite = self::$db->q2("SELECT count(storm_id) as c FROM favorites WHERE user_id=:user_id AND storm_id=:storm_id", "users.db", array(":user_id" => $_SESSION['id'], ":storm_id" => $storm_id));
			return $favorite[0]["c"];
		} else {
			return null;
		}
	}
	
	public function getMyFavorites() {
		if ( isset($_SESSION['id']) ) {
			$favorites = self::$db->q2("SELECT storm_id FROM favorites WHERE user_id=:user_id", "users.db", array(":user_id" => $_SESSION['id']));
			return $favorites;
		} else {
			return null;
		}
	}
	
	public function getUsersList() {
		$users = self::$db->q2("SELECT u.nom, u.prenom, u.email, u.login FROM users u", "users.db", array());
		return $users;
	}
	
	public function loadLang() {
		return parent::loadLang(self::$name);
	}	
	
	public function getVersion() {
		return parent::getVersion();
	}
	
	public function getName() {
		return self::$name;
	}
	
	public function getDescription() {
		return parent::getDescription();
	}
	
	public function getAuthor() {
		return parent::getAuthor();
	}
	
	public function getIcon() {
		return parent::getIcon(self::$name);
	}
	
	public function getStatus() {
		return parent::getStatus(self::$name);
	}
	
	public function getSubDirs() {
		return self::$subdirs;
	}
}


?>