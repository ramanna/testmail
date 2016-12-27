<?php

class SiteController extends Controller {

    public function __construct() {
    }

    
    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() { 
        $this->render("site/index");
    }
    

}
