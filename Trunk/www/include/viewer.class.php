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

 Project started on 2008-11-22 with help from Serg Podtynnyi
 <shtirlic@users.sourceforge.net>
 */

/**
 * @package    Public-Storm
 * @subpackage Viewer
 * @author     Mathieu Lory <mathieu@internetcollaboratif.info>
 */

if (basename($_SERVER["SCRIPT_NAME"])==basename(__FILE__))die(gettext("You musn't call this page directly ! please, go away !"));


abstract class Viewer {
	private static $data_items=array();
	private static $template;

	/**
	 * Add a new data to send to the viewer
	 * @param string $data_name the name of the variable
	 * @param mixed $data the content of the variable
	 */
	public static function AddData($data_name,$data) {}
	/**
	 * Return the value of one variable
	 * @param string $data_name
	 */
	public static function Value($data_name) {}
	/**
	 * Set the default template to use in the viewer
	 * @param string $filename
	 */
	public static function UseTemplate($filename) {}
	/**
	 * Enter description here ...
	 * @param string $filename
	 */
	public static function CheckTemplate($filename="") {}
	/**
	 * Display the dynamical content rendered from the template
	 * @param boolean $method not sure what is it ...
	 */
	public static function Show($method=1) {}
	/**
	 * Return the dynamical content rendered from the template
	 */
	public static function fetch() {}
	public static function RequestError() {}
	public static function Restricted() {}
}
?>