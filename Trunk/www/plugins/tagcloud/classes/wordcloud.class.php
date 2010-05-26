<?php
  
  /************************************************************\
  *
  *	  wordCloud Copyright 2007 Derek Harvey
  *	  www.lotsofcode.com
  *
  *	  This file is part of wordCloud.
  *
  *	  wordCloud is free software; you can redistribute it and/or modify
  *	  it under the terms of the GNU General Public License as published by
  *	  the Free Software Foundation; either version 2 of the License, or
  *	  (at your option) any later version.
  *
  *	  wordCloud is distributed in the hope that it will be useful,
  *	  but WITHOUT ANY WARRANTY; without even the implied warranty of
  *	  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.	See the
  *	  GNU General Public License for more details.
  *
  *	  You should have received a copy of the GNU General Public License
  *	  along with wordCloud; if not, write to the Free Software
  *	  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA	02111-1307	USA
  *
  \************************************************************/
  
  class wordCloud
  {
    var $version = '1.0';
  	var $wordsArray = array();
  	 
  	/*
  	* PHP 5 Constructor
  	*
  	* @param array $words
  	* @return void
  	*/
  	 
  	function __construct($words = false)
  	{
  		if ($words !== false && is_array($words))
  		{
  			foreach ($words as $key => $value)
  			{
  				$this->addWord($value);
  			}
  		}
  	}
  	 
  	/*
  	* PHP 4 Constructor
  	*
  	* @param array $words
  	* @return void
  	*/
  	 
  	function wordCloud($words = false)
  	{
  		$this->__construct($words);
  	}
  	 
  	/*
  	* Assign word to array
  	*
  	* @param string $word
  	* @return string
  	*/
  	 
  	function addWord($word, $value = 1)
  	{
  		$word = strtolower($word);
  		if (array_key_exists($word, $this->wordsArray))
  			$this->wordsArray[$word] += $value;
  		else
  			$this->wordsArray[$word] = $value;
  		 
  		return $this->wordsArray[$word];
  	}
  	 
  	/*
  	* Shuffle associated names in array
  	*/
  	 
  	function shuffleCloud()
  	{
  		$keys = array_keys($this->wordsArray);
  		 
  		shuffle($keys);
  		 
  		if (count($keys) && is_array($keys))
  		{
  			$tmpArray = $this->wordsArray;
  			$this->wordsArray = array();
  			foreach ($keys as $key => $value)
  				$this->wordsArray[$value] = $tmpArray[$value];
  		}
  	}
  	 
  	/*
  	* Calculate size of words array
  	*/
  	 
  	function getCloudSize()
  	{
  		return array_sum($this->wordsArray);
  	}
  	 
  	/*
  	* Get the class range using a percentage
  	*
  	* @returns int $class
  	*/
  	 
  	function getClassFromPercent($percent)
  	{
  		if ($percent >= 99)
  			$class = 1;
  		else if ($percent >= 70)
  			$class = 2;
  		else if ($percent >= 60)
  			$class = 3;
  		else if ($percent >= 50)
  			$class = 4;
  		else if ($percent >= 40)
  			$class = 5;
  		else if ($percent >= 30)
  			$class = 6;
  		else if ($percent >= 20)
  			$class = 7;
  		else if ($percent >= 10)
  			$class = 8;
  		else if ($percent >= 5)
  			$class = 9;
  		else
  			$class = 0;
  		 
  		return $class;
  	}
  	 
  	/*
  	* Create the HTML code for each word and apply font size.
  	*
  	* @returns string $spans
  	*/
  	 
  	function showCloud($returnType = "html")
  	{
  		$this->shuffleCloud();
  		$this->max = max($this->wordsArray);
  		if (is_array($this->wordsArray))
  		{
  			$return = ($returnType == "html" ? "" : ($returnType == "array" ? array() : ""));
  			foreach ($this->wordsArray as $word => $popularity)
  			{
  				$sizeRange = $this->getClassFromPercent(($popularity / $this->max) * 100);
  				if ($returnType == "array")
  				{
  					$return[$word]['word'] = $word;
  					$return[$word]['sizeRange'] = $sizeRange;
  				}
  				else if ($returnType == "html")
  				{
  					$return .= "<span class='word size{$sizeRange}'> &nbsp; {$word} &nbsp; </span>";
  				}
  			}
  			return $return;
  		}
  	}
  }
?>
