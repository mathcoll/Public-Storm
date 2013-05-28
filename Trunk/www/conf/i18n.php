<?php
$settings = new Settings();
$settings->setVar('languages', 'fr_FR.utf8;en_GB.utf8', 'i18n', 'Liste des langues disponibles');
$settings->setVar('languages cookie lifetime', 3600 * 24 * 30, 'i18n', 'cookie lifetime');

?>