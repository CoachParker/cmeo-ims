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
 * @property integer $contactPerson
 * @property integer $isThanked
 * @property string $comments
 * 
 * @property string $entitySearch
 * @property string $reasonSearch
 *
 * The followings are the available model relations:
 * @property Entity $entity
 * @property DonationReason $donationReason
 * @property Person $personContact
 */
class Donation extends CActiveRecord
{
	public $entitySearch;
	public $reasonSearch;
	public $contactSearch;
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
			array('entityId, donationReasonId, contactPerson, isThanked', 'numerical', 'integerOnly'=>true),
			array('amount', 'length', 'max'=>10),
			array('comments, entity', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idDonation, entityId, entitySearch, donationDate, amount, donationReasonId, reasonSearch, contactSearch, isThanked, comments', 'safe', 'on'=>'search'),
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
         'personContact' => array(self::BELONGS_TO, 'Person', 'contactPerson'),
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
			'entitySearch' => 'Entity',
			'donationDate' => 'Donation Date',
			'amount' => 'Amount',
			'donationReasonId' => 'Donation Reason',
			'reasonSearch' => 'Donation Reason',
         'contactPerson' => 'Appeal Person',
         'contactSearch' => 'Appeal Person',
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
		$criteria->with=array('entity','donationReason');

		$criteria->compare('idDonation',$this->idDonation);
//$criteria->compare('entityId',$this->entityId);
		$criteria->compare('entity.name',$this->entitySearch,true);
//		$criteria->compare('contactPerson',$this->contactPerson);
		$criteria->compare('donationDate',$this->donationDate,true);
		$criteria->compare('amount',$this->amount,true);
//		$criteria->compare('donationReasonId',$this->donationReasonId);
		$criteria->compare('donationReason.name',$this->reasonSearch,true);
		$criteria->compare('isThanked',$this->isThanked);
//		$criteria->compare('personContact.firstName',$this->contactSearch,true);
		$criteria->compare('comments',$this->comments,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			 'sort'=>array(
                        'attributes'=>array(
                            'entitySearch'=>array(
                                'asc'=>'entity.name',
                                'desc'=>'entity.name DESC',
                                ),
                             'reasonSearch'=>array(
                             		'asc'=>'donationReason.name',
                             		'desc'=>'donationReason.name DESC',
                             		),
//                             'contactSearch'=>array(
//                             		'asc'=>'personContact.firstName',
//                             		'desc'=>'personContact.firstName DESC',
//                             		),
                            '*',
                            ),
                        ),
		));
	}
}