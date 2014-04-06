<?php

/**
 * This is the model class for table "sprnr_posts".
 *
 * The followings are the available columns in table 'sprnr_posts':
 * @property string $id
 * @property string $type
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property string $body
 * @property string $image
 * @property string $date
 * @property string $end_date
 * @property integer $position
 * @property integer $status
 * @property string $created
 * @property string $updated
 */
class Posts extends Base {
    /**
     * const of users types
     */

    const TYPE_PAGE = 1;
    const TYPE_ARTICLE = 2;
    const TYPE_EVENT = 3;
//    const TYPE_VIDEO = 4;
//    const TYPE_AUDIO = 5;
    const TYPE_HOME_SLIDER = 6;
    const TYPE_FAQ = 7;

    /**
     * const of order status
     */
    const STATUS_DRAFT = 0;
    const STATUS_PUBLISHED = 1;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'sprnr_posts';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('type, title', 'required'),
            array('type', 'in', 'range' => array_keys(self::getTypeList())),
            array('title, slug, image', 'length', 'max' => 255),
            array('description', 'length', 'max' => 1000),
            array('position', 'length', 'max' => 10),
            array('status', 'numerical', 'integerOnly' => true),
            //array('date, end_date', 'date', 'format' => 'yyyy-MM-dd'),
            array('date, end_date, body', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, type, title, slug, description, body, image, date, position, created, updated, status', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'media' => array(self::HAS_MANY, 'Media', 'model_id', 'condition' => 'model = "' . __CLASS__ . '"', 'order' => 'position ASC'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'type' => 'Type',
            'title' => isset(Yii::app()->session['postType']) && Yii::app()->session['postType'] == Posts::TYPE_FAQ ? 'Question' : 'Title',
            'slug' => 'Slug',
            'description' => isset(Yii::app()->session['postType']) && Yii::app()->session['postType'] == Posts::TYPE_FAQ ? 'Answer' : 'Description',
            'body' => 'Body',
            'image' => 'Image',
            'date' => 'Date',
            'end_date' => 'End Date',
            'position' => 'Position',
            'status' => 'Status',
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
    public function search($param = array()) {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria($param);

        $criteria->compare('id', $this->id, true);
        $criteria->compare('type', $this->type, true);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('slug', $this->slug, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('body', $this->body, true);
        $criteria->compare('image', $this->image, true);
        $criteria->compare('date', $this->date, true);
        $criteria->compare('end_date', $this->end_date, true);
        $criteria->compare('position', $this->position, true);
        $criteria->compare('status', $this->status, true);
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
     * @return Posts the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /////////////// Custom Functions /////////////

    /**
     * Retrieves type list
     * @param string $key
     * @return array|string based on $key value.
     */
    public static function getTypeList($key = null) {
        $list = array(
            self::TYPE_PAGE => Yii::t('default', 'Page'),
            self::TYPE_ARTICLE => Yii::t('default', 'Article'),
            self::TYPE_EVENT => Yii::t('default', 'Event'),
//            self::TYPE_VIDEO => Yii::t('default', 'Video'),
//            self::TYPE_AUDIO => Yii::t('default', 'Audio'),
            self::TYPE_HOME_SLIDER => Yii::t('default', 'Home Slider'),
            self::TYPE_FAQ => Yii::t('default', 'FAQs'),
        );
        return is_null($key) ? $list : $list[$key];
    }

    public static function getFrontActions() {
        return array(
            'list' => array(
                self::TYPE_ARTICLE => 'articles',
                self::TYPE_EVENT => 'events'
            ),
            'view' => array(
                self::TYPE_PAGE => 'page',
                self::TYPE_ARTICLE => 'article',
                self::TYPE_EVENT => 'event')
        );
    }

    public function getFrontUrl($action) {
        $actions = self::getFrontActions();

        if (empty($actions[$action][$this->type]))
            return Yii::t('default', 'Not available');

        switch ($action) {
            case 'list':
                return Yii::app()->createUrl('posts/' . $actions[$action][$this->type]);
                break;

            case 'view':
                return Yii::app()->createUrl('posts/' . $actions[$action][$this->type] . '/', array('slug' => $this->slug));
                break;

            default:
                return Yii::t('default', 'Wrong Action');
                break;
        }
    }

    /**
     * Type Scope
     * @param int $type
     * @return \Posts
     */
    public function scopeType($type) {
        $criteria = new CDbCriteria;
        $this->getDbCriteria()->mergeWith($criteria->compare('type', $type));
        return $this;
    }

    /**
     * Scope used to find & generate slug using SluggableBehavior. 
     * @return \Posts
     */
    public function scopeSlug() {
        $criteria = new CDbCriteria;
        $criteria->compare('id !', $this->id);
        $criteria->compare('type', $this->type);
        $this->getDbCriteria()->mergeWith($criteria);
        return $this;
    }

    /**
     * @return array of columns required to generate slug using SluggableBehavior.
     */
    protected function slugColumns() {
        return array('title');
    }

    /**
     * Status Scope
     * @param string $status
     * @return \Posts
     */
    public function scopeStatus($status) {
        $criteria = new CDbCriteria;
        $this->getDbCriteria()->mergeWith($criteria->compare('status', $status));
        return $this;
    }

}
