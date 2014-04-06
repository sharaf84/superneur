<?php

/**
 * This is the model class for table "shft_settings".
 *
 * The followings are the available columns in table 'shft_settings':
 * @property string $id
 * @property string $key
 * @property string $value
 * @property string $description
 * @property string $created
 * @property string $updated
 */
class Settings extends Base {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'sprnr_settings';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('key, value', 'required'),
            array('key', 'length', 'max' => 45),
            array('value, description', 'length', 'max' => 500),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, key, value, description, created, updated', 'safe', 'on' => 'search'),
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
            'key' => 'Key',
            'value' => 'Value',
            'description' => 'Description',
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
        $criteria->compare('key', $this->key, true);
        $criteria->compare('value', $this->value, true);
        $criteria->compare('description', $this->description, true);
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
     * @return Settings the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    //////////// Custom functions /////////

    /**
     * Retrieves settings records as an array of key & value
     * @param string $key
     * @return array|string based on $key value.
     */
    public static function getKeyslist($key = null) {
        $list = array();
        $settings = self::model()->findAll();
        foreach ($settings as $setting)
            $list[$setting->key] = $setting->value;
        return is_null($key) ? $list : $list[$key];
    }

}
