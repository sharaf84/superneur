<?php

/**
 * Emails helper class responsible for sending all emails all over the application
 * @author Ahmed Sharaf <sharaf.developer@gmail.com>
 */
class Emails {

    public $fromName;
    public $fromEmail;
    public $replyTo;

    public static function instance() {
        return new self;
    }

    public function __construct() {
        $this->fromName = 'superneur';
        $this->fromEmail = 'admin@superneur.com'; //Controller::$settings['admin_email'];
        $this->replyTo = 'admin@superneur.com'; //Controller::$settings['admin_email'];
    }

    /**
     * SendMail function used to send E-Mails to the users using the MANDRILL API.
     * Ex: Emails::sendMail(array(array('name'=>'Ahmed', 'email'=>'a.abdelaziz.eg@gmail.com')), 'Superneur', '<strong>YEEEEEEEEEESSS</strong>', true,false);
     *
     * @author Ahmed Abdelaziz <a.abdelaziz@nilecode.com>
     * @param array   $to      array of the recievers of keys('name', 'email').
     * @param string  $subject the mail subject.
     * @param string  $content the E-Mail content.
     * @param boolean $replyTo the ability of replying to the email from the reciever, Default false.
     * @param array   $attachments 
     * @param boolean $returnBoolean Wheather to return boolean or array, Default True.
     * 
     * @return array structs for each recipient containing the key "email" with the email address and "status" as either "sent", "queued", "scheduled", or "rejected"
     */
    public function sendMail($to, $subject, $content, $replyTo = FALSE, $attachments = array(), $returnBoolean = TRUE) {
        //Import Mandrill Class
        Yii::import('application.vendors.mandrill.Mandrill');

        $mandrill = new Mandrill(Yii::app()->params['mandrill']['apiKey']);
        $template_name = Yii::app()->params['mandrill']['generalTempleteName'];

        $template_content = array(
            array(
                'name' => Yii::app()->params['mandrill']['titleAttr'],
                'content' => $subject
            ),
            array(
                'name' => Yii::app()->params['mandrill']['contentAttr'],
                'content' => $content
            ),
        );

        $message = array(
            'subject' => $subject,
            'from_email' => $this->fromEmail,
            'from_name' => $this->fromName,
            'to' => $to,
            'headers' => array('Reply-To' => ($replyTo) ? $this->replyTo : ''),
            'important' => false,
            'track_opens' => null,
            'track_clicks' => null,
            'auto_text' => null,
            'auto_html' => null,
            'inline_css' => null,
            'url_strip_qs' => null,
            'preserve_recipients' => null,
            'view_content_link' => null,
            'bcc_address' => '',
            'tracking_domain' => null,
            'signing_domain' => null,
            'return_path_domain' => null,
            'merge' => true,
            'global_merge_vars' => array(
                array(
                    'name' => 'merge1',
                    'content' => 'merge1 content'
                )
            ),
            'merge_vars' => array(
                array(
                    'rcpt' => 'recipient.email@example.com',
                    'vars' => array(
                        array(
                            'name' => 'merge2',
                            'content' => 'merge2 content'
                        )
                    )
                )
            ),
            'tags' => array('password-resets'),
//            'subaccount'                => 'customer-123',
//            'google_analytics_domains'  => array('example.com'),
//            'google_analytics_campaign' => 'message.from_email@example.com',
            'metadata' => array('website' => 'www.superneur.com'),
//            'recipient_metadata' => array(
//                array(
//                    'rcpt'    => 'a.abdelziz@nilecode.com',
//                    'values'  => array('user_id' => 123456)
//                )
//            ),
//            'attachments'               => array(
//                array(
//                    'type'    => 'text/plain',
//                    'name'    => 'myfile.txt',
//                    'content' => 'ZXhhbXBsZSBmaWxl'
//                )
//            ),
//            'images'          => array(
//                array(
//                    'type'    => 'image/png',
//                    'name'    => 'IMAGECID',
//                    'content' => 'ZXhhbXBsZSBmaWxl'
//                )
//            )
                ) + (!empty($attachments) ? array('attachments' => $attachments) : array());

        $async = false;
        $ip_pool = 'Main Pool';
//        $send_at = 'example send_at';
        $result = $mandrill->messages->sendTemplate($template_name, $template_content, $message, $async);

        if ($returnBoolean) {
            return ($result[0]['status'] != 'rejected') ? true : false;
        }

        return $result;
    }

    /**
     * Send conatc mail from user to admin
     * @author Ahmed Sharaf <sharaf.developer@gmail.com>
     * @param obj $model 'ContactForm' model
     * @return bool
     */
    public function sendContact($model) {
        $to = array(array('name' => $this->fromName, 'email' => $this->fromEmail));
        $this->fromEmail = $model->email;
        $this->replyTo = $model->email;
        $subject = $model->topic . " - " . $model->subject;
        return $this->sendMail($to, $subject, $model->body, true);
    }

    /**
     * Send email to user with his login data.
     * @param object $oUser of 'Users' model
     * @param string $password user password
     * @return type
     */
    public function sendLoginData($oUser, $password) {
        $url = Yii::app()->createAbsoluteUrl(Yii::app()->homeUrl);
        $to = array(array('name' => $oUser->getName(), 'email' => $oUser->email));
        $subject = Yii::t('default', 'User login data');
        $content = Yii::t('default', 'Hello ') . $oUser->getName() . '<br />';
        $content .= Yii::t('default', 'You username is: ') . $oUser->username . '<br />';
        $content .= Yii::t('default', 'You password is: ') . $password . '<br />';
        $content .= Yii::t('default', 'Please click to login: ') . CHtml::link($url, $url);
        return $this->sendMail($to, $subject, $content);
    }

    /**
     * Send verification mail to user
     * @author Ahmed Sharaf <sharaf.developer@gmail.com> 
     * @param object $oUser of Users model
     * @return bool 
     */
    public function sendVerification($oUser) {
        $url = Yii::app()->createAbsoluteUrl('site/verify', array('token' => $oUser->token));
        $to = array(array('name' => $oUser->getName(), 'email' => $oUser->email));
        $subject = Yii::t('default', 'Superneur verification mail');
        $content = Yii::t('default', 'Hello ') . $oUser->getName() . '<br />';
        $content .= Yii::t('default', 'Please click to verify your account: ') . CHtml::link($url, $url);
        return $this->sendMail($to, $subject, $content);
    }

    /**
     * Send forgot password mail to user
     * @author Ahmed Sharaf <sharaf.developer@gmail.com>
     * @param object $oUser of Users model
     * @return bool 
     */
    public function sendForgotPassword($oUser) {
        $url = Yii::app()->createAbsoluteUrl('site/checkPasswordToken', array('token' => $oUser->password_reset_token));
        $to = array(array('name' => $oUser->getName(), 'email' => $oUser->email));
        $subject = Yii::t('default', 'Superneur forgot password mail');
        $content = Yii::t('default', 'Hello ') . $oUser->getName() . '<br />';
        $content .= Yii::t('default', 'Please click to reset your password: ') . CHtml::link($url, $url);
        return $this->sendMail($to, $subject, $content);
    }

    
    /**
     * Sends activateino notification to user
     * @param obj $oUser
     * @return bool
     */
    public function sendActivationNotification($oUser) {
        $to = array(array('name' => $oUser->getName(), 'email' => $oUser->email));
        $subject = Yii::t('default', 'Superneur activation notification');
        $content = Yii::t('default', 'Hello ') . $oUser->getName() . "\n";
        $content .= Yii::t('default', 'Your account has been activated');
        return $this->sendMail($to, $subject, $content);
    }

}