<?php

/**
 * This is the model base class for the table "person".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Person".
 *
 * Columns in table "person" available as properties of the model,
 * followed by relations of table "person" available as properties of the model.
 *
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
 * @property EntityPerson[] $entityPeople
 * @property PersonType $personType
 */
abstract class BasePerson extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'person';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Person|People', $n);
	}

	public static function representingColumn() {
		return 'firstName';
	}

	public function rules() {
		return array(
			array('firstName, lastName, personTypeId', 'required'),
			array('personTypeId, doNotContact', 'numerical', 'integerOnly'=>true),
			array('firstName, lastName, email', 'length', 'max'=>45),
			array('phone', 'length', 'max'=>17),
			array('birthDate, comments', 'safe'),
			array('birthDate, email, phone, comments, doNotContact', 'default', 'setOnEmpty' => true, 'value' => null),
			array('idperson, firstName, lastName, birthDate, personTypeId, email, phone, comments, doNotContact', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'entityPeople' => array(self::HAS_MANY, 'EntityPerson', 'personId'),
			'personType' => array(self::BELONGS_TO, 'PersonType', 'personTypeId'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'idperson' => Yii::t('app', 'Idperson'),
			'firstName' => Yii::t('app', 'First Name'),
			'lastName' => Yii::t('app', 'Last Name'),
			'birthDate' => Yii::t('app', 'Birth Date'),
			'personTypeId' => null,
			'email' => Yii::t('app', 'Email'),
			'phone' => Yii::t('app', 'Phone'),
			'comments' => Yii::t('app', 'Comments'),
			'doNotContact' => Yii::t('app', 'Do Not Contact'),
			'entityPeople' => null,
			'personType' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('idperson', $this->idperson);
		$criteria->compare('firstName', $this->firstName, true);
		$criteria->compare('lastName', $this->lastName, true);
		$criteria->compare('birthDate', $this->birthDate, true);
		$criteria->compare('personTypeId', $this->personTypeId);
		$criteria->compare('email', $this->email, true);
		$criteria->compare('phone', $this->phone, true);
		$criteria->compare('comments', $this->comments, true);
		$criteria->compare('doNotContact', $this->doNotContact);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}