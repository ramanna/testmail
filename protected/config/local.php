<?php

$dbname = "testmail";
$username = "root";
$pass = "root";
$mailHost = 'mail.gmail.com';
$mailUserName = "ramhemareddy@gmail.com";
$mailPassword = "123456789";
$mailPort = '465';
$mailEncryption = 'tls';


// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Test Mail',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.protected.extensions.*',
        'application.modules.*',
        'application.extensions.*',
//        'application.extensions.scriptboost.*',
    ),
    //'theme'=>'metronic',
    'sourceLanguage' => 'en_us',
    'language' => 'en-US',
    'modules' => array(
        // uncomment the following to enable the Gii tool
        'admin',
        'mobile',
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => false,
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            //'ipFilters'=>array('127.0.0.1','::1'),
            'ipFilters' => false
        ),
    ),
    'controllerMap'=>array(
        'min'=>'ext.ExtACClientScriptMinify.controllers.ExtACClientScriptMinifyController',
    ),
    // application components
    'components' => array(
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
        'mail' => array(
            'class' => 'ext.yii-mail.YiiMail',
            'transportType' => 'smtp',
            'transportOptions' => array(
                'host' => $mailHost,
                'username' => $mailUserName,
                'password' => $mailPassword,
                'port' => $mailPort,
                'encryption' => $mailEncryption,
            ),
            'viewPath' => 'application.views.mail',
            'logging' => true,
            'dryRun' => false,
        ),
        'curl' => array(
            'class' => 'application.extensions.curl.Curl',
        //you can setup timeout,http_login,proxy,proxylogin,cookie, and setOPTIONS
        //eg.
        //'options' => array(),
        ),
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
            'urlFormat' => 'path',
            'rules' => array(
                'toeadmin' => '/admin/default',
                'mobile' => '/mobile/default',
                'mobile/<alias:fees|aboutus|contactus|terms|policy|faq|aml|legal|news|testimonial>' => 'mobile/default/<alias>',
                '<alias:fees|about|contactus|terms|privacypolicy|faq|aml|legal>' => 'site/<alias>',
                '<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
            'showScriptName' => false,
        ),
        //Local
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=' . $dbname,
            'emulatePrepare' => true,
            'username' => $username,
            'password' => $pass,
            'charset' => 'utf8',
            'tablePrefix' => 'tbl_',
            'enableParamLogging' => true,
        ),
        // Error handler
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        // the above is unused for 404 errors, as those
        // are handled by Wordpress using custom exception handler
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'trace',
                    'logFile' => 'log_' . date('Y-m-d') . '.log',
                    'maxFileSize' => 99999,
                    'maxLogFiles' => 30,
                    'rotateByCopy' => true,
                ),
            ),
        ),
    ),
    // application-level parameters that can be accessed
    'params' => require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . "parameters.php"),
);
