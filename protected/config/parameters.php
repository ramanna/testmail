<?php

$payPal = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
$business = 'ramhemareddy-facilitator@gmail.com';
$payzaURL = "https://sandbox.Payza.com/sandbox/payprocess.aspx";
$payzaAccount = "mavpay9@gmail.com";
$captchaPublicKey = "6LefGxwTAAAAAC8T6c0i-u7L9Tvf1GXK0ScbYWRZ";
$captchaPrivateKey = "6LefGxwTAAAAAGbthgfucVLIL2cyE0u-K6pUXRDY";

if ($_SERVER['DOCUMENT_ROOT'] == '/home/mavpay/beta.mavpay.com') {
    $vkCallBackUrl = 'http://mavpay/user/vkloginorregistration';
    $vkmCallBackUrl = 'http://mavpay/mobile/user/vkloginorregistration';
    $vkAppId = '5667624';
    $vkApiSecret = 'u5bRmYmehuwKJSnIiU8k';

    $linkedinScope = 'r_basicprofile r_emailaddress';
    $linkedinCallBackURL = 'http://mavpay/user/linkedinloginorregistration';
    $linkedinmCallBackURL = 'http://mavpay/mobile/user/linkedinloginorregistration';
    $linkedinApiKey = '81grotw522xvdd';
    $linkedinApiSecret = '1Qeese47lH8DsCLt';
    $staticUrl = 'http://mavpay/';
    $nodeServerPaht = "/usr/local/bin/node";
    $btcSourcePath = 'cd bitcoin/api';
} else {
    $vkCallBackUrl = 'http://toe.dev/user/vkloginorregistration';
    $vkmCallBackUrl = 'http://toe.dev/mobile/user/vkloginorregistration';
    $vkAppId = '5447494';
    $vkApiSecret = 'VkBnpf0quSnYP0H5a7TV';
 
    $linkedinScope = 'r_basicprofile r_emailaddress';
    $linkedinCallBackURL = 'http://toe.dev/user/linkedinloginorregistration';
    $linkedinmCallBackURL = 'http://toe.dev/mobile/user/linkedinloginorregistration';
    $linkedinApiKey = '752vmui9qr0658';
    $linkedinApiSecret = 'Yz66AR7xIDFRwveX';
    $staticUrl = 'http://toe.dev';
    $nodeServerPaht = "node";
    $btcSourcePath = 'cd bitcoin/api';
}

$btcToken = '8e52d1fdc2014ee44dbe7b179d9bdc7a376672e812f8dae7817c7ddaca35bce8';
$btcPassphrase = 'ramhemareddy99';
$companyBTCWalletId = '2N4hSUcRpvLhKZk9Q5ZbwW8rKGpW1Nx24X5';

