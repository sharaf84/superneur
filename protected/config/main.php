<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// Define a path alias for the Bootstrap extension as it's used internally.
//Yii::setPathOfAlias('bootstrap', dirname(__FILE__) . '/../extensions/bootstrap');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Superneur',
    'id' => 'superneur',
    //'theme' => 'bootstrap', //Sets from controller actions by Yii::app()->theme = 'bootstrap';
    'language' => 'en',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.controllers.*',
        'application.controllers.admin.*',
        'application.helpers.*',
        'application.extensions.*',
        'application.vendors.*',
        'application.models.', 
        'application.components.', 
    ),
    'aliases' => array(
        'bootstrap' => 'ext.bootstrap',
        'xupload' => 'ext.xupload',
    ),
    'modules' => array(
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'sharaf',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
            'generatorPaths' => array('bootstrap.gii'),
        ),
        'auth' => array(
            'strictMode' => true, // when enabled authorization items cannot be assigned children of the same type.
            'userClass' => 'Users', // the name of the user model class.
            'userIdColumn' => 'id', // the name of the user id column.
            'userNameColumn' => 'username', // the name of the user name column.
            'appLayout' => '//layouts/column1', //'application.views.layouts.main', // the layout used by the module.
            'viewDir' => null, // the path to view files to use with this module.
        ),       
    ),
    // application components
    'components' => array(
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
            'class' => 'AuthWebUser',
        ),
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
            /**
             * @Important 'urlFormat' => 'path' makes a problem when filtering CGridView with pagination.
             */
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(
                'admin' => 'admin/site/login',
                'admin/dashboard' => 'admin/site/dashboard',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
        // uncomment the following to use a MySQL database
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=superneur',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
                // uncomment the following to show log messages on web pages
                array(
                    'class' => 'CWebLogRoute',
                ),
            ),
        ),
        'authManager' => array(
            'class' => 'CDbAuthManager',
            'connectionID' => 'db',
            'itemTable' => 'tbl_auth_item',
            'itemChildTable' => 'tbl_auth_item_child',
            'assignmentTable' => 'tbl_auth_assignment',
            'behaviors' => array(
                'auth' => array(
                    'class' => 'auth.components.AuthBehavior',
                    'admins' => array(), // users with full access (username1, username2, ...)
                ),
            ),
        ),
        'bootstrap' => array(
            'class' => 'bootstrap.components.Bootstrap',
        ),
        //Metadata Helps to get metadata about models,controllers and actions in application* 
        'metadata' => array('class' => 'Metadata'),
        //Image manipulations components
        'kimage' => array(
            'class' => 'application.extensions.image.CImageComponent',
            // GD or ImageMagick
            'driver' => 'GD',
            // ImageMagick setup path
            'params' => array('directory' => '/opt/local/bin'),
        ),
        'simage' => array('class' => 'SimpleImage'),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => require(dirname(__FILE__) . '/params.php'),
);
