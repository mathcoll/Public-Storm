<?php
if (basename($_SERVER['SCRIPT_NAME'])==basename(__FILE__))die(gettext("You musn't call this page directly ! please, go away !"));
/* installation is done */
@define('DB_TYPE', 'database_sqlite'); /* database_sqlite or database_mysql */
@define('DB_HOST', '');
@define('DB_NAME', '');
@define('DB_USER', '');
@define('DB_PASS', '');
@define('DB_PREFIX', 'ps_');
?>