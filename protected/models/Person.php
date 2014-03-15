<?php

/**
 * This is the model class for table "person".
 *
 * The followings are the available columns in table 'person':
 * @property integer $idPerson
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
 * @property EntityPerson[] $entities
 * @property PersonType $personType
 * @property Visit[] $visits
 * @property Event[] $events
 * @property Donation $donorContact
 */
class Person extends CActiveRecord
{
    public $personTypeSearch;
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
			array('birthDate, comments, entities, visits', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idPerson, firstName, lastName, birthDate, personTypeId, personType.Name, personTypeSearch, email, phone, comments, doNotContact', 'safe', 'on'=>'search'),
		);
	}

        
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
			'entities' => array(self::MANY_MANY, 'Entity', 'entityPerson(personId, entityId)'),
			//'entityPeople' => array(self::HAS_MANY, 'EntityPerson', 'personId'),  // not sure about this auto generated line 2013-08-05
			'personType' => array(self::BELONGS_TO, 'PersonType', 'personTypeId'),
			'visits' => array(self::MANY_MANY, 'Visit', 'visit_has_person(person_idPerson, visit_idVisit)'),
                    'events' => array(self::HAS_MANY, 'Event','facilitatorPersonId'),
                    'donorContact' => array(self::HAS_MANY, 'Donation', 'contactPerson'),
                    'user' => array(self::HAS_ONE, 'User', 'personId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idPerson' => 'Person Id',
			'firstName' => 'First Name',
			'lastName' => 'Last Name',
			'birthDate' => 'Birth Date',
			'personTypeId' => 'Person Type',
                        'personType.Name' => 'Type',
                        'personTypeSearch' => 'Type',
			'email' => 'Email',
			'phone' => 'Phone',
			'comments' => 'Comments',
                        'entities' => 'Entities',
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
                $criteria->with = array('personType');
                $criteria->together = true;

		$criteria->compare('idPerson',$this->idPerson);
		$criteria->compare('firstName',$this->firstName,true);
		$criteria->compare('lastName',$this->lastName,true);
		$criteria->compare('birthDate',$this->birthDate,true);
		$criteria->compare('personType.Name',$this->personTypeSearch, true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('comments',$this->comments,true);
		$criteria->compare('doNotContact',$this->doNotContact);
		$criteria->compare('entities',$this->entities,true);
                
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'sort'=>array(
                            'attributes'=>array(
                                'personTypeSearch'=>array(
                                    'asc'=>'personType.Name',
                                    'desc'=>'personType.Name DESC'
                                    ),
                                '*',
                                ),
                        ),
		));
	}

/*  Get entities related to person 
 * 
 */
        public function getEntityList()
        {
            $result=array();
            If ($this->entities){
                foreach ($this->entities as $entity){
                    $result[] = CHtml::link(CHtml::encode($entity->name),
                            array('entity/view','id'=>$entity->idEntity));
                }
            }
            else{
                $result[] = "What?! NO ENTITIES!  Fix This!";
            }
        return implode(", ",$result);
        }
        
}