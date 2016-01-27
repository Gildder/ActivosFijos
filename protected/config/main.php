<?php

Yii::setPathOfAlias('bootstrap',dirname(__FILE__).'/../extensions/bootstrap');
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'iBrasact',
	'language'=>'es',
 	'sourceLanguage'=>'en',
 	'charset'=>'utf-8',
	'theme'=>'bootstrap',


	// preloading 'log' component
	'preload'=>array('log','bootstrap'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.extensions.YiiMongoDbSuite.*',
		'application.extensions.bootstrap.*',
	),





	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'admin',
		'gii'=>array(
			'generatorPaths'=>array(
				'bootstrap.gii'
			),
		),

		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'admin',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),

			///Genrador de codigo basado en bootstrap
			'generatorPaths'=> array(
				'bootstrap.gii'
			),

			
		),

        'gii1' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '12345',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            // add additional generator path
            'generatorPaths'=>array(
                'application.extensions.YiiMongoDbSuite.gii'
            ),
            'ipFilters' => array('127.0.0.1', '::1'),
        ),

	), 

	// application components
	'components'=>array(

		//extencion de bootstrap
		'bootstrap' => array(
			 'class' => 'ext.bootstrap.components.Booster',
			 
		 ),


		
		//extension de Mongo
        'mongodb' => array(
            'class' => 'EMongoDB',
            'connectionString' => 'mongodb://localhost',
            'dbName' => 'Examen',
            'fsyncFlag' => true,
            'safeFlag' => true,
            'useCursor' => false
        ),



		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),

		'authManager'=>array(
			'class'=>'CDbAuthManager',
			'connectionID'=>'db',
			'itemTable'=>'auth_elementos',
			'itemChildTable'=>'auth_relacion', //relacion padre hijo
			'assignmentTable'=>'auth_asignacion', //se asignan los parametros a todas las estructuras creadas.
		),

		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/

		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

		//MySql database
		'db'=>array(
			'class'=>'CDbConnection',
			'connectionString' => 'mysql:host=localhost;dbname=activosfijos',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'admin',
			'charset' => 'utf8',
		),


		///coreMessage para español de protected***************
		'coreMessage'=>array(
			'basePath'=>'protected/messages'
		),

		'messages'=>array(
			'onMissingTranslation'=>array('GMensajes','getNecesitoTraduccion')
		),

		
		//************************************

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
					/*
					 'class'=>'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
                	'ipFilters'=>array('127.0.0.1','192.168.1.215'),
					*/
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'mariolopex8@gmail.com',
	),
);
