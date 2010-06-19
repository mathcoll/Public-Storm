<?php
/*---------------------------------------------------------------------
/   This script will tell you how to install SourceGuardian loaders   /
/                  http://www.sourceguardian.com/                     /
---------------------------------------------------------------------*/

	$LOADER_VER_REQUIRED = '5.0';



?>
<BODY bgcolor="white">
<BASEFONT face="Tahoma, Sans-serif, Arial, Helvetica, Verdana">
<H2>How to install <A HREF="http://www.sourceguardian.com/">SourceGuardian</A> loaders</H2>
<?php

function ondebug(){
  echo "Your PHP engine is compiled in DEBUG mode.<BR>";
  echo "This mode was designed for debug PHP engine but not for production servers.<BR>";
  echo "You should install normal PHP engine which is available from ";
  echo '<A HREF="http://www.php.net/">http://www.php.net/</A>.';
}
function nortl($reason){
  echo '<H3>Run-time loading</H3>';
  echo 'Run-time loading is not possible because of <B>'.$reason.'</B>.<BR>';
  echo 'Use server-wide setup or re-configure PHP engine.';
}
function rtl($pack,$ixed_dir){
  echo '<H3>Run-time loading</H3>';
  echo '<OL>';
  echo '<LI>Download '.$pack.'</LI>';
  echo '<LI>Extract it to folder <B>'.$ixed_dir.'</B></LI>';
  echo '</OL>';
}
function sws($pack,$ext_dir,$php_ini,$loader){
  echo '<H3>Server-wide setup</H3>';
  echo '<OL>';
  echo '<LI>Download '.$pack.'</LI>';
  echo '<LI>Extract it to folder <B>'.$ext_dir.'</B></LI>';
  echo '<LI>Edit PHP.INI file (located at <B>'.$php_ini.'</B>) and add following line:<BR>';
  echo '<B>extension='.$loader.'</B></LI>';
  echo '</OL>';
}
function nosws($reason){
  echo '<H3>Server-wide setup</H3>';
  echo 'Server-wide setup is not possible because of <B>'.$reason.'</B>.<BR>';
}
function unknown_os(){
  echo 'Probably this operating system is not yet supported by SourceGuardian.<BR>';
  echo 'Please visit support section at <A HREF="http://www.sourceguardian.com/">SourceGuardian home</A>.';
}
function get_pack_link($os_alias, $ext, $text = ''){
  return '<A HREF="http://www.sourceguardian.com/ixeds/ixed4.'.$os_alias.$ext.'">ixed4.'.$os_alias.$ext.' '.$text.'</A> ';
}

  $nl='<BR>';

 if (function_exists("sg_load")){

  			echo "SourceGuardian loaders are already installed."."\n";
  			exit;

  }

  $uname=php_uname();
  $os=substr($uname,0,strpos($uname,' '));  
  $os_alias=strtolower(substr($uname,0,3));
  
  $zts=0;
  $php_ini='';
  $safe_mode=ini_get('safe_mode');
  $disable_functions=explode(',',ini_get('disable_functions'));
  $dl_disabled=(in_array('dl',$disable_functions) || 
                in_array('phpversion',$disable_functions) ||
                in_array('php_uname',$disable_functions) ||
                in_array('ini_get',$disable_functions) ||
                in_array('dirname',$disable_functions));
  $cur_dir=dirname(__FILE__);
  $debug=0;
  $php_ver = phpversion();
  $php_ver = substr($php_ver,0,strrpos($php_ver,'.'));
 
  $sapi=php_sapi_name();

  ob_start();
  phpinfo(INFO_GENERAL);
  $php_info=ob_get_contents();
  ob_end_clean();

  $info=split("\n",$php_info);
  while (list($key,$val)=each($info)){
    if (eregi('command',$val)) continue;
    if (eregi('thread safety.*(enabled|yes)',$val)) $zts=1;
    if (eregi('debug.*(enabled|yes)',$val)) $debug=1;
    if (eregi('configuration file.*(</B></td><TD ALIGN="left">| => |v">)([^ <]*)(.*</td.*)?',
      $val,$match)) $php_ini=$match[2];
  }

  if ($debug) {
    ondebug();
    exit();
  }

  $dl=1;
  $dl_reason='unknown';
  if ($zts){
    if ((substr($sapi,0,3)!='cgi') and ($sapi!="cli") and (substr($sapi,0,5)!='embed')) {
      $dl=0;
      $dl_reason='thread safety';
    }
  }
  
  if ($safe_mode) {
    $dl=0;
    $dl_reason='safe mode';
  }
  if ($dl_disabled) {
    $dl=0;
    $dl_reason='following functions should NOT be disabled - dl(), phpversion(), php_uname(), ini_get(), dirname()';
  }

  $ext=(($os_alias=='win') || ($os_alias=='dar'))?'.zip':'.tar.gz';
  $loader='ixed.'.$php_ver.(($zts && ($os_alias!='win'))?'ts':'').'.'.$os_alias;
  $ext_dir=realpath(ini_get('extension_dir'));

  if (version_compare(PHP_VERSION, '5.2.4', '>')) {
    $dl=0;
    $dl_reason="Automatic loading is not possible on your machine.
To install the SourceGuardian loader on this machine you need to copy the $loader file to the $ext_dir directory (extension_dir). 
No need for changing the php.ini PHP configuration file as dynamic loading is allowed and the loader will be used from extension_dir.";
  }

  if(!$ext_dir) {
    $dl = 0;
    $dl_reason = 'extension_dir does not exists';
    nosws($dl_reason);
    nortl($dl_reason);
  } else {
    switch($os_alias) {
      case 'win':
        $pack=get_pack_link($os_alias, $ext); 
        sws($pack,$ext_dir,$php_ini,$loader);
        if ($dl){
          $ixed_dir=$cur_dir.'\\ixed\\';
          rtl($pack,$ixed_dir);
        } else 
          nortl($dl_reason);
        break;

      case 'lin':
        $pack=get_pack_link($os_alias.'.x86-32', $ext, '(for Intel x86 32-bit processor)').' or '.
              get_pack_link($os_alias.'.x86-64', $ext, '(for Intel x86 64-bit processor)');
        sws($pack,$ext_dir,$php_ini,$loader);
        if ($dl){
          $ixed_dir=$cur_dir.'/ixed/';
          rtl($pack,$ixed_dir);
        } else 
          nortl($dl_reason);
        break;

      case 'fre':
        $pack=get_pack_link($os_alias, $ext, '(for Intel x86 32-bit processor)').' or '.
              get_pack_link($os_alias.'.x86-64', $ext, '(for Intel x86 64-bit processor)');
        sws($pack,$ext_dir,$php_ini,$loader);
        if ($dl){
          $ixed_dir=$cur_dir.'/ixed/';
          rtl($pack,$ixed_dir);
        } else 
          nortl($dl_reason);
        break;

      case 'sun':
        $pack=get_pack_link($os_alias.'.x86-32', $ext, '(for Intel x86 32-bit processor)').' or '.
              get_pack_link($os_alias.'.x86-64', $ext, '(for Intel x86 64-bit processor)').' or '.
              get_pack_link($os_alias.'.sparc-32', $ext, '(for SPARC 32-bit processor)').' or '.
              get_pack_link($os_alias.'.sparc-64', $ext, '(for SPARC 64-bit processor)');
        sws($pack,$ext_dir,$php_ini,$loader);
        if ($dl){
          $ixed_dir=$cur_dir.'/ixed/';
          rtl($pack,$ixed_dir);
        } else 
          nortl($dl_reason);
        break;

      case 'hp-':
        $pack=get_pack_link('hp.risc', $ext, '(for HP PA-RISC processor)');
        sws($pack,$ext_dir,$php_ini,$loader);
        if ($dl){
          $ixed_dir=$cur_dir.'/ixed/';
          rtl($pack,$ixed_dir);
        } else 
          nortl($dl_reason);
        break;

      case 'dar':
        $pack=get_pack_link($os_alias, $ext); 
        sws($pack,$ext_dir,$php_ini,$loader);
        if ($dl){
          $ixed_dir=$cur_dir.'/ixed/';
          rtl($pack,$ixed_dir);
        } else 
          nortl($dl_reason);
        break;

      default:
        unknown_os();
    }
  }
?>

