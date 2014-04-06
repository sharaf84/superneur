<?php

/**
 * This is the model class for table "sprnr_reviews".
 *
 * The followings are the available columns in table 'sprnr_reviews':
 * @property string $id
 * @property string $subject
 * @property string $review
 * @property string $from
 * @property string $to
 * @property string $commitment_rate
 * @property string $quality_rate
 * @property string $cost_rate
 * @property string $availability_rate
 * @property string $created
 * @property string $updated
 * @property string $project_id
 *
 * The followings are the available model relations:
 * @property Comments[] $comments
 * @property Users $from0
 * @property Projects $project
 * @property Users $to0
 */
class Reviews extends Base
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sprnr_reviews';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('subject', 'length', 'max'=>255),
			array('review', 'length', 'max'=>4096),
			array('from, to, project_id', 'length', 'max'=>10),
			array('commitment_rate, quality_rate, cost_rate, availability_rate', 'length', 'max'=>2),
			array('created, updated', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, subject, review, from, to, commitment_rate, quality_rate, cost_rate, availability_rate, created, updated, project_id', 'safe', 'on'=>'search'),
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
			'comments' => array(self::HAS_MANY, 'Comments', 'model_id'),
			'reviewFrom' => array(self::BELONGS_TO, 'Users', 'from'),
			'project' => array(self::BELONGS_TO, 'Projects', 'project_id'),
			'reviewTo' => array(self::BELONGS_TO, 'Users', 'to'),
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
			'review' => 'Review',
			'from' => 'From',
			'to' => 'To',
			'commitment_rate' => 'Commitment Rate',
			'quality_rate' => 'Quality Rate',
			'cost_rate' => 'Cost Rate',
			'availability_rate' => 'Availability Rate',
			'created' => 'Created',
			'updated' => 'Updated',
			'project_id' => 'Project',
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
		$criteria->compare('review',$this->review,true);
		$criteria->compare('from',$this->from,true);
		$criteria->compare('to',$this->to,true);
		$criteria->compare('commitment_rate',$this->commitment_rate,true);
		$criteria->compare('quality_rate',$this->quality_rate,true);
		$criteria->compare('cost_rate',$this->cost_rate,true);
		$criteria->compare('availability_rate',$this->availability_rate,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);
		$criteria->compare('project_id',$this->project_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Reviews the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
