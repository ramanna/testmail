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
class ExtACClientScriptMinify extends CClientScript
{
	public $controller = "min";
	public $debug = false;
	public $cache = 'off';
	public $cachePath = '';
	public $maxAge = 1800;
	public $minifyCSS = false;
	public $minifyJS = false;
	public $minifyHTML = false;
	private $_cssgroups = array();
	private $_jsgroups = array();
	private $_minifyGroups = array();
	private $_browser = null;


	public function __construct()
	{
		$mgv = Yii::app()->getRuntimePath()."/minifyGroups.var";
		if(!is_file($mgv)){
			file_put_contents($mgv, serialize(array()));
		}
	}
	
	public function render(&$output)
	{
		parent::render($output);
		file_put_contents(Yii::app()->getRuntimePath()."/minifyGroups.var", serialize($this->_minifyGroups));
	}

	public function renderHead(&$output)
	{
		$cssFiles = array();
		if(!empty($this->cssFiles)){
			$this->cssFiles = array();
			foreach($this->_cssgroups as $media=>$group) {
				foreach($group as $group_name=>$urls) {
					if($group_name=='notminify') {
						foreach($urls AS $url) {
							$this->cssFiles[$url] = $media;
						}
					} else {
						$miniurl = md5(implode(",", $urls)).".css";
						$this->cssFiles[Yii::app()->createUrl($this->controller."/".$miniurl)] = $media;
						$this->_minifyGroups[$miniurl] = $urls;
					}
				}
			}
		}
		if($this->enableJavaScript){
			if(isset($this->scriptFiles[self::POS_HEAD]) && isset($this->_jsgroups[self::POS_HEAD])){
				$this->scriptFiles[self::POS_HEAD] = array();
				foreach($this->_jsgroups[self::POS_HEAD] as $group_name=>$urls) {
					if($group_name=='notminify') {
						foreach($urls AS $url) {
							$this->scriptFiles[self::POS_HEAD][] = $url;
						}
					} else {
						$miniurl = md5(implode(",", $urls)).".js";
						$this->scriptFiles[self::POS_HEAD][] = Yii::app()->createUrl($this->controller."/".$miniurl);
						$this->_minifyGroups[$miniurl] = $urls;
					}
				}
				
			}
		}

		parent::renderHead($output);
	}

	public function renderBodyEnd(&$output)
	{
		if($this->enableJavaScript){
			if(isset($this->scriptFiles[self::POS_END]) && isset($this->_jsgroups[self::POS_END])){
				$this->scriptFiles[self::POS_END] = array();
				foreach($this->_jsgroups[self::POS_END] as $group_name=>$urls) {
					if($group_name=='notminify') {
						foreach($urls AS $url) {
							$this->scriptFiles[self::POS_END][] = $url;
						}
					} else {
						$miniurl = md5(implode(",", $urls)).".js";
						$this->scriptFiles[self::POS_END][] = Yii::app()->createUrl($this->controller."/".$miniurl);
						$this->_minifyGroups[$miniurl] = $urls;
					}
				}
				
			}
		}

		parent::renderBodyEnd($output);
	}


	public function registerCssFile($url,$media='', $group='default')
	{
		if(strpos($url, 'http') === 0)
			$this->_cssgroups[$media]['notminify'][] = dirname(Yii::app()->request->getScriptFile()).$url;
		else
			$this->_cssgroups[$media][$group][] = dirname(Yii::app()->request->getScriptFile()).$url;

		parent::registerCssFile($url,$media);
	}
	
	public function registerConditionalCssFile($url,$media='', $browser_name, $browser_min_version=null, $browser_max_version=null, $group='default')
	{
		if(is_null($this->_browser)) {
			Yii::import('ext.ExtACClientScriptMinify.vendors.phpbrowscap.Browscap');
			$bc = new Browscap(Yii::app()->runtimePath);
			$this->_browser = $bc->getBrowser();
		}
			
		if($this->_browser->browser == $browser_name) {
			if( (is_null($browser_min_version) || $this->_browser->version >= $browser_min_version) && (is_null($browser_max_version) && $this->_browser->version <= $browser_max_version) ) {
				$this->registerCssFile($url,$media, $group);
			}
		}
	}

	public function registerScriptFile($url,$position=self::POS_HEAD, $group='default')
	{
		if(strpos($url, 'http') === 0)
			$this->_jsgroups[$position]['notminify'][$url] = dirname(Yii::app()->request->getScriptFile()).$url;
		else
			$this->_jsgroups[$position][$group][$url] = dirname(Yii::app()->request->getScriptFile()).$url;

		parent::registerScriptFile($url,$position);
	}
	
	public function registerConditionalScriptFile($url,$position=self::POS_HEAD, $browser_name, $browser_min_version=null, $browser_max_version=null, $group='default')
	{
	if(is_null($this->_browser)) {
			Yii::import('ext.ExtACClientScriptMinify.vendors.phpbrowscap.Browscap');
			$bc = new Browscap(Yii::app()->runtimePath);
			$this->_browser = $bc->getBrowser();
		}
	
		if($this->_browser->browser == $browser_name) {
			if( (is_null($browser_min_version) || $this->_browser->version >= $browser_min_version) && (is_null($browser_max_version) && $this->_browser->version <= $browser_max_version) ) {
				$this->registerScriptFile($url,$position, $group);
			}
		}
	}

	public function registerCoreScript($name, $position=self::POS_HEAD, $group='default')
	{
		$this->coreScriptPosition = $position;

		$aaa = parent::registerCoreScript($name);
		foreach($aaa->coreScripts[$name]['js'] AS $k => $v) {
			$this->_jsgroups[$position][$group][$name] = dirname(Yii::app()->request->getScriptFile()).$this->getCoreScriptUrl().'/'.$v;
		}
	}
	
	
	public function minifyHTML($output) {
		require_once(dirname(dirname(__FILE__)) . '/vendors/minify/min/lib/Minify/HTML.php');
		return Minify_HTML::minify($output);
	}
	
}
