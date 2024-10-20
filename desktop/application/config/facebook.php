<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$config['facebook']['application_name'] = 'sospawn';
$config['facebook']['app_id']        = '218113051050273';
$config['facebook']['app_secret']    = '087ee56c720be7f480b6b901a3a934a5';
$config['facebook']['default_graph_version']          = 'v2.10';
$config['facebook']['redirect_url']          = 'https://127.0.0.1/sospawn/facebooks/auth.html';
$config['facebook']['scopes']           = array('email','profile');

