<?php

/**
 * This is the model class for table "visit".
 *
 * The followings are the available columns in table 'visit':
 * @property integer $idVisit
 * @property string $visitDateTime
 * @property integer $entityId
 * @property integer $numberOfGuests
 * @property string $amountPaid
 * @property integer $destinationEventId
 *
 * @property string $entitySearch
 * @property string $destinationSearch
 * 
 * The followings are the available model relations:
 * @property Entity $entity
 * @property Event $destinationEvent
 * @property Person[] $people
 */
class Visit extends CActiveRecord
{
        public $entitySearch;
        public $destinationSearch;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'visit';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('destinationEventId', 'required'),
			array('entityId, numberOfGuests, destinationEventId', 'numerical', 'integerOnly'=>true),
			array('amountPaid', 'length', 'max'=>10),
			array('numberOfGuests, destinationEventId, destinationEvent, entity, people', 'safe'),
                        array('visitDateTime', 'default',
			      'value'=>new CDbExpression('NOW()'),
			      'setOnEmpty'=>false,'on'=>'insert'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idVisit, visitDateTime, entityId, entitySearch, destinationSearch, numberOfGuests, amountPaid, destinationEventId, entity, destinationEvent, people', 'safe', 'on'=>'search'),
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
			'entity' => array(self::BELONGS_TO, 'Entity', 'entityId'),
			'destinationEvent' => array(self::BELONGS_TO, 'Event', 'destinationEventId'),
			'people' => array(self::MANY_MANY, 'Person', 'visit_has_person(visit_idVisit, person_idPerson)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idVisit' => 'Id Visit',
			'visitDateTime' => 'Visit Date Time',
			'entityId' => 'Entity',
                    'entitySearch' => 'Entity',
                    'destinationSearch' => 'Destination',
			'numberOfGuests' => 'Number Of Guests',
			'amountPaid' => 'Amount Paid',
			'destinationEventId' => 'Destination Event',
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
                $criteria->with = array('entity', 'destinationEvent');

		$criteria->compare('idVisit',$this->idVisit);
		$criteria->compare('visitDateTime',$this->visitDateTime,true);
		$criteria->compare('entity.name',$this->entitySearch,true);
		$criteria->compare('numberOfGuests',$this->numberOfGuests);
		$criteria->compare('amountPaid',$this->amountPaid,true);
		$criteria->compare('destinationEvent.name',$this->destinationSearch,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'sort'=>array(
                            'attributes'=>array(
                                'entitySearch'=>array(
                                    'asc'=>'entity.name',
                                    'desc'=>'entity.name DESC'
                                    ),
                                'destinationSearch'=>array(
                                    'asc'=>'destinationEvent.name',
                                    'desc'=>'destinationEvent.name DESC'
                                    ),
                                '*',
                                ),
                        ),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Visit the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
                
        /**
         * 
         * @return string people
         * 2014-01-25 copied from Entity Model, may need adjusting
         */
        public function getPersonList()
        {
            $result=array();
            if ($this->people){
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

	/*
	* @return string membership end date
	*/

	public function getMemberDates()
	{
	  $result=array();
	  if (count($this->entity->memberships) > 0){
	    foreach ($this->entity->memberships as $membership){
	      $result[] = CHtml::link(CHtml::encode($membership->endDate),
                            array('membership/view','id'=>$membership->idMembership));
	    }
	  }
	  else{
	    $result[] = "No memberships on file";
	  }
	  return implode(", ",$result);

	}
        
 }
