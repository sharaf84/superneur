<?php

/**
 * This is the model class for table "sprnr_media".
 *
 * The followings are the available columns in table 'shft_media':
 * @property string $id
 * @property string $path
 * @property string $file_name
 * @property string $mime
 * @property string $size
 * @property string $title
 * @property string $description
 * @property string $link
 * @property string $embed
 * @property string $featured
 * @property string $type
 * @property string $position
 * @property string $model
 * @property string $model_id
 * @property string $created
 * @property string $updated
 */
class Media extends Base {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'sprnr_media';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('path, file_name, mime, size, title', 'required'),
            array('path, file_name, mime, title', 'length', 'max' => 255),
            array('description, embed', 'length', 'max' => 1000),
            array('model', 'length', 'max' => 45),
            array('size, type, position, model_id', 'numerical', 'integerOnly' => true),
            array('featured', 'boolean'),
            array('link', 'url'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, path, file_name, mime, size, title, description, model, model_id, created, updated', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'path' => 'Path',
            'file_name' => 'File Name',
            'mime' => 'Mime',
            'size' => 'Size',
            'title' => 'Title',
            'description' => 'Description',
            'link' => 'Link',
            'embed' => 'Embed',
            'featured' => 'Featured',
            'type' => 'Type',
            'position' => 'Position',
            'model' => 'Model',
            'model_id' => 'Model Id',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('path', $this->path, true);
        $criteria->compare('file_name', $this->file_name, true);
        $criteria->compare('mime', $this->mime, true);
        $criteria->compare('size', $this->size, true);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('link', $this->link, true);
        $criteria->compare('embed', $this->embed, true);
        $criteria->compare('featured', $this->featured, true);
        $criteria->compare('type', $this->type, true);
        $criteria->compare('position', $this->position, true);
        $criteria->compare('model', $this->model, true);
        $criteria->compare('model_id', $this->model_id, true);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('updated', $this->updated, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Media the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /////////////// Callbacks functions ////////////

    protected function afterDelete() {
        Utilities::deleteFiles($this->oldAttributes['path'], $this->oldAttributes['file_name'], true);
        return parent::afterDelete();
    }

    /////////////// Custom functions ////////////

    /**
     * Retrieves mime list
     * @param string $key
     * @return array|string based on $key value.
     */
    public static function getMimeList($key = null) {
        $list = array(
            'image' => Yii::t('default', 'Image'),
            'video' => Yii::t('default', 'Video'),
            'audio' => Yii::t('default', 'Audio'),
            'application' => Yii::t('default', 'File')
        );
        return is_null($key) ? $list : $list[$key];
    }

    /**
     * Retrieves featured list
     * @param string $key
     * @return array|string based on $key value.
     */
    public static function getFeaturedList($key = null) {
        $list = array(
            0 => Yii::t('default', 'No'),
            1 => Yii::t('default', 'Yes'),
        );
        return is_null($key) ? $list : $list[$key];
    }

    /**
     * Get media relted to model and model_id
     * @param string $model model name
     * @param int $model_id model id
     * @return \Media
     */
    public function relatedTo($model = null, $model_id = null) {
        $criteria = new CDbCriteria;
        is_null($model) or $criteria->compare('model', $model);
        is_null($model_id) or $criteria->compare('model_id', $model_id);
        $this->getDbCriteria()->mergeWith($criteria);
        return $this;
    }
    
    /**
     * Get media relted to model and model_id
     * @param string $model model name
     * @param int $model_id model id
     * @return \Media
     */
    public static function getFeaturedImage($model = null, $model_id = null,  $type = 0) {
        $criteria = new CDbCriteria;
        $criteria->condition = ($type) ? 'type=' . $type : '1' ;
        $criteria->order = '`featured` DESC, `position` ASC';
        $oMedia = self::model()->relatedTo($model, $model_id)->find($criteria);
        return $oMedia ? $oMedia : self::model();
    }

}
