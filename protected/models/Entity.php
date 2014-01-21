<?php

/**
 * This is the model class for table "entity".
 *
 * The followings are the available columns in table 'entity':
 * @property integer $idEntity
 * @property string $name
 * @property integer $entityTypeId
 * @property string $address1
 * @property string $address2
 * @property string $city
 * @property string $state
 * @property string $zip
 * @property string $phone
 * @property string $comments
 *
 * The followings are the available model relations:
 * @property Donation[] $donations
 * @property EntityType $entityType
 * @property EntityPerson[] $entityPeople
 * @property Event[] $events
 * @property Membership[] $memberships
 * @property Visit[] $visits
 */
class Entity extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Entity the static model class
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
		return 'entity';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, entityTypeId', 'required'),
                    array('name', 'unique'),
			array('entityTypeId', 'numerical', 'integerOnly'=>true),
			array('name, city', 'length', 'max'=>45),
			array('address1, address2', 'length', 'max'=>80),
			array('state', 'length', 'max'=>2),
			array('zip', 'length', 'max'=>10),
			array('phone', 'length', 'max'=>17),
			array('comments, people', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idEntity, name, entityTypeId, address1, address2, city, state, zip, phone, comments', 'safe', 'on'=>'search'),
		);
	}

        /*
         * May be nessecary for many-to-many save
         */
        public function behaviors() {
            return array( 'CAdvancedArBehavior' => array(
            'class' => 'application.extensions.CAdvancedArBehavior'));
        }
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'donations' => array(self::HAS_MANY, 'Donation', 'entityId'),
			'entityType' => array(self::BELONGS_TO, 'EntityType', 'entityTypeId'),
			'people' => array(self::MANY_MANY, 'Person', 'entityPerson(entityId, personId)'), // added 2013-08-05
			//'entityPeople' => array(self::HAS_MANY, 'EntityPerson', 'entityId'),  // not sure about this auto generated line 2013-08-05
			'events' => array(self::HAS_MANY, 'Event', 'sponsoringEntityId'),
			'memberships' => array(self::HAS_MANY, 'Membership', 'entityId'),
			'visits' => array(self::HAS_MANY, 'Visit', 'entityId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idEntity' => 'Id Entity',
			'name' => 'Name',
			'entityTypeId' => 'Entity Type',
			'address1' => 'Address1',
			'address2' => 'Address2',
			'city' => 'City',
			'state' => 'State',
			'zip' => 'Zip',
			'phone' => 'Phone',
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

		$criteria->compare('idEntity',$this->idEntity);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('entityTypeId',$this->entityTypeId);
		$criteria->compare('address1',$this->address1,true);
		$criteria->compare('address2',$this->address2,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('state',$this->state,true);
		$criteria->compare('zip',$this->zip,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('comments',$this->comments,true);
                $criteria->compare('people',$this->people,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        
                
        /**
         * 
         * @return string people
         */
        public function getPersonList()
        {
            $result=array();
            If ($this->people){
                foreach ($this->people as $person){
                    $result[] = CHtml::link(CHtml::encode($person->firstName . " " . $person->lastName),
                            array('person/view','id'=>$person->idPerson));
                }
            }
            else{
                $result[] = "What?! NO People! Fix This!";
            }
        return implode(", ",$result);
        }
}