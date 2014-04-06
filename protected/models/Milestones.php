<?php

/**
 * This is the model class for table "sprnr_milestones".
 *
 * The followings are the available columns in table 'sprnr_milestones':
 * @property string $id
 * @property string $title
 * @property string $deliverables
 * @property string $cost
 * @property string $created
 * @property string $updated
 * @property integer $status
 * @property integer $payment_status
 * @property integer $progress
 * @property string $start_date
 * @property string $delivery_date
 * @property string $proposal_id
 *
 * The followings are the available model relations:
 * @property BalanceHistory[] $balanceHistories
 * @property Proposals $proposal
 * @property Notifications[] $notifications
 * @property Payments[] $payments
 */
class Milestones extends Base
{
    
        const STATUS_PENDING   = 0;
        const STATUS_ACTIVE    = 1;
        const STATUS_REJECTED  = 2;
        const STATUS_COMPLETED = 3;
        
        const PAYMENT_STATUS_PENDING   = 0;
        const PAYMENT_STATUS_FUNDED    = 1;
        const PAYMENT_STATUS_RELEASED  = 2;
        
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sprnr_milestones';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status, payment_status, progress', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>45),
			array('deliverables', 'length', 'max'=>500),
			array('cost, proposal_id', 'length', 'max'=>10),
			array('created, updated, start_date, delivery_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, deliverables, cost, created, updated, status, payment_status, progress, start_date, delivery_date, proposal_id', 'safe', 'on'=>'search'),
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
			'balanceHistories' => array(self::HAS_MANY, 'BalanceHistory', 'milestone_id'),
			'proposal' => array(self::BELONGS_TO, 'Proposals', 'proposal_id'),
			'notifications' => array(self::HAS_MANY, 'Notifications', 'milestone_id'),
			'payments' => array(self::HAS_MANY, 'Payments', 'milestone_id'),
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
			'deliverables' => 'Deliverables',
			'cost' => 'Cost',
			'created' => 'Created',
			'updated' => 'Updated',
			'status' => 'Status',
			'payment_status' => 'Payment Status',
			'progress' => 'Progress',
			'start_date' => 'Start Date',
			'delivery_date' => 'Delivery Date',
			'proposal_id' => 'Proposal',
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
		$criteria->compare('deliverables',$this->deliverables,true);
		$criteria->compare('cost',$this->cost,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('payment_status',$this->payment_status);
		$criteria->compare('progress',$this->progress);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('delivery_date',$this->delivery_date,true);
		$criteria->compare('proposal_id',$this->proposal_id,true);

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
            );
            return is_null($key) ? $list : $list[$key];
        }
        
        /**
         * Retrieves type list
         * @param string $key
         * @return array|string based on $key value.
         */
        public static function getPaymentStatusList($key = null) {
            $list = array(
                self::PAYMENT_STATUS_PENDING   => Yii::t('default', 'Pending'),
                self::PAYMENT_STATUS_FUNDED    => Yii::t('default', 'Funded'),
                self::PAYMENT_STATUS_RELEASED  => Yii::t('default', 'Released'),
            );
            return is_null($key) ? $list : $list[$key];
        }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Milestones the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
