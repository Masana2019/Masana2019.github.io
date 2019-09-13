<?php
session_start();

mb_internal_encoding("UTF-8");
$action = $_GET['action'];
define('ENGINE_DIR', dirname(__FILE__) . '/engine/');
define('APPLICATION_DIR', dirname(__FILE__) . '/application/');

require_once(ENGINE_DIR . 'config/config.php');
require_once(ENGINE_DIR . 'config/rows.php');

require_once(ENGINE_DIR . 'main/controller.php');
require_once(ENGINE_DIR . 'main/db.php');
require_once(ENGINE_DIR . 'main/template.php');

$controller = new Controller;
$controller -> action($_GET['action']);

$template = new Template;
$template -> header();
$template -> navmenu();
$template -> views($_GET['action']);
$template -> footer();
?>