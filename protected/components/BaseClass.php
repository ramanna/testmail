<?php

class BaseClass extends Controller {

    /**
     * Check is User logged in
     */
    public static function isLoggedIn() {
        if(empty(Yii::app()->session['userId'])){
            header('Location:/');
            die;
        }
    }

    /**
     * Create MD5 Encruption
     * 
     * @param string $data
     * @return encrypted data
     */
    public static function md5Encryption($data) {
        return md5($data);
    }

    /**
     * get 404 page
     * @throws CHttpException
     */
    public static function get404() {
        throw new CHttpException(404, 'Page not found');
    }

    /**
     * Generate new password
     * 
     * @return string
     */
    public static function generatePassword() {
        $chars = '0123456789abcd345efghijklmnopqrstuvwxyzAB345CDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < 8; $i++) {
            $randomString .= $chars[rand(0, strlen($chars) - 1)];
        }
        self::traceLog("Generate New Password: " . $randomString);
        return $randomString;
    }

    /**
     * transaction
     * 
     * @param string $message
     * @param object $object
     */
    public static function traceLog($message, $object = "") {
        Yii::trace($message);
        if ($object) {
            Yii::trace(CVarDumper::dumpAsString($object));
        }
    }

    /**
     *  Upload file function
     * @param type $sourceFile
     * @param type $destinationFolder
     * @param type $destinationFileName
     * @return type
     */
    public static function uploadFile($sourceFile, $destinationFolder, $destinationFileName) {
        if (!is_dir($destinationFolder)) {
            mkdir($destinationFolder, 0777, true);
        }
        try {
            move_uploaded_file($sourceFile, $destinationFolder . $destinationFileName);
            return $destinationFileName;
        } catch (Exception $e) {
            return null;
        }
    }

}
