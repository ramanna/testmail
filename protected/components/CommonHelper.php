<?php

/**
 * Class contains of some common helper functions which are used across the site.
 */
class CommonHelper {

    /**
     * Global function to send an email from the application.
     * @param  array $config Accepts an details of the mail like to, from body...
     * @return boolean       Mail sending status.
     */
    public static function sendMail($config) {
       // return true;
        if (!empty($config) && !empty($config['to']) && !empty($config['subject']) && !empty($config['body'])) {
            Yii::import('application.extensions.yii-mail.YiiMailMessage');
            $message = new YiiMailMessage();
            $message->setTo($config['to']);
            if (empty($config['from'])) {
                $message->setFrom(array(Yii::app()->params['adminEmail'] => Yii::app()->params['adminFromName']));
            } else {
                $message->setFrom($config['from']);
            }
            $message->setSubject($config['subject']);
            $message->setBody($config['body'], 'text/html');

            if (isset($config['file_path'])) {
                $swiftAttachment = Swift_Attachment::fromPath($config['file_path']);
                $message->attach($swiftAttachment);
            }
//            echo "<pre>"; print_r($message);exit;
            if (Yii::app()->mail->send($message) > 0) {
                return true;
            }
        }
        return false;
    }

    /**
     * 
     * @param type $length
     * @return \lengthGenerate unique id
     * @param int limit
     * 
     * @return length
     */
    public static function generateUniqueId($length = 10) {
        return substr(md5(uniqid(mt_rand(), true)), 0, $length);
    }

