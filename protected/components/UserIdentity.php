<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    private $_id;
    public $autoLogin = false;

    public function authenticate() {
        $user = Users::model()->find('username=? OR email=?', array($this->username, $this->username));
        if ($user === null) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
            $this->errorMessage = Yii::t('default', 'Incorrect username or password!');
        } elseif (true === ($this->autoLogin === true) ? ($user->password !== $this->password) : !CPasswordHelper::verifyPassword($this->password, $user->password)) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
            $this->errorMessage = Yii::t('default', 'Incorrect username or password!');
        } elseif (!$user->verified) {
            $this->errorMessage = Yii::t('default', 'Not verified. Please verify your account.');
        } elseif ($user->banned) {
            $this->errorMessage = Yii::t('default', 'Banned user. Please contact admin.');
        } else {
            $user->saveAttributes(array(
                'login_token' => Yii::app()->securityManager->generateRandomString('64'),
                'last_login' => date("Y-m-d H:i:s"),
            ));
            $this->_id = $user->id;
            $this->username = $user->username;
            $this->setState('email', $user->email);
            $this->setState('type', $user->type);
            $this->setState('verified', $user->verified);
            $this->setState('banned', $user->banned);
            $this->setState('login_token', $user->login_token);
            $this->errorMessage = '';
            $this->errorCode = self::ERROR_NONE;
        }
        return $this->errorCode == self::ERROR_NONE;
    }

    public function getId() {
        return $this->_id;
    }

}