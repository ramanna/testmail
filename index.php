<?php 

// change the following paths if necessary
$yii=dirname(__FILE__).'/framework/yii.php';
if($_SERVER['DOCUMENT_ROOT']=='/home/mavpay/public_html/prod'){
     $config=dirname(__FILE__).'/protected/config/production.php';
} elseif($_SERVER['DOCUMENT_ROOT']=='/home/mavpay/public_html/dev'){
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
    $config=dirname(__FILE__).'/protected/config/development.php';
}else { 
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
    $config=dirname(__FILE__).'/protected/config/local.php';
}

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
Yii::createWebApplication($config)->run();
