<?php

/**
 * This is the model class for table "eventType".
 *
 * The followings are the available columns in table 'eventType':
 * @property string $eventType
 * @property string $displayName
 * @property string $description
 *
 * The followings are the available model relations:
 * @property Event[] $events
 * @property EventAttribute[] $eventAttributes
 */
class oldEventType extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'eventType';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('eventType', 'required'),
			array('eventType, displayName, description', 'length', 'max'=>45),
                    array('eventAttributes', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('eventType, displayName, description', 'safe', 'on'=>'search'),
		);
	}

        
        public function behaviors() {
            return array( 'CAdvancedArBehavior' => array(
            'class' => 'CAdvancedArBehavior'));
        }
        
        
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'events' => array(self::HAS_MANY, 'Event', 'eventTypeId'),
			'eventAttributes' => array(self::MANY_MANY, 'EventAttribute', 'eventType_attributes(eventType, attribute)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'eventType' => 'Event Type',
			'displayName' => 'Display Name',
			'description' => 'Description',
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

		$criteria->compare('eventType',$this->eventType,true);
		$criteria->compare('displayName',$this->displayName,true);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EventType the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
