<?php

/**
 * This is the model class for table "person".
 *
 * The followings are the available columns in table 'person':
 * @property integer $idperson
 * @property string $firstName
 * @property string $lastName
 * @property string $birthDate
 * @property integer $personTypeId
 * @property string $email
 * @property string $phone
 * @property string $comments
 * @property integer $doNotContact
 *
 * The followings are the available model relations:
 * @property EntityPerson[] $entityPeople
 * @property PersonType $personType
 */
class oldPerson extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Person the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'person';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('firstName, lastName, personTypeId', 'required'),
			array('personTypeId, doNotContact', 'numerical', 'integerOnly'=>true),
			array('firstName, lastName, email', 'length', 'max'=>45),
			array('phone', 'length', 'max'=>17),
			array('birthDate, comments', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idperson, firstName, lastName, birthDate, personTypeId, email, phone, comments, doNotContact', 'safe', 'on'=>'search'),
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
			'entityPeople' => array(self::HAS_MANY, 'EntityPerson', 'personId'),
			'personType' => array(self::BELONGS_TO, 'PersonType', 'personTypeId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idperson' => 'Idperson',
			'firstName' => 'First Name',
			'lastName' => 'Last Name',
			'birthDate' => 'Birth Date',
			'personTypeId' => 'Person Type',
			'email' => 'Email',
			'phone' => 'Phone',
			'comments' => 'Comments',
			'doNotContact' => 'Do Not Contact',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idperson',$this->idperson);
		$criteria->compare('firstName',$this->firstName,true);
		$criteria->compare('lastName',$this->lastName,true);
		$criteria->compare('birthDate',$this->birthDate,true);
		$criteria->compare('personTypeId',$this->personTypeId);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('comments',$this->comments,true);
		$criteria->compare('doNotContact',$this->doNotContact);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

        
}