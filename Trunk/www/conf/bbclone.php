<?php
$settings = new Settings();
$settings->setVar('BBC_MAINSITE', '../../../..', 'bbclone', 'If this variable has been set, a link to the specified location will be generated. The default value is pointing to the parent directory. In case your main site is located elsewhere, you probably want to adjust the value to suit your needs.');

global $BBC_MAINSITE;
$BBC_MAINSITE = Settings::getVar('BBC_MAINSITE');
?>
