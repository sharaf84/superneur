<?php

/**
 * This is the model class for table "shft_users".
 *
 * The followings are the available columns in table 'shft_users':
 * @property string $id
 * @property string $username
 * @property string $email
 * @property string $type
 * @property string $password
 * @property integer $verified
 * @property integer $activated
 * @property integer $banned
 * @property string $token
 * @property string $token_date
 * @property string $login_token
 * @property string $last_login
 * @property string $activation_code
 * @property string $activation_date
 * @property string $national_id
 * @property string $new_email
 * @property string $new_phone
 * @property string $first_name
 * @property string $last_name
 * @property string $gender
 * @property string $birthdate
 * @property integer $country_phone_code
 * @property string $phone
 * @property string $facebook_identifier
 * @property string $metadata
 * @property string $created
 * @property string $updated
 * @property string $created_by
 * @property string $assigned_to
 *
 * The followings are the available model relations:
 * @property Addresses[] $addresses
 * @property Cards[] $cards
 * @property Blocks[] $blocks
 * @property Orders[] $orders
 * @property Orders[] $latestOrders
 * @property Orders $draftOrders
 * @property Orders $ordersPoints
 * @property Users $createdBy
 * @property Users[] $createdUsers
 * @property Users $assignedTo
 * @property Users[] $assignedUsers
 * 
 * @author Ahmed Sharaf <a.sharaf@shift.com.eg>
 */
class Users extends Base {
    /**
     * const of users types
     */

    const TYPE_MASTER = '1';
    const TYPE_ADMIN = '2';
    const TYPE_MEMBER = '3';
    
    const TYPE_AVATAR = '1';
    const TYPE_COVER = '2';

