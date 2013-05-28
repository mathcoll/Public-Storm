<?php
$settings = new Settings();
$settings->setVar('graphviz_type', 'dot', 'public_storm', 'GraphViz command');
$settings->setVar('neato_type', 'jpg', 'public_storm', 'type of the neato image file generated');
$settings->setVar('storms_per_page', '30', 'public_storm', 'number of storm printed on each page');
$settings->setVar('user_storms_per_page', '20', 'public_storm', 'number of storm printed on each user page');

?>