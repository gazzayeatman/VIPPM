<?php

global $project;
$project = 'mysite';

global $databaseConfig;
$databaseConfig = array(
	'type' => 'MySQLDatabase',
	'server' => '10.0.2.2',
	'username' => 'root',
	'password' => 'aaaaaaaa',
	'database' => 'SS_mysite',
	'path' => ''
);

// Set the site locale
i18n::set_locale('en_US');
