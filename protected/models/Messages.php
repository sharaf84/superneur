<?php

/**
 * This is the model class for table "sprnr_messages".
 *
 * The followings are the available columns in table 'sprnr_messages':
 * @property string $id
 * @property string $message
 * @property string $created
 * @property string $updated
 * @property string $parent_id
 * @property string $sender_id
 * @property string $receiver_id
 * @property string $project_id
 *
 * The followings are the available model relations:
 * @property Media[] $medias
 * @property Messages $parent
 * @property Messages[] $messages
 * @property Projects $project
 * @property Users $receiver
 * @property Users $sender
 */
class Messages extends Base
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sprnr_messages';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('message', 'length', 'max'=>4096),
			array('parent_id, sender_id, receiver_id, project_id', 'length', 'max'=>10),
			array('created, updated', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, message, created, updated, parent_id, sender_id, receiver_id, project_id', 'safe', 'on'=>'search'),
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
			'medias' => array(self::HAS_MANY, 'Media', 'model_id'),
			'parent' => array(self::BELONGS_TO, 'Messages', 'parent_id'),
			'messages' => array(self::HAS_MANY, 'Messages', 'parent_id'),
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
			'parent_id' => 'Parent',
			'sender_id' => 'Sender',
			'receiver_id' => 'Receiver',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);
		$criteria->compare('parent_id',$this->parent_id,true);
		$criteria->compare('sender_id',$this->sender_id,true);
		$criteria->compare('receiver_id',$this->receiver_id,true);
		$criteria->compare('project_id',$this->project_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Messages the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        /**
        * Used to get all conversations for a user.
        * 
        * @param int $userId
        * @param int $projectId
        * 
        * @return array of conversations
        */
       public function getUserConversations($userId, $projectId = NULL) {

           if (empty($userId)) {

               return FALSE;
           }

           return self::model()
                           ->findAll('(
                                       receiver_id = :receiver_id
                                        OR  sender_id = :sender_id 
                                   )    
                                   ' . (!is_null($projectId)? ' AND project_id = :project_id' : '') . '

                                   ORDER BY id', array(
                               ':receiver_id' => $userId,
                               ':sender_id' => $userId,
                                   ) + (!is_null($projectId)? array(':project_id' => $projectId) : array())
           );
       }
}