if ($_SERVER['DOCUMENT_ROOT'] == '/home/mavpay/beta.mavpay.com') {
    $staticUrl = 'http://mavpay.com';
    $nodeServerPaht = "/usr/local/bin/node";
    $btcSourcePath = 'cd bitcoin/api';
} else {
    $staticUrl = 'http://mavpay.dev';
    $nodeServerPaht = "node";
}
$adminEmail = 'no-reply@mavpay.com';
$adminFromName = 'MavPay';
return array(
   'imagePath' => array(
        'homePageSlider' => '/upload/homepageSlider/',
        'upload' => 'upload/',
        'imageNotFound' => '/images/image_not_found.jpg',
    ),
    'currencyLogo' => "/currency_logo/",
    'gatewayLogos' => "/upload/gateway_logo/",
    'defaultPageSize' => 50,
    'logoutUrl' => '/mpadmin',
    'adminFromName' => $adminFromName,
    'adminEmail' => $adminEmail,
    'adminId' => '1',
    'defaultDepartmentName' => 'support',
    'recordsPerPage' => array('50' => 50, '100' => 100, '200' => 200),

    'MaxUploadSize' => 2097152, //2MB 
    
    'notifyURL' => 'https://' . $_SERVER['HTTP_HOST'] . '/user/notifyurlstp',
    'paymentResponse' => 'http://' . $_SERVER['HTTP_HOST'] . '/payment/paymentresponse',
    //mailAddress
    'mailAddressOne' => "Trident chambers , PO 1388",
    'mailAddressTwo' => "Victoria , Mahe",
    'mailAddressThree' => "Seychelles",
    //mailmobileno
    'mailPhoneno' => "+443308220388",
    //mailmailId
    'mailMailId' => "support@mavpay.com",
    //mail skype Id        
    'mailskypeId' => "mavpay.com",
    //Google captch keys
    'googleCaptchaPublicKey' => $captchaPublicKey,
    'googleCaptchaPrivateKey' => $captchaPrivateKey,
    'ip' => $_SERVER['REMOTE_ADDR'],
    'set_time_out' => 900,
    'vkCallBackUrl' => $vkCallBackUrl,
    'vkmCallBackUrl' => $vkmCallBackUrl,
    'vkAppId' => $vkAppId,
    'vkApiSecret' => $vkApiSecret,
    'linkedinScope' => $linkedinScope,
    'linkedinCallBackURL' => $linkedinCallBackURL,
    'linkedinmCallBackURL' => $linkedinmCallBackURL,
    'linkedinApiKey' => $linkedinApiKey,
    'linkedinApiSecret' => $linkedinApiSecret,
    'staticUrl' => $staticUrl,
    'onfxzoneId' => 38,
     'smsConfig' => array(
        'API_KEY' => "d0f8eb30",
        'API_SECRET' => "02fd7737",
        'API_URL' => 'https://rest.nexmo.com/sms/json?',
        'api_key' => "",
        'api_secret' => "",
        'from' => '',
        'apiUrl' => ''
    ),
    'paymentGateway' => array(
         'paypal' => array(
            'target_url' => $payPal,
            'notify' => '/ipn/paypal',
            'ipn_verify_url' => $payPal,
            'business' => $business,
        ),
        'MGloballyRP' => array(
            'url' => 'http://dev.mglobally.biz/access/',
            'success_url' => 'http://' . $_SERVER['HTTP_HOST'],
            'cancel_url' => 'http://' . $_SERVER['HTTP_HOST'],
            'getCode' => 'http://dev.mglobally.biz/access/getToken',
            'host' => 'mavpaydev',
            'merchent' => 'M9000009',
        ),
       'perfectmoney' => array(
            'url' => 'https://perfectmoney.is/api/step1.asp',
            'pay_account' => 'U9782398',
            'pay_name' => 'Top One Exchange Ltd',
            'payment_id' => '5100996',
            'status_url' => 'mavpay9@gmail.com',
        ),
        'bitcoin' => array(
            'target_url' => 'https://sandbox.coinbase.com/checkouts/',
            'notify' => 'http://' . $_SERVER['HTTP_HOST'] . '/ipn/bitcoin',
            'ipn_verify_url' => 'https://sandbox.coinbase.com/checkouts/',
        ),
        'fasapay' => array(
            'url' => 'https://sci.fasapay.com/',
            'acc' => 'FP141309',
            'notify' => 'http://' . $_SERVER['HTTP_HOST'] . '/ipn/fasapay',
            'ipn_verify_url' => 'https://sci.fasapay.com/',
        ),
        'btc' => array(
            'webHookUrl' => 'http://mavpay/site/transactionresponse',
            'token' => $btcToken,
            'env' => 'test',
            'walletPassphrase' => $btcPassphrase,
            'companyWalletId' => $companyBTCWalletId,
        ),
        'payeer' => array(
            //payeer payment 
            'url' => 'https://payeer.com/merchant/',
            /* Backend Front User */
            'shop_back' => '173197621',
            'key_back' => 'RDyilEElWitze2hC',
    ),
    ),
    'googlePlus' => array(
        'google_client_id' => "1081312269279-ktv819hkae4nul4a266pu5hshmrgapk3.apps.googleusercontent.com",
        'google_client_secret' => "QPbE7dTQw-hOV36iB8MGMJHJ",
        'google_redirect_uri' => "http://beta.mavpay.com/user/googleplus",
        'google_m_redirect_uri' => "http://beta.mavpay.com/mobile/user/googleplus",
        'homeUrl' => "http://beta.mavpay.com",
    ),
    'btcToken' => $btcToken,
    'nodeServerPaht' => $nodeServerPaht,
    'btcSourcePath' => $btcSourcePath,
    /* using this for admin need to remove if we change admin side with angular js */
    'recordsPerPage' => array('50' => 50, '100' => 100, '200' => 200),
	'encryptionPassword' => "9742023299271183",
);
