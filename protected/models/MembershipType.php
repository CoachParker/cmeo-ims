<?php

/**
 * This is the model class for table "membershipType".
 *
 * The followings are the available columns in table 'membershipType':
 * @property integer $idMembershipType
 * @property string $name
 * @property integer $cost
 * @property string $description
 * @property string $benefits
 *
 * The followings are the available model relations:
 * @property Membership[] $memberships
 */
class MembershipType extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MembershipType the static model class
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
		return 'membershipType';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, cost, description, benefits', 'required'),
			array('cost', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idMembershipType, name, cost, description, benefits', 'safe', 'on'=>'search'),
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
			'memberships' => array(self::HAS_MANY, 'Membership', 'typeId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idMembershipType' => 'Idmembership Type',
			'name' => 'Name',
			'cost' => 'Cost',
			'description' => 'Description',
			'benefits' => 'Benefits',
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

		$criteria->compare('idMembershipType',$this->idMembershipType);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('cost',$this->cost);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('benefits',$this->benefits,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}