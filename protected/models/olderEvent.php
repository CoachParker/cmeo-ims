<?php

/**
 * This is the model class for table "event".
 *
 * The followings are the available columns in table 'event':
 * @property integer $idEvent
 * @property string $eventDate
 * @property integer $classLimit
 * @property string $description
 * @property integer $ageGroupId
 * @property integer $eventTypeId
 * @property string $notes
 * @property integer $sponsoringEntityId
 *
 * The followings are the available model relations:
 * @property Entity $sponsoringEntity
 * @property EventType $eventType
 * @property AgeGroup $ageGroup
 * @property Visit[] $visits
 */
class olderEvent extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Event the static model class
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
            //this table no longer exists
		return 'event';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('classLimit, ageGroupId, eventTypeId, sponsoringEntityId', 'numerical', 'integerOnly'=>true),
			array('eventDate, description, notes, eventType', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idEvent, eventDate, classLimit, description, ageGroupId, eventTypeId, notes, sponsoringEntityId', 'safe', 'on'=>'search'),
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
			'sponsoringEntity' => array(self::BELONGS_TO, 'Entity', 'sponsoringEntityId'),
			'eventType' => array(self::BELONGS_TO, 'EventType', 'eventTypeId'),
			'ageGroup' => array(self::BELONGS_TO, 'AgeGroup', 'ageGroupId'),
			'visits' => array(self::HAS_MANY, 'Visit', 'destinationEventId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idEvent' => 'Event Id',
			'eventDate' => 'Event Date',
			'classLimit' => 'Class Limit',
			'description' => 'Description',
			'ageGroupId' => 'Age Group',
			'eventTypeId' => 'Event Type',
			'notes' => 'Notes',
			'sponsoringEntityId' => 'Sponsoring Entity',
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

		$criteria->compare('idEvent',$this->idEvent);
		$criteria->compare('eventDate',$this->eventDate,true);
		$criteria->compare('classLimit',$this->classLimit);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('ageGroupId',$this->ageGroupId);
		$criteria->compare('eventTypeId',$this->eventTypeId);
		$criteria->compare('notes',$this->notes,true);
		$criteria->compare('sponsoringEntityId',$this->sponsoringEntityId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}