<?php

/**
 * This is the model class for table "visit".
 *
 * The followings are the available columns in table 'visit':
 * @property integer $idVisit
 * @property string $visitDateTime
 * @property integer $entityId
 * @property integer $personId
 * @property integer $numberOfMembers
 * @property integer $numberOfGuests
 * @property string $amountPaid
 * @property integer $destinationEventId
 *
 * The followings are the available model relations:
 * @property Entity $entity
 * @property Event $destinationEvent
 */
class oldVisit extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Visit the static model class
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
			array('destinationEvent', 'required'),
			array('entityId, personId, numberOfMembers, numberOfGuests, destinationEventId', 'numerical', 'integerOnly'=>true),
			array('amountPaid', 'length', 'max'=>10),
                    array('entity, person, destinationEvent','safe'),
			array('visitDateTime', 'default',
			      'value'=>new CDbExpression('NOW()'),
			      'setOnEmpty'=>false,'on'=>'insert'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idVisit, visitDateTime, entityId, numberOfMembers, numberOfGuests, amountPaid, destinationEventId', 'safe', 'on'=>'search'),
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
			'person' => array(self::BELONGS_TO, 'Person', 'personId'),
			'destinationEvent' => array(self::BELONGS_TO, 'Event', 'destinationEventId'),
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
			'numberOfMembers' => 'Number Of Members',
			'numberOfGuests' => 'Number Of Guests',
			'amountPaid' => 'Amount Paid',
			'destinationEventId' => 'Destination Event',
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

		$criteria->compare('idVisit',$this->idVisit);
		$criteria->compare('visitDateTime',$this->visitDateTime,true);
		$criteria->compare('entityId',$this->entityId);
		$criteria->compare('numberOfMembers',$this->numberOfMembers);
		$criteria->compare('numberOfGuests',$this->numberOfGuests);
		$criteria->compare('amountPaid',$this->amountPaid,true);
		$criteria->compare('destinationEventId',$this->destinationEventId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

/*  Get entities related to person 
 * 
 */
        public function getEntityList()
        {
            $result=array();
            If ($this->entity){
                foreach ($this->entity as $entity){
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