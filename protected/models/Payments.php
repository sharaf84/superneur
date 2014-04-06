<?php

/**
 * This is the model class for table "sprnr_payments".
 *
 * The followings are the available columns in table 'sprnr_payments':
 * @property string $id
 * @property integer $operation
 * @property string $amount
 * @property string $profit_percentage
 * @property string $profit
 * @property string $sender_id
 * @property string $receiver_id
 * @property string $project_id
 * @property string $milestone_id
 * @property string $created
 * @property string $updated
 * @property string $token
 * @property string $token_date
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Milestones $milestone
 * @property Projects $project
 * @property Users $receiver
 * @property Users $sender
 */
class Payments extends Base
{
        const OPERATION_DEPOSIT    = '1';
        const OPERATION_FUND       = '2';
        const OPERATION_WITHDRAWAL = '3';
        const OPERATION_REFUND     = '4';
        
        const STATUS_PENDING       = '0';
        const STATUS_SUCCEEDED     = '1';
        const STATUS_FAILED        = '2';
        const STATUS_CANCELED      = '3';
        
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sprnr_payments';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('operation, status', 'numerical', 'integerOnly'=>true),
			array('amount, profit, sender_id, receiver_id, project_id, milestone_id', 'length', 'max'=>10),
			array('profit_percentage', 'length', 'max'=>5),
			array('token', 'length', 'max'=>81),
			array('created, updated, token_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, operation, amount, profit_percentage, profit, sender_id, receiver_id, project_id, milestone_id, created, updated, token, token_date, status', 'safe', 'on'=>'search'),
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
			'operation' => 'Operation',
			'amount' => 'Amount',
			'profit_percentage' => 'Profit Percentage',
			'profit' => 'Profit',
			'sender_id' => 'Sender',
			'receiver_id' => 'Receiver',
			'project_id' => 'Project',
			'milestone_id' => 'Milestone',
			'created' => 'Created',
			'updated' => 'Updated',
			'token' => 'Token',
			'token_date' => 'Token Date',
			'status' => 'Status',
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
		$criteria->compare('operation',$this->operation);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('profit_percentage',$this->profit_percentage,true);
		$criteria->compare('profit',$this->profit,true);
		$criteria->compare('sender_id',$this->sender_id,true);
		$criteria->compare('receiver_id',$this->receiver_id,true);
		$criteria->compare('project_id',$this->project_id,true);
		$criteria->compare('milestone_id',$this->milestone_id,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);
		$criteria->compare('token',$this->token,true);
		$criteria->compare('token_date',$this->token_date,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Payments the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
