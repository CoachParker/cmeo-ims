<?php

/**
 * This is the model class for table "ageGroup".
 *
 * The followings are the available columns in table 'ageGroup':
 * @property integer $idAgeGroup
 * @property string $name
 * @property integer $fromAge
 * @property integer $toAge
 *
 * The followings are the available model relations:
 * @property Event[] $events
 */
class AgeGroup extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AgeGroup the static model class
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
		return 'ageGroup';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, fromAge, toAge', 'required'),
			array('fromAge, toAge', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idAgeGroup, name, fromAge, toAge', 'safe', 'on'=>'search'),
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
			'events' => array(self::HAS_MANY, 'Event', 'ageGroupId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idAgeGroup' => 'Idage Group',
			'name' => 'Name',
			'fromAge' => 'From Age',
			'toAge' => 'To Age',
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

		$criteria->compare('idAgeGroup',$this->idAgeGroup);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('fromAge',$this->fromAge);
		$criteria->compare('toAge',$this->toAge);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}