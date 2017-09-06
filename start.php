<?php
//If page is LIVE
//error_reporting(0);

defined('DS') ? NULL : define('DS', DIRECTORY_SEPARATOR);
defined('PX') ? NULL : define('PX', 'autod_');

//DIRECTORY_SEPARATOR
//Windows \
//Linux /

//CONSTANTS FOR PROJECT

/*
 * CHANGE TWO LINES 20 AND 21-22
 * */
defined('ROOT_URL') ? null : define('ROOT_URL', 'http://ubuntu.ametikool.ee/~TAK15_Akke/auto24/');
defined('ROOT_PATH') ? null : define('ROOT_PATH', DS . 'home'.DS.'TAK15_Akke'.DS.'public_html'.DS.'auto24'.DS);

//MAIN CONSTANTS
defined('INCLUDE_PATH') ? null : define('INCLUDE_PATH', ROOT_PATH);
defined('MAIN_URL') ? null : define('MAIN_URL', ROOT_URL);
defined('MAIN_PATH') ? null : define('MAIN_PATH', ROOT_PATH . DS);
defined('MAIN_PAGES_PATH') ? null : define('MAIN_PAGES_PATH', MAIN_PATH . 'pages' . DS);

//kaks võimalust
defined('ADMIN_URL') ? null : define('ADMIN_URL', ROOT_URL . 'admin/');
defined('ADMIN_PATH') ? null : define('ADMIN_PATH', ROOT_PATH . DS . 'admin' . DS);
defined('ADMIN_PAGES_URL') ? null : define('ADMIN_PAGES_URL', ROOT_URL . 'admin/pages/');
defined('ADMIN_PAGES_PATH') ? null : define('ADMIN_PAGES_PATH', ROOT_PATH . DS . 'admin' . DS . 'pages' . DS);
defined('ADMIN_404') ? null : define('ADMIN_404', ADMIN_PAGES_PATH . '404.php');

//defined('ADMIN_URL') ? null : define('ADMIN_URL', MAIN_URL . 'admin/');
//defined('ADMIN_PATH') ? null : define('ADMIN_PATH', MAIN_PATH . 'admin' . DS);

//PICTURE
defined('PICTURE_THUMB') ? null : define('PICTURE_THUMB', 200);
defined('PICTURE_MED') ? null : define('PICTURE_MED', 700);
defined('PICTURE_FULL') ? null : define('PICTURE_FULL', 1920);

defined('UPLOAD_PATH') ? null : define('UPLOAD_PATH', MAIN_PATH . 'upload' . DS);
defined('UPLOAD_PATH_FULL') ? null : define('UPLOAD_PATH_FULL', UPLOAD_PATH . date("Y") . DS . date("m") . DS);
defined('UPLOAD_PATH_MED') ? null : define('UPLOAD_PATH_MED', UPLOAD_PATH . date("Y") . DS . date("m") . DS . PICTURE_MED . DS);
defined('UPLOAD_PATH_THUMB') ? null : define('UPLOAD_PATH_THUMB', UPLOAD_PATH . date("Y") . DS . date("m") . DS . PICTURE_THUMB . DS);

defined('UPLOAD_URL') ? null : define('UPLOAD_URL', MAIN_URL . 'upload/');
defined('UPLOAD_URL_FULL') ? null : define('UPLOAD_URL_FULL', UPLOAD_URL . date("Y") . "/" . date("m") . "/");
defined('UPLOAD_URL_MED') ? null : define('UPLOAD_URL_MED', UPLOAD_URL . date("Y") . "/" . date("m") . "/" . PICTURE_MED . "/");
defined('UPLOAD_URL_THUMB') ? null : define('UPLOAD_URL_THUMB', UPLOAD_URL . date("Y") . "/" . date("m") . "/" . PICTURE_THUMB . "/");

//TEMPLATE CONSTANTS
defined('TEMPLATE_PATH') ? null : define('TEMPLATE_PATH', MAIN_PATH . 'template' . DS);
defined('TEMPLATE_URL') ? null : define('TEMPLATE_URL', MAIN_URL . 'template/');
defined('TEMPLATE_URL_CSS') ? null : define('TEMPLATE_URL_CSS', MAIN_URL . 'template/css/');
defined('TEMPLATE_URL_JS') ? null : define('TEMPLATE_URL_JS', MAIN_URL . 'template/js/');



require_once INCLUDE_PATH . 'functions.php';
/*Dynamic classes
require_once INCLUDE_PATH . 'class.MySQLDatabase.php';
require_once INCLUDE_PATH . 'class.DatabaseQuery.php';
require_once INCLUDE_PATH . 'class.Session.php';
require_once INCLUDE_PATH . 'class.Category.php';
require_once INCLUDE_PATH . 'class.Product.php';
require_once INCLUDE_PATH . 'functions.php';
require_once INCLUDE_PATH . 'class.User.php';
require_once INCLUDE_PATH . 'pages.php';
require_once INCLUDE_PATH . 'class.Picture.php';
require_once INCLUDE_PATH . 'class.ProductLanguage.php';
*/
/*LANGUAGES
if(isset($_SESSION['lang'])) {
    $lang = $_SESSION['lang'];
} else {
    $lang = 'en';
}
defined('LANG') ? null : define('LANG', $lang);
$langFile = INCLUDE_PATH . "languages" . DS . LANG . '.php';
if(file_exists($langFile)) {
    require_once $langFile;
} else {
    require_once INCLUDE_PATH . "languages" . DS . 'en.php';
}
*/


//Added constants
defined('MAX_PASS_LENGTH') ? null : define('MAX_PASS_LENGTH', 3);
defined('MAX_CATEGORIES') ? null : define('MAX_CATEGORIES', 5);