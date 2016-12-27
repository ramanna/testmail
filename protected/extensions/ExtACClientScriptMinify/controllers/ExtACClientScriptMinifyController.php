<?php
/**
 * ExtACClientScriptMinify Controller.
 *
 * Combined, Minified and Compressed css, js files with cache headers.
 *
 * @package ext.ExtACClientScriptMinify.controllers
 * @author Andrea Cardinale
 * @copyright Copyright &copy; 2012 Andrea Cardinale
 * @license BSD 3-clause
 * @link http://blog.andrea-cardinale.it/yii/minify-css-js-html/
 * @version 1.0.0
 */
class ExtACClientScriptMinifyController extends CExtController {

	public function createAction($actionID)
	{
	    return new CInlineAction($this, 'default');
	}

	public function actionDefault()
	{
		header('X-Powered-By:');
		header('Pragma:');
		header('Expires:');
		header('Cache-Control:');
		header('Last-Modified:');
		header('Etag:');
		@ob_end_clean();

		if(!isset($_GET['g'])) {
			$_GET['g'] = basename($_SERVER['REQUEST_URI']);
		}
		
		$_GET['debug'] = Yii::app()->clientScript->debug;
		
		if(isset(Yii::app() -> log)) {
			foreach(Yii::app()->log->routes as $route) {
				if($route instanceof CWebLogRoute) {
					$route -> enabled = false;
				}
			}
		}
		
		require (dirname(dirname(__FILE__)) . '/vendors/minify/min/index.php');

	}



}
