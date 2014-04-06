<?php

/**
 * SMS helper class responsible for sending all SMS all over the application
 * @author Ahmed Sharaf <sharaf.developer@gmail.com>
 */
class SMS {

    public static function instance() {
        return new self;
    }

    public function __construct() {
        
    }

    /**
     * Sends activation code to user
     * @param obj $oUser
     * @return bool
     */
    public function sendActivationCode($oUser) {
        $msg = Yii::t('default', 'Hello ') . $oUser->getName() . "\n";
        $msg .= Yii::t('default', 'Thank you for registration, your activation code is: ') . $oUser->activation_code;
        return Utilities::sendExperttextingSMS($oUser->country_phone_code . $oUser->phone, $msg);
    }

    /**
     * Sends login data to user.
     * @param object $oUser of 'Users' model
     * @param string $password user password
     * @return type
     */
    public function sendLoginData($oUser, $password) {
        $url = Yii::app()->createAbsoluteUrl(Yii::app()->homeUrl);
        $msg = Yii::t('default', 'Hello ') . $oUser->getName() . "\n";
        $msg .= Yii::t('default', 'Username: ') . $oUser->username . "\n";
        $msg .= Yii::t('default', 'Password: ') . $password . "\n";
        $msg .= Yii::t('default', 'Please click to login: ') . $url;
        return Utilities::sendExperttextingSMS($oUser->country_phone_code . $oUser->phone, $msg);
    }
    
    /**
     * Send approved order notification to painter
     * @param object $oOrder of Orders model
     * @return bool 
     */
    public function sendApprovedOrder($oOrder) {
        $msg = Yii::t('default', 'Hello ') . $oOrder->painter->getName() . "\n";
        $msg .= Yii::t('default', 'Invoice: ') . $oOrder->getInvoice() . "\n";
        $msg .= Yii::t('default', 'Order points: ') . $oOrder->points . "\n";
        $msg .= Yii::t('default', 'Total points: ') . $oOrder->painter->painterPoints . "\n";
        return Utilities::sendExperttextingSMS($oOrder->painter->country_phone_code . $oOrder->painter->phone, $msg);
    }
    
    /**
     * Sends activateino notification to user
     * @param obj $oUser
     * @return bool
     */
    public function sendActivationNotification($oUser) {
        $msg = Yii::t('default', 'Hello ') . $oUser->getName() . "\n";
        $msg .= Yii::t('default', 'Your account has been activated');
        return Utilities::sendExperttextingSMS($oUser->country_phone_code . $oUser->phone, $msg);
    }

}