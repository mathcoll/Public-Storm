<?php
/*
    Public-Storm
    Copyright (C) 2008-2011 Mathieu Lory <mathieu@internetcollaboratif.info>
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
    
    Project started on 2008-11-22 with help from Serg Podtynnyi
    <shtirlic@users.sourceforge.net>
 */

/**
 * @package    Public-Storm
 * @subpackage User
 * @author     Mathieu Lory <mathieu@internetcollaboratif.info>
 */

if (basename($_SERVER["SCRIPT_NAME"])==basename(__FILE__))die();


final class User
{
	public static $id;
	public static $uid;
	public static $prenom;
	public static $nom;
	public static $email;
	public static $avatar;
	public static $subscription_date;
	public static $login;
	public static $lang;
	public static $sessionId;
	public static $password;
	public static $current;
	public static $db;
	public static $persistent;
	public static $logged;
	public static $isadmin;

	public function __construct()
	{
		if ( !class_exists(Settings::$DB_TYPE) )
		{
			Debug::Log("Classe introuvable : ".Settings::$DB_TYPE, ERROR);
		}
		else
		{
			if ( self::$db = new Settings::$DB_TYPE )
			{
				return true;
			}
			else
			{
				Debug::Log($err, ERROR);
				return false;
				exit($err);
			}
		}
	}

	public static function isLogged()
	{
		if ( empty($_SESSION['id']) || $_SESSION['id'] == 0 )
		{
			self::$logged = false;
			return false;
		}
		else
		{
			self::$logged = true;
			return $_SESSION['id'];
		}
	}
	
	public static function GetById($id)
	{
		$obj = new User();
		return $obj;
	}
	
	public static function setLang($lang)
	{
		self::$lang = $lang;
		self::$db->setLang(self::$lang, $_SESSION['id']);
		return self::$lang;
	}
	
	public static function sendWelcomeMail($datas, $s)
	{
		require(Settings::getVar('inc_dir') . "phpMailer/class.phpmailer.php");
		
		$mail    = new PHPMailer();
		$user_infos = array();
		$user_infos['prenom'] = $datas['prenom'];
		$user_infos['nom'] = $datas['nom'];
		$user_infos['email'] = $datas['email'];
		$user_infos['login'] = $datas['login'];
		$user_infos['password'] = $datas['password'];
		$s->AddData("user_infos", $user_infos);
		$s->AddData("base_url", Settings::getVar('base_url_http'));
		$s->AddData("theme_dir", Settings::getVar('theme_dir'));
		#$s->AddData("i18n", i18n::getLng());
		$s->AddData("subject", i18n::_("inscription.subject"));
		
		$body = $s->fetch('nouveau-compte.tpl', 'plugins/users/mails/');
		
		$mail->From     = Settings::getVar('From');
		$mail->FromName = Settings::getVar('FromName');
		$mail->Mailer = Settings::getVar('Mailer');
		$mail->Host = Settings::getVar('Host');
		$mail->Subject = i18n::_("inscription.subject");
		$mail->AltBody = i18n::_("To view the message, please use an HTML compatible email viewer!");
		$mail->CharSet = 'utf-8';
		$mail->MsgHTML($body);
		$mail->AddAddress($user_infos['email'], $user_infos['prenom']." ".$user_infos['nom']);
		
		if( !$mail->Send() )
		{
			Settings::setVar('message', i18n::_("Failed to send mail", array($datas['email'])));
			$_SESSION["message"] = i18n::_("Failed to send mail", array($datas['email']));
		}
		else
		{
			Settings::setVar('message', i18n::_("Mail sent"));
			$_SESSION["message"] = i18n::_("Mail sent");
		}
	}