    /**
     * used for password compare
     * @var string 
     */
    public $password_repeat;

    
    /**
     * metadata keys
     * @var array 
     */
    static $metadataKeys = array(
        'first_name',
        'last_name',
        'gender',
        'birth_date',
        'avatar_path',
        'avatar',
        'brief',
        'cover_path',
        'cover',
        'company',
        'title',
        'website',
        'country',
        'state',
        'city',
        'address',
        'postal_code',
        'timezone',
        'country_code',
        'phone',
        'account_type',
        'access',
        'security_question',
        'answer',
        'facebook_identifier',
        'twitter_identifier',
        'linkedin_identifier',
        'google_identifier',
        'paypal_email',
    );
    //meatdata attrs
    public $first_name;
    public $last_name;
    public $gender;
    public $birth_date;
    public $avatar_path;
    public $avatar;
    public $cover_path;
    public $cover;
    public $company;
    public $title;
    public $brief;
    public $website;
    public $country;
    public $state;
    public $city;
    public $address;
    public $postal_code;
    public $timezone;
    public $country_code; //Country phone code
    public $phone;
    public $account_type; //Public, Internal, Private
    public $access;
    public $security_question;
    public $answer;
    public $facebook_identifier;
    public $twitter_identifier;
    public $linkedin_identifier;
    public $google_identifier;
    public $paypal_email;
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'sprnr_users';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('first_name, last_name, phone, username, email, type', 'required', 'on' => 'create, update, register'),
            array('username, email, new_email, phone, new_phone, token, login_token, activation_code, national_id', 'unique', 'on' => 'create, update, register'),
            array('username', 'ext.validators.alpha', 'startWithChar' => true, 'allowNumbers' => true, 'minChars' => 3, 'maxChars' => 16, 'extra' => array('.'), 'message' => Yii::t('default', 'Username should be alphanumeric from 3 to 16, starting with character.'), 'on' => 'create, update, register'),
            array('password, password_repeat', 'required', 'on' => 'create, register'),
            array('password', 'length', 'min' => 5, 'max' => 20),
            array('password_repeat', 'compare', 'compareAttribute' => 'password'),
            array('email, new_email', 'email', 'checkMX' => false),
            array('type', 'in', 'range' => ($this->id == 1) ? array(self::TYPE_MASTER) : array_keys(self::getTypeList())),
            array('gender', 'in', 'range' => array_keys(self::getGenderList())),
            array('first_name, last_name', 'length', 'max' => 45),
            array('created_by', 'length', 'max' => 10),
            array('token, login_token', 'length', 'max' => 123),
            array('facebook_identifier', 'length', 'max' => 255),
            array('phone, new_phone', 'length', 'min' => 11, 'max' => 11),
            array('activation_code', 'length', 'min' => 6, 'max' => 6),
            array('national_id', 'length', 'min' => 14, 'max' => 14),
            array('activation_code, country_phone_code, phone, new_phone, national_id, created_by', 'numerical', 'integerOnly' => true),
            array('verified, activated, banned', 'boolean'),
            //array('token_date, last_login, birthdate', 'date', 'format' => 'yyyy-MM-dd hh:mm:ss'),
            array('token_date, last_login, activation_date, birthdate, metadat', 'safe'),
            //special scenarios
            array('activation_code', 'exist', 'allowEmpty' => false, 'on' => 'activation'),
            array('phone', 'exist', 'allowEmpty' => false, 'criteria' => array('condition' => '`activated` = :activated', 'params' => array(':activated' => 0)), 'on' => 'reactivation'),
            array('email', 'exist', 'allowEmpty' => false, 'criteria' => array('condition' => '`verified` = :verified', 'params' => array(':verified' => 0)), 'on' => 'reverification'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, username, email, type, password, verified, activated, banned, token, token_date, login_token, last_login, first_name, last_name, gender, birthdate, country_phone_code, phone, facebook_identifier, metadata, created, updated, created_by', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'createdBy' => array(self::BELONGS_TO, 'Users', 'created_by'),
            'createdUsers' => array(self::HAS_MANY, 'Users', 'created_by'),
            'media' => array(self::HAS_MANY, 'Media', 'model_id', 'condition' => 'model = "' . __CLASS__ . '"', 'order' => 'position ASC'),
            
            'reviewsFromMe' => array(self::HAS_MANY, 'Reviews', 'from'),
            'reviewsToMe' => array(self::HAS_MANY, 'Reviews', 'to'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'type' => 'Type',
            'password' => 'Password',
            'verified' => 'Verified',
            'activated' => 'Activated',
            'banned' => 'Banned',
            'token' => 'Token',
            'token_date' => 'Token Date',
            'login_token' => 'Login Token',
            'last_login' => 'Last Login',
            'activation_code' => 'Activation Code',
            'activation_date' => 'Activation Date',
            'national_id' => 'National Id',
            'new_email' => 'New Email',
            'new_phone' => 'New Phone',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'gender' => 'Gender',
            'birthdate' => 'Birthdate',
            'country_phone_code' => 'Country Phone Code',
            'phone' => 'Phone',
            'facebook_identifier' => 'Facebook Identifier',
            'metadata' => 'Metadata',
            'created' => 'Created',
            'updated' => 'Updated',
            'created_by' => 'Created By',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('type', $this->type, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('verified', $this->verified);
        $criteria->compare('activated', $this->activated);
        $criteria->compare('banned', $this->banned);
        $criteria->compare('token', $this->token, true);
        $criteria->compare('token_date', $this->token_date, true);
        $criteria->compare('login_token', $this->login_token, true);
        $criteria->compare('last_login', $this->last_login, true);
        $criteria->compare('activation_code', $this->activation_code, true);
        $criteria->compare('activation_date', $this->activation_date, true);
        $criteria->compare('national_id', $this->national_id, true);
        $criteria->compare('new_email', $this->new_email, true);
        $criteria->compare('new_phone', $this->new_phone, true);
        $criteria->compare('first_name', $this->first_name, true);
        $criteria->compare('last_name', $this->last_name, true);
        $criteria->compare('gender', $this->gender, true);
        $criteria->compare('birthdate', $this->birthdate, true);
        $criteria->compare('country_phone_code', $this->country_phone_code);
        $criteria->compare('phone', $this->phone, true);
        $criteria->compare('facebook_identifier', $this->facebook_identifier, true);
        $criteria->compare('metadata', $this->metadata, true);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('updated', $this->updated, true);
        $criteria->compare('created_by', $this->created_by, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            //'sort' => array('defaultOrder' => '`type` DESC, `activated` ASC, `id` DESC'),
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Users the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    
    /**
     * encode metadata attributes to be ready to save
     * @return string
     */
    public function encodeMetadata() {
        $metaArr = array();
        foreach (self::$metadataKeys as $key) {
            if (!empty($this->{$key}))
                $metaArr[$key] = $this->{$key};
        }
        return json_encode($metaArr);
    }

    /**
     * decode metadata attribute to be ready to use
     * @return void 
     */
    public function decodeMetadata() {
        if (!empty($this->metadata)) {
            $metaArr = json_decode($this->metadata);
            foreach ($metaArr as $key => $val) {
                if (in_array($key, self::$metadataKeys))
                    $this->{$key} = $val;
            }
        }
    }
    ///////////// Callbacks Functions /////////////

    protected function beforeSave() {
        if (!parent::beforeSave())
            return false;
        /**
         * actions before saving a new record
         */
        if ($this->isNewRecord) {
            //prevent adding new user with type master 
            if ($this->type === self::TYPE_MASTER)
                return false;
            $this->password = CPasswordHelper::hashPassword($this->password); //hash password
            $this->created_by = Yii::app()->user->id; //set created_by with current user id
            $this->country_phone_code = 2; //set country phone code to egypt
            if ($this->scenario == 'register') {
                $this->verified = $this->activated = $this->banned = 0;
                $this->setTokens();
                $this->setActivations();
            }
        }
        /**
         * actions before saving an existing record
         */ else {
            //only master user can edit his data
            if ($this->type === self::TYPE_MASTER && !Yii::app()->user->isMaster)
                return false;
            //hash password
            $this->password = (!empty($this->password) && $this->password !== $this->oldAttributes['password']) ? CPasswordHelper::hashPassword($this->password) : $this->oldAttributes['password'];
        }
        return true;
    }

    
    protected function afterFind() {
        $this->decodeMetadata();

//        if (Yii::app()->controller->action->id == 'view') {
//
//            $this->created = date("F d, Y", $this->created);
//            $this->modified = date("F d, Y", $this->modified);          
//        } 
        return parent::afterFind();
    }
    
    
    protected function beforeDelete() {
        //prevent delete user with type master
        if (parent::beforeDelete()) {
            if ($this->id == 1 || $this->type == self::TYPE_MASTER)
                return false;
        }
        return true;
    }

    public function scopes() {
        return array(
            'activated' => array(
                'condition' => 'activated=1',
            ),
            'verified' => array(
                'condition' => 'verified=1',
            ),
            'approved' => array(
                'condition' => 'activated=1 AND banned=0',
            ),
        );
    }

    /////////////// Custom Functions /////////////

    /**
     * set tokens attributes
     * @param bool $clear whether to clear token or not
     */
    public function setTokens($clear = false) {
        $this->token_date = date("Y-m-d H:i:s");
        $this->token = $clear ? null : Utilities::hash($this->getTokenKey());
    }

    /**
     * generate unique token key
     * @return string 
     */
    public function getTokenKey() {
        return $this->username . $this->token_date . Yii::app()->params['securitySalt'];
    }

    /**
     * Verifies or reverifies current user based on $target value
     * @param bool $target default true means verify
     * @return boolean
     */
    public function verify($target = true) {
        $this->verified = $target;
        $this->setTokens($target);
        return $this->save(false);
    }

    /**
     * set Activations attributes
     * @param bool $clear whether to clear activation_code or not
     */
    public function setActivations($clear = false) {
        $this->activation_code = $clear ? null : rand(100000, 999999);
        $this->activation_date = date("Y-m-d H:i:s");
    }

    /**
     * Activates or reactivates current user based on $target value
     * @param bool $target default true means activate
     * @return boolean
     */
    public function activate($target = true) {
        $this->activated = $target;
        $this->setActivations($target);
        return $this->save(false);
    }

    /**
     * Returns User model by its email
     * @param string $email 
     * @access public
     * @return User
     */
    public function findByEmail($email) {
        return self::model()->findByAttributes(array('email' => $email));
    }

    /**
     * Type Scope
     * @param int $type
     * @return \Users
     */
    public function scopeType($type) {
        $criteria = new CDbCriteria;
        $this->getDbCriteria()->mergeWith($criteria->compare('type', $type));
        return $this;
    }

    /**
     * Retrieves type list
     * @params bool $master wheather to list master type or not
     * @params string $key
     * @return array|string based on $key value.
     */
    public static function getTypeList($master = false, $key = null) {
        $list = array();
        $master and $list[self::TYPE_MASTER] = Yii::t('default', 'Master');
        
        $list[self::TYPE_ADMIN] = Yii::t('default', 'Admin');
        $list[self::TYPE_MEMBER] = Yii::t('default', 'Member');
        
        return is_null($key) ? $list : $list[$key];
    }

    /**
     * Retrieves gender list
     * @param string $key
     * @return array|string based on $key value.
     */
    public static function getGenderList($key = null) {
        $list = array(
            'Male' => Yii::t('default', 'Male'),
            'Female' => Yii::t('default', 'Female')
        );
        return is_null($key) ? $list : $list[$key];
    }

    /**
     * Retrieves Banned list
     * @param string $key
     * @return array|string based on $key value.
     */
    public static function getBannedList($key = null) {
        $list = array(0 => 'No', 1 => 'Yes');
        return is_null($key) ? $list : $list[$key];
    }

    /**
     * Retrieves Verified list
     * @param string $key
     * @return array|string based on $key value.
     */
    public static function getVerifiedList($key = null) {
        $list = array(0 => 'No', 1 => 'Yes');
        return is_null($key) ? $list : $list[$key];
    }
    
    /**
     * Retrieves Activated list
     * @param string $key
     * @return array|string based on $key value.
     */
    public static function getActivatedList($key = null) {
        $list = array(0 => 'No', 1 => 'Yes');
        return is_null($key) ? $list : $list[$key];
    }

    /**
     * @return string of user name
     */
    public function getName($id = NULL) {
        
        if(!is_null($id)){
            $model = self::model()->findByPk($id);
        }else{
            $model = $this;
        }
        
        if ($model->id == 1)
            return "Superneur";
        else
            return ($model->first_name && $model->last_name) ? $model->first_name . ' ' . $model->last_name : $model->username;
    }
    
    /**
     * Return the count of the users that the user follow.
     * @param type $id
     * @return type
     */
    public function followingsCounter($id){
        return Followers::model()->count('follower_id=' . $id);
    }
    
    /**
     * Return the count of the users that follow the user.
     * @param type $id
     * @return type
     */
    public function followersCounter($id){
        return Followers::model()->count('user_id=' . $id);
    }

    /**
     * @return string of user address
     */
    public function getAddress($id = NULL) {
        if(!is_null($id)){
            $model = self::model()->findByPk($id);
        }else{
            $model = $this;
        }
        
        foreach ($model->addresses as $oAddress) {
            return $oAddress->address1 . ', ' . $oAddress->earth->name . ', ' . $oAddress->earth->parent->name;
        }
        return Yii::t('default', 'Not found');
    }

    /**
     * Gets user avatar
     * @param string $size avatar size, 'home_avatar' or 'profile_avatar'
     * @return string CHtml::image
     */
    public function getCover($size = 'profile_cover', $id = NULL) {
        if(!is_null($id)){
            $model = self::model()->findByPk($id);
        }else{
            $model = $this;
        }
        
        $oMediaFeatured = Media::getFeaturedImage(__CLASS__, $model->id, self::TYPE_COVER);
        return CHtml::image(Utilities::getImgUrl($oMediaFeatured->path, $oMediaFeatured->file_name, $size), $model->getName(), array('class' => ''));
    }
    
    /**
     * Gets user cover
     * @param string $size cover size, 'home_cover' or 'profile_cover'
     * @return string CHtml::image
     */
    public function getAvatar($size = 'micro', $id = NULL) {
        if(!is_null($id)){
            $model = self::model()->findByPk($id);
        }else{
            $model = $this;
        }
        $oMediaFeatured = Media::getFeaturedImage(__CLASS__, $model->id, self::TYPE_AVATAR);
        return CHtml::image(Utilities::getImgUrl($oMediaFeatured->path, $oMediaFeatured->file_name, $size), $model->getName(), array('class' => ''));
    }


    public function getActivateLink($id = NULL) {
        if(!is_null($id)){
            $model = self::model()->findByPk($id);
        }else{
            $model = $this;
        }
        
        if ($model->activated)
            return '<span class="green">' . Yii::t('default', 'Yes') . '</span>';
        return CHtml::link(Yii::t('default', 'No'), Yii::app()->createUrl('admin/users/activate', array('id' => $model->id)), array('class' => 'blue', 'onclick' => 'return window.oMain.ajaxRequestUrl($(this), "$.fn.yiiGridView.update(\'users-grid\')");'));
    }

}
