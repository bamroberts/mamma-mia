<?php

global $project;
$project = 'mysite';

global $databaseConfig;
$databaseConfig = array(
	'type' => 'MySQLDatabase',
	'server' => 'localhost',
	'username' => 'root',
	'password' => 'rusYc0ll',
	'database' => 'mamma-mia',
	'path' => ''
);

// Set the site locale
i18n::set_locale('en_US');

error_reporting(E_ERROR | E_WARNING | E_PARSE);

Director::isDev(1);

Security::setDefaultAdmin('admin', 'rusYc0ll');

