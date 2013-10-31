<?php

/**
 * This is the model class for table "membership".
 *
 * The followings are the available columns in table 'membership':
 * @property integer $idMembership
 * @property integer $entityId
 * @property string $startDate
 * @property string $endDate
 * @property integer $typeId
 * @property string $amountPaid
 * @property string $enteredBy
 * @property string $createDate
 * @property string $comments
 *
 * The followings are the available model relations:
 * @property Entity $entity
 * @property MembershipType $type
 */
class Membership extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Membership the static model class
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
		return 'membership';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('entityId, typeId', 'numerical', 'integerOnly'=>true),
			array('amountPaid', 'length', 'max'=>10),
			array('enteredBy', 'length', 'max'=>45),
			array('startDate, endDate, createDate, comments', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idMembership, entityId, startDate, endDate, typeId, amountPaid, enteredBy, createDate, comments', 'safe', 'on'=>'search'),
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
			'entity' => array(self::BELONGS_TO, 'Entity', 'entityId'),
			'type' => array(self::BELONGS_TO, 'MembershipType', 'typeId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idMembership' => 'Idmembership',
			'entityId' => 'Entity',
			'startDate' => 'Start Date',
			'endDate' => 'End Date',
			'typeId' => 'Type',
			'amountPaid' => 'Amount Paid',
			'enteredBy' => 'Entered By',
			'createDate' => 'Create Date',
			'comments' => 'Comments',
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

		$criteria->compare('idMembership',$this->idMembership);
		$criteria->compare('entityId',$this->entityId);
		$criteria->compare('startDate',$this->startDate,true);
		$criteria->compare('endDate',$this->endDate,true);
		$criteria->compare('typeId',$this->typeId);
		$criteria->compare('amountPaid',$this->amountPaid,true);
		$criteria->compare('enteredBy',$this->enteredBy,true);
		$criteria->compare('createDate',$this->createDate,true);
		$criteria->compare('comments',$this->comments,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}