<?php

class UserController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
 
    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'isloggedin', 'login', 'logindata','getuser','logout'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionGetUser(){
        $postDataObject = json_decode(file_get_contents("php://input"));
        $userListObject = User::searchByEmail($postDataObject->email);
        print_r($userListObject);
        exit;
        
    }
    /**
     * Login render file
     */
    public function actionIndex() { 
        $this->render('index');
    }

    /* Registration Proccess end */

    /* Login Proccess start */

    /**
     *  Login Data function.
     */
    public function actionLoginData() {
        $postDataObject = json_decode(file_get_contents("php://input"));
        $response = array('msg' => "", 'error' => 'Something went wrong...!');
        if (!empty($postDataObject)) {
            $postDataArray['email'] = $postDataObject->email;
            $postDataArray['password'] = BaseClass::md5Encryption($postDataObject->password);
            $response = $this->loginProcess($postDataArray);
        }
        $responseJson = CJSON::encode($response);
        print_r($responseJson);
        exit;
    }

    public function loginProcess($postDataObject) { 
        
        $email = $postDataObject['email'];
        $userObject = User::model()->findByAttributes(array('email'=>$email));
        $password = $postDataObject['password'];
        if ($userObject) {
                if (!empty($userObject) && ($userObject->password == $password)) {
                    Yii::app()->session['userId'] = $userObject->id;
                    Yii::app()->session['email'] = isset($userObject->email) ? $userObject->email : "";
                    $response = 1; //Success
                } else {
                    $response = 0; //Error
                }
        } else {
            $response = 0; //Error
        }
        return $response;
    }
    
    /*
     * Login function
     */

    public function actionLogin() {
        $renderData = "<h1>Cool</h1>";//$this->renderPartial('login');
        print_r($renderData);
        exit;
    }
    
    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect('/');
    }

}