<?php

/**
 * This is the model class for table "sprnr_projects".
 *
 * The followings are the available columns in table 'sprnr_projects':
 * @property string $id
 * @property string $title
 * @property string $description
 * @property string $slug
 * @property integer $type
 * @property string $created
 * @property string $updated
 * @property integer $enabled
 * @property integer $status
 * @property integer $progress
 * @property integer $budget_type
 * @property string $min_budget
 * @property string $max_budget
 * @property integer $interval
 * @property string $hours_per_interval
 * @property string $start_date
 * @property string $publish_date
 * @property string $expiration_date
 * @property string $completion_date
 * @property string $min_score
 * @property integer $privacy
 * @property integer $seo_indexing
 * @property string $owner_id
 *
 * The followings are the available model relations:
 * @property BalanceHistory[] $balanceHistories
 * @property Bookmarks[] $bookmarks
 * @property Complaints[] $complaints
 * @property Messages[] $messages
 * @property Notifications[] $notifications
 * @property Payments[] $payments
 * @property Users $owner
 * @property Proposals[] $proposals
 * @property Reviews[] $reviews
 */
class Projects extends Base
{
    
    const STATUS_PENDING   = 0;
    const STATUS_APPROVED  = 1;
    const STATUS_ACTIVE    = 2;
    const STATUS_COMPLETED = 3;
    const STATUS_CANCELED  = 4;
    
    const TYPE_NORMAL      = 0;
    const TYPE_FEATURED    = 1;
    
    const BUDGET_FIXED     = 0;
    const BUDGET_HOURLY    = 1;
    
    const INTERVAL_WEEK    = 0;
    const INTERVAL_MONTH   = 1;
    
    const PRIVACY_PUBLIC   = 0;
    const PRIVACY_PRIVATE  = 1;
    
    const SEO_INDEXING_NO  = 0;
    const SEO_INDEXING_YES = 1;
    
    const ENABLED_NO  = 0;
    const ENABLED_YES = 1;

