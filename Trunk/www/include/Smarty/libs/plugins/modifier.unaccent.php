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
 * Name:     unaccent<br>
 * Purpose:  remove accent from string
 * @author   Mathieu lory <mathieu at internetcollaboratif dot info>
 * @param string
 * @return string
 */
function smarty_modifier_unaccent($string)
{
    return utf8_encode(
			strtr(
				utf8_decode($string),
				utf8_decode("ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ"),
				"aaaaaaaaaaaaooooooooooooeeeeeeeecciiiiiiiiuuuuuuuuynn"
			)
		);
}

?>