	public static function userResendPassword($datas, $s)
	{
		require(Settings::getVar('inc_dir') . "phpMailer/class.phpmailer.php");
		
		$mail    = new PHPMailer();
		$user_infos = array();
		$user_infos['email'] = $datas['email'];
		$user_infos['login'] = $datas['login'];
		$user_infos['prenom'] = $datas['prenom'];
		$user_infos['nom'] = $datas['nom'];
		$user_infos['password'] = $datas['password'];
		$s->AddData("user_infos", $user_infos);
		$s->AddData("subject", i18n::_("fogotten_password.subject"));
		
		$body = $s->fetch('fogotten-password.tpl', 'plugins/users/mails/');
		
		$mail->From     = Settings::getVar('From');
		$mail->FromName = Settings::getVar('FromName');
		$mail->Mailer = Settings::getVar('Mailer');
		$mail->Host = Settings::getVar('Host');
		$mail->Subject = i18n::_("fogotten_password.subject");
		$mail->AltBody = i18n::_("To view the message, please use an HTML compatible email viewer!");
		$mail->CharSet = 'utf-8';
		$mail->MsgHTML($body);
		$mail->AddAddress($datas['email'], $datas['prenom']." ".$datas['nom']);
		
		if( !$mail->Send() )
		{
			Settings::setVar('message', i18n::_("Failed to send mail", array($datas['email'])));
			$_SESSION["message"] = i18n::_("Failed to send mail", array($datas['email']));
		}
		else
		{
			Settings::setVar('message', i18n::_("msg confirm mot de passe oublie"));
			$_SESSION["message"] = i18n::_("msg confirm mot de passe oublie");
		}
	}

	public static function authentificationByUid($uid)
	{
		$datas = self::$db->authentificationByUid($uid);
		if ( isset($datas['id']) )
		{
			$sessionId = self::$db->userUpdateSessionId($login, $password_md5);
			//print_r($datas);
			$id = $datas['id'];
			$uid = $datas['uid'];
			$login = $datas['login'];
			$prenom = $datas['prenom'];
			$nom = $datas['nom'];
			$lang = $datas['lang'];
			$email = $datas['email'];
			$avatar = "http://www.gravatar.com/avatar/".md5( strtolower( $email ) )."?default=".urlencode( Settings::getVar('theme_dir')."/img/weather-storm.png" )."&size=50";
			$isadmin = $datas['isadmin'];
			$subscription_date = $datas['subscription_date'];
			self::$current->id = $id;
			self::$sessionId = $sessionId;
			self::$persistent = $persistent == true ? 1 : 0;
			self::$id = $id;
			self::$uid = $uid;
			self::$login = $login;
			self::$prenom = $prenom;
			self::$lang = $lang;
			self::$nom = $nom;
			self::$subscription_date = $subscription_date;
			self::$email = $email;
			self::$avatar = $avatar;
			self::$isadmin = $isadmin;
			$_SESSION['id'] = $id;
			$_SESSION['uid'] = $uid;
			$_SESSION['sessionId'] = $sessionId;
			$_SESSION['login'] = $login;
			$_SESSION['LANG'] = $lang;
			$_SESSION['prenom'] = $prenom;
			$_SESSION['nom'] = $nom;
			$_SESSION['subscription_date'] = $subscription_date;
			$_SESSION['email'] = $email;
			$_SESSION['avatar'] = $avatar;
			$_SESSION['isadmin'] = $isadmin;
			Session::StartUser(User::GetById($id));
			if ( self::$persistent == "1" )
			{
				$end = time() + 3600 * 24 * 15;/* expire dans 15 jours */
				setcookie("persistentConnection", self::$persistent, $end, Settings::getVar("BASE_URL")."/");
				setcookie("uid", self::$uid, $end, Settings::getVar("BASE_URL")."/");
				//header("Set-Cookie: persistentConnection=".$persistent, false, 302);
				//header("Set-Cookie: uid=".User::$uid, false, 302);
			}
			return true;
		}
		else
		{
			return false;
		}
	}

