<?php
$settings = new Settings();
$settings->setVar('feedburner_url', '', 'backend', 'feedburner url');
$settings->setVar('RSS_MANAGINGEDITOR', 'mathieu@internetcollaboratif.info (Mathieu Lory)', 'backend', 'Rss Managing director');
$settings->setVar('RSS_WEBMASTER', 'mathieu@internetcollaboratif.info (Mathieu Lory)', 'backend', 'Rss Webmaster');
$settings->setVar('ATOM_WEBMASTER_NAME', 'Mathieu Lory', 'backend', 'Atom Webmaster Name');
$settings->setVar('ATOM_WEBMASTER_EMAIL', 'mathieu@internetcollaboratif.info', 'backend', 'Atom Webmaster Email');
$settings->setVar('RSS_GENERATOR', $settings->getVar('SITE_NAME') . ' v.' . $settings->getVar('SITE_VERSION'), 'backend', 'Rss Generator');
$settings->setVar('backend number of items', '20', 'backend', 'Number of item in backend file');
?>