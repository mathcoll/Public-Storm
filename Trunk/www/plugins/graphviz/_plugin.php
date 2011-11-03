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
 */
		
final class graphviz extends Plugins
{
 	public static $subdirs = array();
 	public static $name = "graphviz";
	public static $graph;
	public static $s;
 	
	public function __construct()
	{
		require(Settings::getVar('prefix') . 'conf/graphviz.php');
		require_once("./plugins/graphviz/classes/GraphViz.php");
		self::$graph = new Image_GraphViz(false, null, 'G', false);
		/*
		$graph->addEdge(array('run' => 'intr'));
		$graph->addEdge(array('intr' => 'runbl'));
		$graph->addEdge(array('runbl' => 'run'));
		$graph->addEdge(array('run' => 'kernel'));
		$graph->addEdge(array('kernel' => 'zombie'));
		$graph->addEdge(array('kernel' => 'sleep'));
		$graph->addEdge(array('kernel' => 'runmem'));
		$graph->addEdge(array('sleep' => 'swap'));
		$graph->addEdge(array('swap' => 'runswap'));
		$graph->addEdge(array('runswap' => 'new'));
		$graph->addEdge(array('runswap' => 'runmem'));
		$graph->addEdge(array('new' => 'runmem'));
		$graph->addEdge(array('sleep' => 'runmem'));
		$graph->addNode('c', array('shape' => 'polygon',
                           'sides' => 4,
                           'skew' => .4,
                           'label' => 'hello world'));
		$graph->addNode('Node1', array('label' => 'Node1'), 'cluster_1');
		$result = $graph->image();
		//$graph->parse();
		print $result;
		*/

	}
	
	/**
	 * Create a new Dot file to server
	 * @param string $dotfile
	 * @param string $outputfile
	 * @param string $format
	 * @param unknown_type $command
	 * @return Ambigous <boolean, unknown>
	 */
	public function renderDotFile($dotfile, $outputfile, $format='svg', $command=null)
	{
		return self::$graph->renderDotFile($dotfile, $outputfile, $format, $command);
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
		return self::getAuthor();
	}
	
	public function getIcon()
	{
		return parent::getIcon(self::$name);
	}
	
	public function getStatus()
	{
		return parent::getStatus(self::$name);
	}
	
	public function getSubDirs()
	{
		return self::$subdirs;
	}
}


?>