    /**
     * Returns the array differece, if both the array are differs in any way
     * @param  Array $arr1 Array1 to compare
     * @param  Array $arr2 Array2 to compare
     * @return Boolean Status weather both array are different at any point.
     */
    public static function arrayDifference($arr1, $arr2) {
        if (!count(array_diff($arr1, $arr2)) && !count(array_diff($arr2, $arr1))) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Generates unique name for the images
     * @param  String $image_name actual name of the Image
     * @return String New name of the image.
     */
    public static function generateNewNameOfImage($image_name) {
        $extension = pathinfo($image_name, PATHINFO_EXTENSION);
        $name = md5(uniqid(microtime(), true));
        return $name . "." . strtolower($extension);
    }

    /**
     * Function to generate resize the images based on passed resolutions
     * @param  string $inputFilePath  abs input file path
     * @param  string $inputFileName  file name
     * @param  string $outputFilePath abs output file path
     * @param  string $outputFileName file name
     * @param  array  $options        array of dimenstions
     */
    public static function generateResizeImage($inputFilePath, $inputFileName, $outputFilePath, $outputFileName, $options) {
        Yii::import('application.extensions.EWideImage.EWideImage');
        $inputImage = $inputFilePath . "/" . $inputFileName;
        $outputImage = $outputFilePath . "/" . $outputFileName;
        $extension = pathinfo($inputImage, PATHINFO_EXTENSION);
        $quality = (strtolower($extension) == 'png') ? 9 : 90;
        list($imageWidth, $imageHeight) = getimagesize($inputImage);
        if (is_array($options) && !empty($options)) {
            foreach ($options as $key => $value) {
                $imageSize = array();
                $imageSize = explode('_', $value);
                $imageSizeNew = $imageSize;
                if (!is_dir($outputFilePath . "/" . $value)) {
                    mkdir($outputFilePath . "/" . $value, 0777, true);
                }
                if (($imageWidth == $imageSize[0]) && ($imageHeight == $imageSize[1])) {
                    $cpSrc = $_SERVER['DOCUMENT_ROOT'] . '/' . $inputFilePath . $inputFileName;
                    $cpDes = $_SERVER['DOCUMENT_ROOT'] . '/' . $outputFilePath . "/" . $value . "/" . $inputFileName;
                    copy($cpSrc, $cpDes);
                } else {
                    EWideImage::load($inputImage)->resize($imageSizeNew[0], $imageSizeNew[1], 'inside', 'down')->saveToFile($outputFilePath . "/" . $value . "/" . $inputFileName, $quality);
                }
            }
        }
    }

    public static function search($value, $model, $columns, $with = array(), $selected = "") {
        $pageSize = Yii::app()->params['defaultPageSize'];
        if ($selected && $selected == "status_active") {
            $selected = "status";
            $value = 1;
        } elseif ($selected && $selected == "status_inactive") {
            $selected = "status";
            $value = 0;
        }
        $condition = $selected . " like '%" . $value . "%'";

        if (!$selected) {
            $condition = "";
            foreach ($columns as $column) {
                $condition .= " OR " . $column . " like '%" . $value . "%' ";
            }
            $condition = substr($condition, 3);
        }
        $criteria = new CDbCriteria(array(
            'condition' => $condition,
            'with' => $with,
        ));
        $dataProvider = new CActiveDataProvider($model, array(
            'criteria' => $criteria,
            'pagination' => array('pageSize' => $pageSize),
        ));
        return $dataProvider;
    }

    public function loadModelByName($id, $name) {
        $model = $name::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public static function formatContactNo($contactNo = null) {
        if (Yii::app()->language == 'en') {

            $tempArry = explode("/", $contactNo);
            if (!isset($tempArry[1])) {
                $tempArry = explode(",", $contactNo);
            }

            foreach ($tempArry as $key => $value) {
                //if(isset($tempArry[0])){
                $value = preg_replace('/[^0-9]/', '', $value);
                $value = preg_replace('/^91/', '0', $value);
                if ($value && !preg_match('/^[0]{1}/', $value)) {
                    if (strlen($value) > 8) {
                        $value = '0' . $value;
                    }
                }
                $tempArry[$key] = $value;
                //}
            }
            $contactNo = implode('/ ', $tempArry);
        }
        return $contactNo;
    }

    public static function getNewDBConnection($dbOptions) {
        $dsn = "mysql:host=$dbOptions[DBHOST];dbname=$dbOptions[DBNAME]";
        return new CDbConnection($dsn, $dbOptions['DBUSER'], $dbOptions['DBPASS']);
    }

    // registering user
    public static function registration($email, $postDataArray="") {
        $userObject = User::model()->findByAttributes(array('email' => $email));
        if (!empty($userObject)) {
            if(isset($postDataArray['country_code']) && isset($postDataArray['phone'])){
            $userObject->country_code = $postDataArray['country_code'];
            $userObject->phone = $postDataArray['phone'];
            $userObject->update();
                        }
            Yii::app()->session['tempuserid'] = $userObject->id;
            return $userObject;
        } else {
            // registering the user
            $userObject = new User;
            $postDataArray['email'] = $email;
            $postDataArray['role_id'] = 1;

            $rand = BaseClass::md5Encryption(date('YmdHis'), 5); // For the activation link
            $postDataArray['hash'] = $rand;
            $activation_url = Yii::app()->getBaseUrl(true) . "/user/activation?token=" . $rand;
            $userObject = User::model()->recordSave($postDataArray, $userObject);

            if (!empty($userObject)) {
                $profile = new Profile;
                $profile->user_id = $userObject->id;
                $profile->save(false);

                Yii::app()->session['tempuserid'] = $userObject->id;
//                $config['to'] = $userObject->email;
//                $config['subject'] = 'Registration Confirmation';
//                $config['body'] = $this->renderPartial('//mailtemp/registertemp', array('activationurl' => $activation_url), true);
//                CommonHelper::sendMail($config);
                return $userObject;
            }
        }
    }

    /**
     * MyCrypt encription
     * 
     * @param type $input
     * @return type
     */
    public static function passwordEncrypt($input) {
        $key = Yii::app()->params['encryptionPassword'];
        $cryptedText = mcrypt_encrypt(
                MCRYPT_RIJNDAEL_128, $key, $input, MCRYPT_MODE_ECB
        );
        $cryptedValue = str_replace("+", "*", base64_encode($cryptedText));
        return $cryptedValue;
    }

    /**
     * MyDecrypt 
     * 
     * @param type $input
     * @return type
     */
    public static function passwordDecrypt($input) {
        $input = str_replace("*", "+", $input);
        $key = Yii::app()->params['encryptionPassword'];
        return mcrypt_decrypt(
                MCRYPT_RIJNDAEL_128, $key, base64_decode($input), MCRYPT_MODE_ECB
        );
    }
    
    /**
     * 
     * @param type $url
     * @param type $key
     * @return type
     */
     public static function remove_querystring_var($url, $key) {
        $url = preg_replace('/(.*)(\?|&)' . $key . '=[^&]+?(&)(.*)/i', '$1$2$4', $url . '&');
        $url = substr($url, 0, -1);
        return $url;
    }
    
        /**
     *  Get client IP address.
     * @return string
     */
    public static function get_client_ip_server() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if (isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';

        return $ipaddress;
    }
    
    public static function getBrowser() {
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        
        $browser        =   "Unknown Browser";

        $browser_array  =   array(
                                '/MSIE/i'       =>  'Internet Explorer',
                                '/firefox/i'    =>  'Firefox',
                                '/safari/i'     =>  'Safari',
                                '/chrome/i'     =>  'Chrome',
                                '/edge/i'       =>  'Edge',
                                '/Opera/i'      =>  'Opera',
                                '/netscape/i'   =>  'Netscape',
                                '/maxthon/i'    =>  'Maxthon',
                                '/konqueror/i'  =>  'Konqueror',
                                '/mobile/i'     =>  'Handheld Browser'
                            );

        foreach ($browser_array as $regex => $value) { 

            if (preg_match($regex, $user_agent)) {
                $browser    =   $value;
            }

        }

    return $browser;
    }
    
        public static function getOS() {
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        
        $os_platform    =   "Unknown OS Platform";

        $os_array       =   array(
                            '/windows nt 10/i'     =>  'Windows 10',
                            '/windows nt 6.3/i'     =>  'Windows 8.1',
                            '/windows nt 6.2/i'     =>  'Windows 8',
                            '/windows nt 6.1/i'     =>  'Windows 7',
                            '/windows nt 6.0/i'     =>  'Windows Vista',
                            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                            '/windows nt 5.1/i'     =>  'Windows XP',
                            '/windows xp/i'         =>  'Windows XP',
                            '/windows nt 5.0/i'     =>  'Windows 2000',
                            '/windows me/i'         =>  'Windows ME',
                            '/win98/i'              =>  'Windows 98',
                            '/win95/i'              =>  'Windows 95',
                            '/win16/i'              =>  'Windows 3.11',
                            '/macintosh|mac os x/i' =>  'Mac OS X',
                            '/mac_powerpc/i'        =>  'Mac OS 9',
                            '/linux/i'              =>  'Linux',
                            '/ubuntu/i'             =>  'Ubuntu',
                            '/iphone/i'             =>  'iPhone',
                            '/ipod/i'               =>  'iPod',
                            '/ipad/i'               =>  'iPad',
                            '/android/i'            =>  'Android',
                            '/blackberry/i'         =>  'BlackBerry',
                            '/webos/i'              =>  'Mobile'
                        );

        foreach ($os_array as $regex => $value) { 

            if (preg_match($regex, $user_agent)) {
                $os_platform    =   $value;
            }

        }   

    return $os_platform;
    }
    
    public static function isFileValid($fileName, $size) {
        $error = "";
        $fileNameArray = explode(".", $fileName);
        $ext = strtolower(end($fileNameArray));

        $uploadSize = $_FILES['attachment']["size"];
        if ($uploadSize > $size) {
            $error .= "File can not be greater than 2MB";
        } elseif ($ext != "jpg" && $ext != "jpeg" && $ext != "png" && $ext != "pdf") {
            $error .= "Incorrect File Type";
        }
        return $error;
    }
    
   public static function timeElapsed($time){
        $time = time() - $time; // to get the time since that moment
        $time = ($time<1)? 1 : $time;
        $tokens = array (
            31536000 => 'year',
            2592000 => 'month',
            604800 => 'week',
            86400 => 'day',
            3600 => 'hour',
            60 => 'minute',
            1 => 'second'
        );

        foreach ($tokens as $unit => $text) {
            if ($time < $unit) continue;
            $numberOfUnits = floor($time / $unit);
            return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
        }

    }
}
