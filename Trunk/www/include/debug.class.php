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
 * @subpackage Debug
 * @author     Mathieu Lory <mathieu@internetcollaboratif.info>
 */

if (basename($_SERVER["SCRIPT_NAME"])==basename(__FILE__))die(gettext("You musn't call this page directly ! please, go away !"));

/**
 * Some defines for DEBUG
 * 
 * 
 * 
 */
define("DEBUG_FILE_PATH", "./debug.log");
define("NOTICE" ,"NOTICE");
define("WARNING","WARNING");
define("ERROR"  ,"ERROR");
define("SQL"	,"SQL");

/**
 *
 * @package Public-Storm
 * @final
 * @static
 */
final class Debug
{
 
  private static $instance;
  private static $last_debug_type   = "screen";
  
  private $log_file          = false;
  private $log_screen        = false;

 
  public static function Init ($debug_type = "")
  {
    self::$instance = new Debug();

    if (empty($debug_type))
    {
       $debug_type = self::$last_debug_type;
    }
       
    if (stristr($debug_type,"file"))
    {
      self::$instance->log_file = true;
    }
    elseif (stristr($debug_type,"screen"))
    {
      self::$instance->log_screen = true;
      print "<script defer='defer'>\r\n\tvar fdebug = window.open('about:blank', 'fdebug', 'scrollbars=1,width=1000,height=700');\r\n";
      print "\tfdebug.document.write('<h1>".gettext("Debug window")."</h1>');\r\n";
      print "\tfdebug.document.write('<style>ul.liste li {list-style: inline;}div.logLine span {display:table-row;}div.logLine span {display:table-cell;}div.logLine span.date {display:none}div.logLine span.info {width: 400px;}div.logLine span.line {width: 20px;}div.logLine span.file {width: 400px;overflow:hidden;}div.logLine:hover {background:#cdcdcd;}</style>');\r\n";
      print "\tfdebug.document.write('<ul class=\'liste\'>');\r\n";
      print "\tfdebug.document.write('	<li id=\"".NOTICE."\"><h2>".NOTICE."</h2></li>');\r\n";
      print "\tfdebug.document.write('	<li id=\"".WARNING."\"><h2>".WARNING."</h2></li>');\r\n";
      print "\tfdebug.document.write('	<li id=\"".ERROR."\"><h2>".ERROR."</h2></li>');\r\n";
      print "\tfdebug.document.write('	<li id=\"".SQL."\"><h2>".SQL."</h2></li>');\r\n";
      print "\tfdebug.document.write('</ul>');</script>\r\n\r\n";
    }
    
    self::$last_debug_type = $debug_type;
  }
 
 
  public static function Log ($message,$level=NOTICE,$file_line="-",$file_name="-")
  {
    $data[] = $level;
    $data[] = $message;
    $data[] = $file_line;
    $data[] = $file_name;
    self::WriteLine(self::PrepareLine($data));
  }

 
	private static function PrepareLine ($data) {
		// $line = date("c");
		// $line.= " ";
		// $debug_calls = debug_backtrace();
		// $file_name = basename($debug_calls[sizeof($debug_calls)-1]["file"]);
		// $file_line = $debug_calls[sizeof($debug_calls)-1]["line"] ;
		// $line.= sprintf("%-8s%'04d,%s %s ",$data[0],$file_line,$file_name,$data[1]);
		switch( $data[0] ) {
			case NOTICE :
				$line = $data[1];
				break;
			case ERROR :
				$line = $data[1];
				break;
			case WARNING :
				$line = $data[1];
				break;
			case SQL :
				$line = $data[1];
				break;
			default :
				$line = $data[1];
				break;
		}
		//$line.= sprintf("%-8s%s %s %s %s", "</span>", "<span class='tab'>".$data[0]."</span>", "<span class='info'>".$data[1]."</span>", "<span class='line'>".$data[2]."</span>", "<span class='file'>".$data[3]."</span>")."</div>";
		$line = "<script defer='defer'>";
		$line .= "	fdebug.document.getElementById('".$data[0]."').innerHTML+='<div class=\'logLine\'><span class=\'date\'>".date("d/m/Y h\hi:s")."</span><span class=\'info\'>".$data[1]."</span><span class=\'file\'>".$data[3]."</span><span class=\'line\'>".$data[2]."</span></div>';";
		$line .= "</script>\r\n";
		return $line;
	}


  private static function WriteLine ($data)
  {
    if (!DEBUG) return 0;

    if (empty(self::$instance))
       self::Init();
    
    if (self::$instance->log_file)
       file_put_contents(DEBUG_FILE_PATH,$data."\r\n",FILE_APPEND);

    if (self::$instance->log_screen)
    	print $data;
       //print "<script defer='defer'>fdebug.document.write('<div><span class=\'date\'>".addslashes($data)."');</script>\r\n";
  }


  public static function GetType()
  {
    return empty(self::$instance)?"none":self::$last_debug_type;
  }
}

?>