<?php

Settings::setVar('feedburner_url', 'http://feeds.feedburner.com/Public-storm', 'backend', 'feedburner url');
Settings::setVar('RSS_MANAGINGEDITOR', 'mathieu@internetcollaboratif.info', 'backend', 'Rss Managing director');
Settings::setVar('RSS_WEBMASTER', 'mathieu@internetcollaboratif.info', 'backend', 'Rss Webmaster');
Settings::setVar('RSS_GENERATOR', Settings::getVar('SITE_NAME') . ' v.' . Settings::getVar('SITE_VERSION'), 'backend', 'Rss Generator');
?>