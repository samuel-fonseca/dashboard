<?php

require __DIR__ . '/../vendor/autoload.php';

/**
 * dotenv variables
 * 
 * @see https://github.com/vlucas/phpdotenv
 */
$dotenv = new Dotenv\Dotenv(__DIR__.'/../');
$dotenv->load();

/**
 * Register custom classes
 */
$_template = new Dashboard\Views\Template;
$_info = new Dashboard\Info;
$_directory = new Dashboard\Directory;

/**
 * Array containing information user agent && server
 */
$_server_os = $_info::system();
$_guest_os = $_info::guest_system();
$_browser = $_info::browser();
