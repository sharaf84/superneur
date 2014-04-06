<?php

// this contains the application parameters that can be maintained via GUI
return array(
    'public' => array(),
    // this is used in contact page
    'securitySalt' => '$2a$13$VB0b6FeM6BRfe3OavZRH5h',
    'uploadDir' => 'uploads', //exists at root dir
//    'experttextingSMS' => array(
//        'URL' => 'www.experttexting.com/exptapi/exptsms.asmx/SendSMS?',
//        'UserID' => 'SHARAF',
//        'PWD' => 'sharaf',
//        'APIKEY' => 'a41ebf25300645',
//        'FROM' => 'DEFAULT',
//        //'isUnicode' => true,
//        //'To' => '201225865732',
//        //'MSG' => 'Hello!',
//    ),
    'experttextingSMS' => array(
        //'URL' => 'www.experttexting.com/exptapi/exptsms.asmx/SendSMS?',//in case isUnicode = false
        'URL' => 'www.experttexting.com/exptapi/exptsms.asmx/SendSMSUnicode?',
        'UserID' => 'SMEKKY',
        'PWD' => 'kairo1243',
        'APIKEY' => '1127211ec4e643',
        'FROM' => 'Superneur',
        'isUnicode' => true,
    ),
    'mailchimp' => array(
        'apiKey' => 'f7e7fdd1080a3aef0adfaf2d89785543-us7',
    ),
    'mandrill' => array(
        'apiKey' => 'zxRZexj_BOkKY7bd_s5qkQ',
        'smtpUser' => 'a.abdelaziz@superneur.com',
        'host' => 'smtp.mandrillapp.com',
        'port' => 587,
        'generalTempleteName' => 'general-template',
        'titleAttr' => 'title',
        'contentAttr' => 'content',
    ),
);