	public static function userLogin($login, $password_md5, $persistent=false)
	{
		self::$persistent = $persistent == true ? 1 : 0;
		$datas = self::$db->userLogin($login, $password_md5);
		if ( isset($datas['id']) )
		{
			$sessionId = self::$db->userUpdateSessionId($login, $password_md5, self::$persistent);
			//print_r($datas);
			$id = $datas['id'];
			$uid = $datas['uid'];
			$prenom = $datas['prenom'];
			$nom = $datas['nom'];
			$lang = $datas['lang'];
			$email = $datas['email'];
			$avatar = "http://www.gravatar.com/avatar/".md5( strtolower( $email ) )."?default=".urlencode( Settings::getVar('theme_dir')."/img/weather-storm.png" )."&size=50";
			$isadmin = $datas['isadmin'];
			$subscription_date = $datas['subscription_date'];
			self::$current->id = $id;
			self::$sessionId = $sessionId;
			self::$id = $id;
			self::$uid = $uid;
			self::$login = $login;
			self::$prenom = $prenom;
			self::$lang = $lang;
			self::$nom = $nom;
			self::$subscription_date = $subscription_date;
			self::$email = $email;
			self::$avatar = $avatar;
			self::$isadmin = $isadmin;
			$_SESSION['id'] = $id;
			$_SESSION['uid'] = $uid;
			$_SESSION['sessionId'] = $sessionId;
			$_SESSION['login'] = $login;
			$_SESSION['LANG'] = $lang;
			$_SESSION['prenom'] = $prenom;
			$_SESSION['nom'] = $nom;
			$_SESSION['subscription_date'] = $subscription_date;
			$_SESSION['email'] = $email;
			$_SESSION['avatar'] = $avatar;
			$_SESSION['isadmin'] = $isadmin;
			Session::StartUser(User::GetById($id));
			if ( self::$persistent == "1" )
			{
				$end = time()+3600*24*15; // expire dans 15 jours
				setcookie("persistentConnection", self::$persistent, $end, Settings::getVar("BASE_URL")."/");
				setcookie("uid", self::$uid, $end, Settings::getVar("BASE_URL")."/");
				//header("Set-Cookie: persistentConnection=".$persistent, false, 302);
				//header("Set-Cookie: uid=".User::$uid, false, 302);
			}
			return true;
		}
		else
		{
			return false;
		}
	}

	public static function getEmailFromLogin($login)
	{
		return self::$db->getEmailFromLogin($login);
	}

	public static function getLoginFromEmail($email)
	{
		return self::$db->getLoginFromEmail($email);
	}

	public static function getNameFromEmail($email)
	{
		return self::$db->getNameFromEmail($email);
	}

	public static function userResetPassword($login)
	{
		return self::$db->userResetPassword($login);
	}
	
	public static function userUpdate($user_infos)
	{
		return self::$db->userUpdate($user_infos);
	}

	public static function userAdd($datas)
	{
		return self::$db->userAdd($datas);
	}

	public static function userExists($login)
	{
		return self::$db->userExists($login);
	}
	
	public static function getAllUsers($from=0, $nombre=5)
	{
		return self::$db->getAllUsers($from, $nombre);
	}

	public static function getNbUsers()
	{
		return self::$db->getNbUsers();
	}

	public static function userLogout()
	{
		self::$current->id = 0;
		self::$id = 0;
		$_SESSION['id'] = NULL;
		$_SESSION['uid'] = NULL;
		$_SESSION['login'] = NULL;
		$_SESSION['sessionId'] = NULL;
		$_SESSION['prenom'] = NULL;
		$_SESSION['nom'] = NULL;
		$_SESSION['email'] = NULL;
		$_SESSION['subscription_date'] = NULL;
		$_SESSION['isadmin'] = NULL;
		$_SESSION['PHPSESSID'] = NULL;
		Session::StartUser(User::GetById(0));
		$end = time()-3600;
		setcookie("persistentConnection", "0", $end, Settings::getVar("BASE_URL")."/");
		setcookie("PHPSESSID", "0", $end, Settings::getVar("BASE_URL")."/");
		setcookie("uid", "0", $end, Settings::getVar("BASE_URL")."/");
		session_regenerate_id(true);
		return true;
	}

}
?>