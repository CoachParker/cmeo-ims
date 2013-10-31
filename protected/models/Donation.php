<?php

/**
 * This is the model class for table "donation".
 *
 * The followings are the available columns in table 'donation':
 * @property integer $idDonation
 * @property integer $entityId
 * @property string $donationDate
 * @property string $amount
 * @property integer $donationReasonId
 * @property integer $isThanked
 * @property string $comments
 *
 * The followings are the available model relations:
 * @property Entity $entity
 * @property DonationReason $donationReason
 */
class Donation extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Donation the static model class
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
		return 'donation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('entityId, donationDate, amount, donationReasonId', 'required'),
			array('entityId, donationReasonId, isThanked', 'numerical', 'integerOnly'=>true),
			array('amount', 'length', 'max'=>10),
			array('comments', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idDonation, entityId, donationDate, amount, donationReasonId, isThanked, comments', 'safe', 'on'=>'search'),
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
			'donationReason' => array(self::BELONGS_TO, 'DonationReason', 'donationReasonId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idDonation' => 'Iddonation',
			'entityId' => 'Entity',
			'donationDate' => 'Donation Date',
			'amount' => 'Amount',
			'donationReasonId' => 'Donation Reason',
			'isThanked' => 'Is Thanked',
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

		$criteria->compare('idDonation',$this->idDonation);
		$criteria->compare('entityId',$this->entityId);
		$criteria->compare('donationDate',$this->donationDate,true);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('donationReasonId',$this->donationReasonId);
		$criteria->compare('isThanked',$this->isThanked);
		$criteria->compare('comments',$this->comments,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}