    /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sprnr_projects';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type, enabled, status, progress, budget_type, interval, privacy, seo_indexing', 'numerical', 'integerOnly'=>true),
			array('title, slug', 'length', 'max'=>255),
			array('description', 'length', 'max'=>2500),
			array('min_budget, max_budget, hours_per_interval, min_score, owner_id', 'length', 'max'=>10),
			array('created, updated, start_date, publish_date, expiration_date, completion_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, description, slug, type, created, updated, enabled, status, progress, budget_type, min_budget, max_budget, interval, hours_per_interval, start_date, publish_date, expiration_date, completion_date, min_score, privacy, seo_indexing, owner_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'balanceHistories' => array(self::HAS_MANY, 'BalanceHistory', 'project_id'),
			'bookmarks' => array(self::HAS_MANY, 'Bookmarks', 'project_id'),
			'complaints' => array(self::HAS_MANY, 'Complaints', 'project_id'),
			'messages' => array(self::HAS_MANY, 'Messages', 'project_id'),
			'notifications' => array(self::HAS_MANY, 'Notifications', 'project_id'),
			'payments' => array(self::HAS_MANY, 'Payments', 'project_id'),
			'owner' => array(self::BELONGS_TO, 'Users', 'owner_id'),
			'proposals' => array(self::HAS_MANY, 'Proposals', 'project_id'),
			'reviews' => array(self::HAS_MANY, 'Reviews', 'project_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'description' => 'Description',
			'slug' => 'Slug',
			'type' => 'Type',
			'created' => 'Created',
			'updated' => 'Updated',
			'enabled' => 'Enabled',
			'status' => 'Status',
			'progress' => 'Progress',
			'budget_type' => 'Budget Type',
			'min_budget' => 'Min Budget',
			'max_budget' => 'Max Budget',
			'interval' => 'Interval',
			'hours_per_interval' => 'Hours Per Interval',
			'start_date' => 'Start Date',
			'publish_date' => 'Publish Date',
			'expiration_date' => 'Expiration Date',
			'completion_date' => 'Completion Date',
			'min_score' => 'Min Score',
			'privacy' => 'Privacy',
			'seo_indexing' => 'Seo Indexing',
			'owner_id' => 'Owner',
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
	public function search($param = array())
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria($param);

		$criteria->compare('id',$this->id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);
		$criteria->compare('enabled',$this->enabled);
		$criteria->compare('status',$this->status);
		$criteria->compare('progress',$this->progress);
		$criteria->compare('budget_type',$this->budget_type);
		$criteria->compare('min_budget',$this->min_budget,true);
		$criteria->compare('max_budget',$this->max_budget,true);
		$criteria->compare('interval',$this->interval);
		$criteria->compare('hours_per_interval',$this->hours_per_interval,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('publish_date',$this->publish_date,true);
		$criteria->compare('expiration_date',$this->expiration_date,true);
		$criteria->compare('completion_date',$this->completion_date,true);
		$criteria->compare('min_score',$this->min_score,true);
		$criteria->compare('privacy',$this->privacy);
		$criteria->compare('seo_indexing',$this->seo_indexing);
		$criteria->compare('owner_id',$this->owner_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        /**
         * Retrieves type list
         * @param string $key
         * @return array|string based on $key value.
         */
        public static function getStatusList($key = null) {
            $list = array(
                self::STATUS_PENDING   => Yii::t('default', 'Pending'),
                self::STATUS_APPROVED   => Yii::t('default', 'Approved'),
                self::STATUS_ACTIVE   => Yii::t('default', 'Active'),
                self::STATUS_COMPLETED   => Yii::t('default', 'Completed'),
                self::STATUS_CANCELED   => Yii::t('default', 'Canceled'),
            );
            return is_null($key) ? $list : $list[$key];
        }
        
        /**
         * Retrieves type list
         * @param string $key
         * @return array|string based on $key value.
         */
        public static function getTypeList($key = null) {
            $list = array(
                self::TYPE_NORMAL     => Yii::t('default', 'Normal'),
                self::TYPE_FEATURED   => Yii::t('default', 'Featured'),
            );
            return is_null($key) ? $list : $list[$key];
        }
        
        /**
         * Retrieves type list
         * @param string $key
         * @return array|string based on $key value.
         */
        public static function getBudgetList($key = null) {
            $list = array(
                self::BUDGET_FIXED     => Yii::t('default', 'Fixed'),
                self::BUDGET_HOURLY   => Yii::t('default', 'Hourly'),
            );
            return is_null($key) ? $list : $list[$key];
        }
        
        /**
         * Retrieves type list
         * @param string $key
         * @return array|string based on $key value.
         */
        public static function getIntervalList($key = null) {
            $list = array(
                self::INTERVAL_WEEK     => Yii::t('default', 'Week'),
                self::INTERVAL_MONTH   => Yii::t('default', 'Month'),
            );
            return is_null($key) ? $list : $list[$key];
        }
        
        /**
         * Retrieves type list
         * @param string $key
         * @return array|string based on $key value.
         */
        public static function getPrivacyList($key = null) {
            $list = array(
                self::PRIVACY_PUBLIC     => Yii::t('default', 'Public'),
                self::PRIVACY_PRIVATE   => Yii::t('default', 'Private'),
            );
            return is_null($key) ? $list : $list[$key];
        }
        
        /**
         * Retrieves type list
         * @param string $key
         * @return array|string based on $key value.
         */
        public static function getSeoList($key = null) {
            $list = array(
                self::SEO_INDEXING_NO     => Yii::t('default', 'No'),
                self::SEO_INDEXING_YES    => Yii::t('default', 'Yes'),
            );
            return is_null($key) ? $list : $list[$key];
        }
        
        /**
         * Retrieves type list
         * @param string $key
         * @return array|string based on $key value.
         */
        public static function getEnabledList($key = null) {
            $list = array(
                self::ENABLED_NO     => Yii::t('default', 'No'),
                self::ENABLED_YES    => Yii::t('default', 'Yes'),
            );
            return is_null($key) ? $list : $list[$key];
        }
        
        /**
     * Scope used to find & generate slug using SluggableBehavior. 
     * @return \Posts
     */
    public function scopeSlug() {
        $criteria = new CDbCriteria;
        $criteria->compare('id !', $this->id);
        $criteria->compare('type', $this->type);
        $this->getDbCriteria()->mergeWith($criteria);
        return $this;
    }

    /**
     * @return array of columns required to generate slug using SluggableBehavior.
     */
    protected function slugColumns() {
        return array('title');
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Projects the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
