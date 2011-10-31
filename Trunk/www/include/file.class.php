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
 * @subpackage file
 * @author     Mathieu Lory <mathieu@internetcollaboratif.info>
 */
if (basename($_SERVER["SCRIPT_NAME"])==basename(__FILE__))die(gettext("You musn't call this page directly ! please, go away !"));


class file
{

   /**
    * File to be processed
    *
    * @access private
    * @var string
    */
   private $sFile;

   /**
    * Class constructor
    *
    * @access public
    * @param string $sFile Source file
    */
   public function __construct($sFile='')
   {
     if ($sFile  != '')
     {
       $this->sFile   =  $sFile;
     }
   }

   /**
    * Read all content from a file and return as a string
    *
    * @access public
    * @return string
    */
   public function Read()
   {
     if ($this->sFile!='')
     {
        try
        {
           if ($this->Exists())
           {
             if ($this->IsReadable())
               return file_get_contents($this->sFile);
             else
               throw new FileException('can\'t read file "'.$this->sFile.'"');
           }
           else
           {
             throw new FileException('file "'.$this->sFile.'" does not exist');
           }
        }
        catch (Exception $e)
        {
           Debug::Log($e,ERROR, __LINE__, __FILE__);
           return false;
        }
     }
     return '';
   }

   /**
    * Write some content to a file
    *
    * @access public
    * @param string $sContent
    * @return boolean
    */
   public function Write($sContent)
   {
      try
      {
         return file_put_contents($this->sFile,$sContent);
      }
      catch (Exception $e)
      {
         Debug::Log($e,ERROR, __LINE__, __FILE__);
         return false;
      }
   }
   
   /**
    * Append some content to file
    *
    * @access public
    * @param string $sContent
    * @return boolean
    */
   public function Append($sContent)
   {
      try
      {
         return file_put_contents($this->sFile,$sContent,FILE_APPEND);
      }
      catch (Exception $e)
      {
         Debug::Log($e,ERROR, __LINE__, __FILE__);
         return false;
      }
   }

   /**
    * Check if the selected file is readable
    * 
    * @access public
    * @return boolean
    */
   public function IsReadable()
   {
      return is_readable($this->sFile);
   }

   /**
    * Check if the selected file has the permissions set to a value
    * 
    * @access public
    * @return boolean
    */
   public function HasPermissions($wantedPerms)
   {
		$actualPerms = substr(decoct(fileperms($this->sFile)), 1);
		if($actualPerms == $wantedPerms) {
			return true;
		} else {
			return false;
		}
   }

   /**
    * Check if the selected file is writable
    * 
    * @access public
    * @return boolean
    */
   public function IsWritable()
   {
      return is_writable($this->sFile);
   }

   /**
    * Check if the selected file is exists
    *
    * @access public
    * @return boolean
    */
   public function Exists()
   {
      return file_exists($this->sFile);
   }

   /**
    * Return the file name
    *
    * @access public
    * @return string
    */
   public function Name()
   {
      $sExt =  strrchr($this->sFile,'.');
      if ($sExt   != false)
      {
        return substr($this->sFile,0,-strlen($sExt));
      }
      return '';
   }
   
   public function filemtime()
   {
      return filemtime($this->sFile);
   }

   /**
    * Return the file ext
    *
    * @access public
    * @return string
    */
   public function FileExt()
   {
     return strtolower(end(explode('.',$this->sFile)));
   }

   /**
    * Delete a file from server
    *
    * @access public
    * @return bool
    */
   public function Delete()
   {
      if ($this->Exists())
      {
         return unlink($this->sFile);
      }
      return true;
   }

   /**
    * List files from a directory
    * 
    * @access public
    * @return array
    */
   public function GetFiles($dir, $regexp="/*/")
   {
  		$liste = array();
  		$dh = opendir($dir);
	  	//print $dir;
  		while (($file = readdir($dh)) !== false)
  		{
  			if (ereg($regexp, $file, $match))
  			{
				$id = $match[1];
  				array_push($liste, $id);
  			}
  		}
      return $liste;
   }

   /**
    * List directories from a directory
    * 
    * @access public
    * @return array
    */
   public function GetDirs($dir, $regexp="/*/")
   {
  		$liste = array();
  		foreach( scandir($dir) as $node )
  		{
  			if( !is_dir($node) ) /* TODO ! pourquoi c'est inversé ?????????? */
  			{
  				array_push($liste, $node);
  			}
  		}
      return $liste;
   }
}
?>