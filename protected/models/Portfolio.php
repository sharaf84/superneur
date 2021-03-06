<?php

/**
 * This is the model class for table "sprnr_portfolio".
 *
 * The followings are the available columns in table 'sprnr_portfolio':
 * @property string $id
 * @property string $title
 * @property string $description
 * @property string $text
 * @property string $category_id
 * @property integer $display
 * @property string $created
 * @property string $updated
 * @property string $user_id
 *
 * The followings are the available model relations:
 * @property Tree $category
 * @property Users $user
 */
class Portfolio extends Base
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sprnr_portfolio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('display', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>45),
			array('description', 'length', 'max'=>255),
			array('text', 'length', 'max'=>4096),
			array('category_id, user_id', 'length', 'max'=>10),
			array('created, updated', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, description, text, category_id, display, created, updated, user_id', 'safe', 'on'=>'search'),
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
			'category' => array(self::BELONGS_TO, 'Tree', 'category_id'),
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
			'title' => 'Title',
			'description' => 'Description',
			'text' => 'Text',
			'category_id' => 'Category',
			'display' => 'Display',
			'created' => 'Created',
			'updated' => 'Updated',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('category_id',$this->category_id,true);
		$criteria->compare('display',$this->display);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);
		$criteria->compare('user_id',$this->user_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Portfolio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
