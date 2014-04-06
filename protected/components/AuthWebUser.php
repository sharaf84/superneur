<?php

/**
 * AuthWebUser class file.
 * @author Ahmed Sharaf <sharaf.developer@gmail.com>
 */
class AuthWebUser extends CWebUser {

    public $isMaster = false; // website owner
    public $isAdmin = false; // admin user
    public $isMember = false; // admin user
    public $isAsterisk = false; // user that can access any operation.

    public function init() {
        parent::init();
        switch ($this->getState('type')) {
            case Users::TYPE_MASTER:
                $this->isMaster = true;
                break;
            case Users::TYPE_ADMIN:
                $this->isAdmin = true;
                break;
            
            case Users::TYPE_MEMBER:
                $this->isMember = true;
                break;
        }
        $this->isAsterisk = parent::checkAccess('*');
    }

    /**
     * Performs Auth check for this user.
     * @author Ahmed Sharaf <sharaf.developer@gmail.com> 
     * @return bool whether auth user and exists in db.
     */
    public function isAuth() {
        //return false if isGuest
        if ($this->isGuest)
            return false;
        //return true if authenticated user and his auth data matches those exists in database.
        return Users::model()->exists('id=? AND username=? AND email=? AND type=? AND login_token=? AND verified=? AND banned=?', array(
                    $this->id,
                    $this->name,
                    $this->email,
                    $this->type,
                    $this->login_token,
                    true,
                    false
        ));
    }

    /**
     * Performs access check for this user.
     * @author Ahmed Sharaf <sharaf.developer@gmail.com>
     * @param string $operation the name of the operation that need access check.
     * @param array $params name-value pairs that would be passed to business rules associated
     * with the tasks and roles assigned to the user.
     * @param boolean $allowCaching whether to allow caching the result of access check.
     * @return boolean whether the operations can be performed by this user.
     */
    public function hasAccess($operation, $params = array(), $allowCaching = true) {
        if ($this->isGuest)
            return false;
        if ($this->isMaster || $this->isAdmin || $this->isAsterisk)
            return true;
        return parent::checkAccess($operation, $params, $allowCaching);
    }

    /**
     * Retrieves identity states from persistent storage and saves them as an array.
     * @author Ahmed Sharaf <sharaf.developer@gmail.com>
     * @return array the identity states
     */
    public function getIdentityStates() {
        return parent::saveIdentityStates();
    }

}
