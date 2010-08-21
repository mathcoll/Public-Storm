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
  
  require 'wordcloud.class.php';
  
?>
<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN' 'http://www.w3.org/TR/html4/loose.dtd'>
<html>
  <head>
  <title>PHP wordCloud by LotsOfCode.com</title>
  <style type="text/css">
    <!--
      @import url('css/wordcloud.css');
    //-->
  </style>
  </head>
  <body>
  <?php
    $randomWords = array("Computer", "Skateboarding", "PC", "music", "music", "music", "music", "PHP", "C", "XHTML", "eminem", "programming", "forums", "webmasterworld","Chill out", "email", "forums", "Computer", "GTA", "css", "mysql", "sql", "css", "mysql", "sql","forums", "internet", "class", "object", "method", "music", "music", "music", "music", "gui", "encryption");
    $cloud = new wordCloud($randomWords);
    $cloud->addWord("music", 12);
    $cloud->addWord("downloads", 8);
    $cloud->addWord("internet", 17);
    $cloud->addWord("php", 22);
    $cloud->addWord("css", 32);
    $cloud->addWord("lotsofcode", 60);
    echo $cloud->showCloud();
  ?>
  </body>
</html>
