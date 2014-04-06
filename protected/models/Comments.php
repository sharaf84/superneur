<?php

/**
 * This is the model class for table "sprnr_comments".
 *
 * The followings are the available columns in table 'sprnr_comments':
 * @property string $id
 * @property string $comment
 * @property string $parent_id
 * @property string $model
 * @property string $model_id
 * @property string $user_id
 * @property string $created
 * @property string $updated
 *
 * The followings are the available model relations:
 * @property Reviews $model0
 * @property Comments $parent
 * @property Comments[] $comments
 * @property Users $user
 */
class Comments extends Base
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sprnr_comments';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('comment', 'length', 'max'=>4096),
			array('parent_id, model_id, user_id', 'length', 'max'=>10),
			array('model', 'length', 'max'=>45),
			array('created, updated', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, comment, parent_id, model, model_id, user_id, created, updated', 'safe', 'on'=>'search'),
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
			'model0' => array(self::BELONGS_TO, 'Reviews', 'model_id'),
			'parent' => array(self::BELONGS_TO, 'Comments', 'parent_id'),
			'comments' => array(self::HAS_MANY, 'Comments', 'parent_id'),
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
			'comment' => 'Comment',
			'parent_id' => 'Parent',
			'model' => 'Model',
			'model_id' => 'Model',
			'user_id' => 'User',
			'created' => 'Created',
			'updated' => 'Updated',
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
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('parent_id',$this->parent_id,true);
		$criteria->compare('model',$this->model,true);
		$criteria->compare('model_id',$this->model_id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Comments the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
