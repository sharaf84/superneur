<?php

/**
 * This is the model class for table "sprnr_proposals".
 *
 * The followings are the available columns in table 'sprnr_proposals':
 * @property string $id
 * @property string $description
 * @property integer $status
 * @property integer $activity
 * @property string $start_date
 * @property integer $started
 * @property string $duration
 * @property string $created
 * @property string $updated
 * @property string $project_id
 * @property string $user_id
 *
 * The followings are the available model relations:
 * @property Milestones[] $milestones
 * @property Projects $project
 * @property Users $user
 */
class Proposals extends Base
{
    const STATUS_PENDING   = 0;
    const STATUS_ACTIVE    = 1;
    const STATUS_REJECTED  = 2;
    const STATUS_COMPLETED = 3;
    const STATUS_CANCELED  = 4;
    
    const ACTIVITY_BIDDER  = 0;
    const ACTIVITY_WORKER  = 1;
    
    const STARTED      = 0;
    const NOT_STARTED  = 1;
    
    
    

    /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sprnr_proposals';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status, activity, started', 'numerical', 'integerOnly'=>true),
			array('description', 'length', 'max'=>500),
			array('duration, project_id, user_id', 'length', 'max'=>10),
			array('start_date, created, updated', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, description, status, activity, start_date, started, duration, created, updated, project_id, user_id', 'safe', 'on'=>'search'),
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
			'milestones' => array(self::HAS_MANY, 'Milestones', 'proposal_id'),
			'project' => array(self::BELONGS_TO, 'Projects', 'project_id'),
			'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'description' => 'Description',
			'status' => 'Status',
			'activity' => 'Activity',
			'start_date' => 'Start Date',
			'started' => 'Started',
			'duration' => 'Duration',
			'created' => 'Created',
			'updated' => 'Updated',
			'project_id' => 'Project',
			'user_id' => 'User',
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
		$criteria->compare('description',$this->description,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('activity',$this->activity);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('started',$this->started);
		$criteria->compare('duration',$this->duration,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);
		$criteria->compare('project_id',$this->project_id,true);
		$criteria->compare('user_id',$this->user_id,true);

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
                self::STATUS_ACTIVE    => Yii::t('default', 'Active'),
                self::STATUS_REJECTED  => Yii::t('default', 'Rejected'),
                self::STATUS_COMPLETED => Yii::t('default', 'Completed'),
                self::STATUS_CANCELED  => Yii::t('default', 'Canceled'),
            );
            return is_null($key) ? $list : $list[$key];
        }
        
        /**
         * Retrieves type list
         * @param string $key
         * @return array|string based on $key value.
         */
        public static function getStartList($key = null) {
            $list = array(
                self::STARTED   => Yii::t('default', 'Started'),
                self::NOT_STARTED    => Yii::t('default', 'Not Started'),
            );
            return is_null($key) ? $list : $list[$key];
        }
        
        /**
         * Retrieves type list
         * @param string $key
         * @return array|string based on $key value.
         */
        public static function getActivityList($key = null) {
            $list = array(
                self::ACTIVITY_BIDDER   => Yii::t('default', 'Bidder'),
                self::ACTIVITY_WORKER    => Yii::t('default', 'Worker'),
            );
            return is_null($key) ? $list : $list[$key];
        }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Proposals the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
