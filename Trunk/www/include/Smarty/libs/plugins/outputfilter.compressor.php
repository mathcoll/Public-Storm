<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

function smarty_outputfilter_compressor($source, &$smarty)
{
    // remove all leading spaces, tabs and carriage returns NOT
    // preceeded by a php close tag.
    $source = trim(preg_replace('/((?<!\?>)\n)[\s]+/m', '\1', $source));
    $source = preg_replace("|[ 	]+|iU",' ',$source);
    return $source;
}

?>
