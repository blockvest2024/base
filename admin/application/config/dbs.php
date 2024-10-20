<?php
$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'root',//'u8771280_blockvest',
	'password' => '',//'ea@z!K**$6ky', 
	'database' => 'blockvest_base',//'u8771280_blockvest',
	'dbdriver' => 'mysqli',
	'dbprefix' => 'm_',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => true,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);