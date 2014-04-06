<?php

/**
 * This is the model class for table "sprnr_complaints".
 *
 * The followings are the available columns in table 'sprnr_complaints':
 * @property string $id
 * @property string $subject
 * @property string $description
 * @property string $from
 * @property string $against
 * @property string $created
 * @property string $updated
 * @property integer $type
 * @property string $project_id
 * @property integer $status
 * @property string $decision
 *
 * The followings are the available model relations:
 * @property Users $against0
 * @property Users $from0
 * @property Projects $project
 */
class Complaints extends Base
{
    const TYPE_FRAUD   = 0;
    const TYPE_DISPUTE = 1;
    const TYPE_COMMENT = 2;
    
    const STATUS_PENDING  = 0;
    const STATUS_RESOLVED = 1;

    /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sprnr_complaints';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type, status', 'numerical', 'integerOnly'=>true),
			array('subject', 'length', 'max'=>255),
			array('description', 'length', 'max'=>4096),
			array('from, against, project_id', 'length', 'max'=>10),
			array('created, updated, decision', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, subject, description, from, against, created, updated, type, project_id, status, decision', 'safe', 'on'=>'search'),
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
			'against0' => array(self::BELONGS_TO, 'Users', 'against'),
			'from0' => array(self::BELONGS_TO, 'Users', 'from'),
			'project' => array(self::BELONGS_TO, 'Projects', 'project_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'subject' => 'Subject',
			'description' => 'Description',
			'from' => 'From',
			'against' => 'Against',
			'created' => 'Created',
			'updated' => 'Updated',
			'type' => 'Type',
			'project_id' => 'Project',
			'status' => 'Status',
			'decision' => 'Decision',
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
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('from',$this->from,true);
		$criteria->compare('against',$this->against,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('project_id',$this->project_id,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('decision',$this->decision,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        /**
        * Retrieves type list
        * @param string $key
        * @return array|string based on $key value.
        */
       public static function getTypeList($key = null) {
           $list = array(
               self::TYPE_FRAUD => Yii::t('default', 'Fraud'),
               self::TYPE_DISPUTE => Yii::t('default', 'Dispute'),
               self::TYPE_COMMENT => Yii::t('default', 'Comment'),
           );
           return is_null($key) ? $list : $list[$key];
       }
        
        /**
        * Retrieves type list
        * @param string $key
        * @return array|string based on $key value.
        */
       public static function getStatusList($key = null) {
           $list = array(
               self::STATUS_PENDING => Yii::t('default', 'Pending'),
               self::STATUS_RESOLVED => Yii::t('default', 'Resolved'),
           );
           return is_null($key) ? $list : $list[$key];
       }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Complaints the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
