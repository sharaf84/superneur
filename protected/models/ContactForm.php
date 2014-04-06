<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class ContactForm extends CFormModel
{
	public $name;
	public $email;
        public $country_code;
        public $phone;
	public $subject;
	public $topic;
	public $body;
	public $verifyCode;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('name, email, subject, body', 'required'),
			array('topic', 'required', 'message'=>'Please select a {attribute}.'),
			// email has to be a valid email address
			array('email', 'email'),
                        
                        //Phone 
                        array('country_code', 'in', 'range' => array_keys(Helpers::$countryPhoneCodes)),
                        array('topic', 'in', 'range' => array_keys(array('Affiliates' => 'Affiliates', 'Feedback' => 'Feedback', 'Technical support' => 'Technical support'))),
                        array('phone', 'numerical', 'integerOnly' => true),
                        array('phone', 'length', 'min' => 7, 'max' => 14),
                    
			// verifyCode needs to be entered correctly
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
                        'country_code' => 'Country Code',
                        'phone'        => 'Phone',
			'verifyCode'=>'Verification Code',
			'topic'=>'Topic',
		);
	}
}