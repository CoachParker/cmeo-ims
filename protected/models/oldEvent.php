<?php

/**
 * This is the model class for table "event".
 *
 * The followings are the available columns in table 'event':
 * @property integer $idEvent
 * @property string $start
 * @property string $end
 * @property string $eventTypeId
 * @property string $recurrence
 * @property string $name
 * @property string $description
 * @property integer $sponsorEntityId
 * @property integer $facilitatorPersonId
 * @property integer $classLimit
 * @property integer $ageGroupId
 *
 * The followings are the available model relations:
 * @property EventType $eventType
 * @property Entity $sponsorEntity
 * @property AgeGroup $ageGroup
 * @property EventAttribute[] $eventAttributes
 * @property Visit[] $visits
 * @property Person $facilitator
 */
class oldEvent extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
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
			//array('idEvent', 'required'),
			array('sponsorEntityId, facilitatorPersonId, classLimit, ageGroupId', 'numerical', 'integerOnly'=>true),
			array('eventTypeId, recurrence, name', 'length', 'max'=>45),
			array('start, end, description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idEvent, start, end, eventTypeId, recurrence, name, description, sponsorEntityId, facilitatorPersonId, classLimit, ageGroupId', 'safe', 'on'=>'search'),
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
			'eventType' => array(self::BELONGS_TO, 'EventType', 'eventTypeId'),
			'sponsorEntity' => array(self::BELONGS_TO, 'Entity', 'sponsorEntityId'),
                    'facilitator' => array(self::BELONGS_TO, 'Person', 'facilitatorPersonId'),
			'ageGroup' => array(self::BELONGS_TO, 'AgeGroup', 'ageGroupId'),
                    	//'eventAttributes' => array(self::MANY_MANY, 'EventAttribute', 'event_attribute_value(idEvent, attribute)'),
			'eventAttributes' => array(self::HAS_MANY, 'EventAttribute', 'event_attribute_value(idEvent, attribute)'),
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
			'start' => 'Start',
			'end' => 'End',
			'eventTypeId' => 'Event Type',
			'recurrence' => 'Recurrence',
			'name' => 'Name',
			'description' => 'Description',
			'sponsorEntityId' => 'Sponsor Entity',
			'facilitatorPersonId' => 'Facilitator',
			'classLimit' => 'Class Limit',
			'ageGroupId' => 'Age Group',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idEvent',$this->idEvent);
		$criteria->compare('start',$this->start,true);
		$criteria->compare('end',$this->end,true);
		$criteria->compare('eventTypeId',$this->eventTypeId,true);
		$criteria->compare('recurrence',$this->recurrence,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('sponsorEntityId',$this->sponsorEntityId);
		$criteria->compare('facilitatorPersonId',$this->facilitatorPersonId);
		$criteria->compare('classLimit',$this->classLimit);
		$criteria->compare('ageGroupId',$this->ageGroupId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Event the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
