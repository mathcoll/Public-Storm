<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty unaccent modifier plugin
 *
 * Type:     modifier<br>
 * Name:     url<br>
 * Purpose:  remove accent from string
 * @author   Mathieu lory <mathieu at internetcollaboratif dot info>
 * @param string
 * @return string
 */
function smarty_modifier_url($string)
{
	$string    = utf8_encode(
			strtr(
				utf8_decode($string),
				utf8_decode("ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ. ?&"),
				"aaaaaaaaaaaaooooooooooooeeeeeeeecciiiiiiiiuuuuuuuuynn----"
			)
		);
	$string    = htmlentities(strtolower($string));
	//$string    = preg_replace("/([^a-z0-9]+)/", "-", html_entity_decode($string));
	$string    = trim($string, "-");
	$string    = urlencode($string);
	return $string;
}

?>
