<?php

class MailController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = 'main';
    public function init() {
        BaseClass::isLoggedIn();
    }
    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('inbox','sent','draft','trash', 'compose', 'fileupload', 'addmail', 'getsentmail',
                    'getmail', 'trashmail', 'draftmail'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'composemail'),
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

    /**
     * reading department names to support dropdown
     */
    public function actionCompose() {
        $this->render("compose");
    }
    /**
     * reading department names to support dropdown
     */
    public function actionInbox() {
        $this->render("list");
    }
    /**
     * reading department names to support dropdown
     */
    public function actionSent() {
        $this->render("sent");
    }
    /**
     * reading department names to support dropdown
     */
    public function actionDraft() {
        $this->render("draft");
    }
    /**
     * reading department names to support dropdown
     */
    public function actionTrash() {
        $this->render("trash");
    }
    
    /**
     * Function for file Upload
     */
    public function actionFileupload() {
        $fileDataArray = end($_FILES);
        $destinationFolder = Yii::getPathOfAlias('webroot') . '/upload/mail/';
        $newfilename = BaseClass::uploadFile($fileDataArray['tmp_name'], $destinationFolder, $fileDataArray['name']);
        echo $fileDataArray['name'];
    }
    
    /**
     * Create Mail function
     * TODO: This is not an optimize code Need to optimize
     * TODO: Create Transaction with will help is data manupulation required.
     */
    public function actionaddmail() {
        $postDataObject = json_decode(file_get_contents("php://input"));
        $loggedInUserId = Yii::app()->session['userId'];
        if (isset($postDataObject) && !empty($postDataObject)) {
             $response = array('msg' => "", 'error' => 'Mail Not Sent.');
            $postDataArray['title'] = $postDataObject->subject;
            $saveMail = Mail::create($postDataArray);
            if($saveMail){
            $postDataArray['mail_id'] = $saveMail->id;
            $postDataArray['description'] = $postDataObject->msg_body;
            $postDataArray['attachment'] = $postDataObject->attachment;
            $mailConversation = MailConversation::create($postDataArray);   
            if($mailConversation){
                $postDataArray['mail_id'] = $saveMail->id;
                $postDataArray['user_id'] = $loggedInUserId;
                $postDataArray['status'] = $postDataObject->type == "send"?"SENT":"DRAFT";
                $userFromMail = UserHasMail::create($postDataArray);
                if($userFromMail && $postDataObject->type == "send"){
                $postDataArr['mail_id'] = $saveMail->id;
                $postDataArr['user_id'] = 3;//receiver id shd add here
                $postDataArr['status'] = "RECEIVED";
                $userMail = UserHasMail::create($postDataArr);
                }
                $response = array('msg' => "Mail Sent Succesfully", 'error' => '');
            }
            }
        }
         $responseJson = CJSON::encode($response);
        print_r($responseJson);
        exit;
    }
    
    
     /**
     *  Getsentmail Mail function
     */
    public function actionGetsentmail() {
        $userJSONData = $this->getMailData($_POST, "SENT");
        echo $userJSONData ; exit;
    }
    
    /**
     *  Draftmail Mail function
     */
    public function actionDraftmail() {
        $userJSONData = $this->getMailData($_POST, "DRAFT");
        echo $userJSONData ; exit;
    }
    
    /**
     *  Draftmail Mail function
     */
    
     public function actionTrashmail() {
        $userJSONData = $this->getMailData($_POST, "TRASH");
        echo $userJSONData; exit;
    }
    
    /**
     * get Mails List
     */
     public function actionGetmail() {
        $userJSONData = $this->getMailData($_POST, "RECEIVED");
        echo $userJSONData; exit;
    }
    
    /**
     * Comman function to get the complete search result
     * 
     * @param type $postData
     * @param type $type
     * @return string
     */
    private function getMailData($postData, $type){
         $limit = (int) isset($postData['length']) ? $postData['length'] : 50;
        $offset = (int) isset($postData['start']) ? $postData['start'] : 0;
        $draw = (int) isset($postData['draw']) ? $postData['draw'] : 1;
        $orderBy = "";
        if (isset($postData['order'])) {
            $fieldOrderId = $postData['order'][0]['column'];
            $orderString = $postData['order'][0]['dir'];
            $orderBy = $postData['columns'][$fieldOrderId]['data'] . " " . $orderString;
        }
        $searchValue = "";
        $dataQuery = Yii::app()->db->createCommand()
                ->select('uhm.id, uhm.status, m.title, mc.attachment, uhm.updated_at, m.id as mailid')
                ->from('user_has_mail uhm')
                ->leftjoin("mail m", "m.id = uhm.mail_id")
                ->leftjoin("mail_conversation mc", "uhm.id = mc.mail_id")
                ->where('uhm.status="'.$type.'" AND uhm.user_id = '.Yii::app()->session['userId']);
                //->where('uhm.user_id=1 AND uhc.to_user_id = ' . Yii::app()->session['userId']);
        if (!empty($postData['search']['value'])) {
            $searchData = $postData['search']['value'];
            $dataQuery->andWhere('m.title LIKE :title', array(':title' => '%' . $searchData . '%'));
        }
        $dataQuery->order($orderBy)->limit($limit)->offset($offset);
        $userListObject = $dataQuery->queryAll();
        $countQuery = Yii::app()->db->createCommand()
                ->select('count(*) as totalRecords')
                ->from('user_has_mail uhm')
                ->leftjoin("mail m", "m.id = uhm.mail_id")
                ->leftjoin("mail_conversation mc", "uhm.id = mc.mail_id")
                ->where('uhm.status="'.$type.'" AND uhm.user_id ='.Yii::app()->session['userId']);
        if (!empty($_POST['search']['value'])) {
            $searchData = $_POST['search']['value'];
            $countQuery->andWhere('m.title LIKE :title', array(':title' => '%' . $searchData . '%'));
        }
        $totalRecordsArray = $countQuery->queryRow();

        $userObjectCount = $totalRecordsArray['totalRecords'];

        $userJSONData = CJSON::encode($userListObject);
        $responseJsoneData = '{"draw": ' . $draw . ',
                    "recordsTotal": ' . $userObjectCount . ',
                    "recordsFiltered": ' . $userObjectCount . ',
                    "data":' . $userJSONData . '
        }';
        return $responseJsoneData;
    }
}
