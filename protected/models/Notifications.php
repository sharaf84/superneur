<?php

/**
 * This is the model class for table "sprnr_notifications".
 *
 * The followings are the available columns in table 'sprnr_notifications':
 * @property string $id
 * @property string $message
 * @property string $created
 * @property string $updated
 * @property integer $status
 * @property string $sender_id
 * @property string $receiver_id
 * @property string $project_id
 * @property string $milestone_id
 *
 * The followings are the available model relations:
 * @property Milestones $milestone
 * @property Projects $project
 * @property Users $receiver
 * @property Users $sender
 */
class Notifications extends Base
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sprnr_notifications';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status', 'numerical', 'integerOnly'=>true),
			array('message', 'length', 'max'=>255),
			array('sender_id, receiver_id, project_id, milestone_id', 'length', 'max'=>10),
			array('created, updated', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, message, created, updated, status, sender_id, receiver_id, project_id, milestone_id', 'safe', 'on'=>'search'),
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
			'milestone' => array(self::BELONGS_TO, 'Milestones', 'milestone_id'),
			'project' => array(self::BELONGS_TO, 'Projects', 'project_id'),
			'receiver' => array(self::BELONGS_TO, 'Users', 'receiver_id'),
			'sender' => array(self::BELONGS_TO, 'Users', 'sender_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'message' => 'Message',
			'created' => 'Created',
			'updated' => 'Updated',
			'status' => 'Status',
			'sender_id' => 'Sender',
			'receiver_id' => 'Receiver',
			'project_id' => 'Project',
			'milestone_id' => 'Milestone',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('sender_id',$this->sender_id,true);
		$criteria->compare('receiver_id',$this->receiver_id,true);
		$criteria->compare('project_id',$this->project_id,true);
		$criteria->compare('milestone_id',$this->milestone_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Notifications the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
