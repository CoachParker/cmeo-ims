<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $idUser
 * @property string $username
 * @property string $password
 * @property integer $personId
 * @property integer $roleId
 *
 * The followings are the available model relations:
 * @property Person $person
 * @property Role $role
 */
class User extends CActiveRecord
{
  // search variables for CGridView
  public $personSearch;
  public $roleSearch;
	// Needed for user registration
	public $passwordCompare;	
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, personId, roleId', 'required'),
			array('passwordCompare','required','on'=>'insert'),
			array('personId, roleId', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>45),
			array('password', 'length', 'max'=>128),
			array('person,role,passwordCompare','safe'),
			array('passwordCompare', 'compare','compareAttribute'=>'password','message'=>"Passwords don't match."),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idUser, username, password, personId, personSearch, roleId, roleSearch', 'safe', 'on'=>'search'),
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
			'person' => array(self::BELONGS_TO, 'Person', 'personId'),
			'role' => array(self::BELONGS_TO, 'Role', 'roleId'),
                        'member' => array(self::HAS_MANY, 'Membership','enteredBy'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idUser' => 'User Id',
			'username' => 'Username',
			'password' => 'Password',
			'personId' => 'Person',
			'roleId' => 'Role',
			'personSearch' => 'Person',
			'roleSearch' => 'Role',
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
		$criteria->with = array('person','role');

		$criteria->compare('idUser',$this->idUser);
		$criteria->compare('username',$this->username,true);
		//		$criteria->compare('password',$this->password,true);
		$criteria->compare('person.firstName',$this->personSearch,true);
		//		$criteria->compare('personId',$this->personId);
		$criteria->compare('role.name',$this->roleSearch,true);
		//		$criteria->compare('roleId',$this->roleId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'sort'=>array(
                            'attributes'=>array(
                                'personSearch'=>array(
                                    'asc'=>'person.firstName',
                                    'desc'=>'person.firstName DESC'
                                    ),
                                'roleSearch'=>array(
                                    'asc'=>'role.name',
                                    'desc'=>'role.name DESC'
                                    ),
                                '*',
                                ),
                        ),
		));
	}

	/*
	* For use in components/UserIdentity.php	
	*/
    public function validatePassword($password)
    {
    	// WHY DOESN'T THIS WORK???!!!
    	//$password = $this->hashPassword($password);
        return CPasswordHelper::verifyPassword($password,$this->password);
        //return $this->password == crypt($password,$this->password);
    }
 
 	/*
 	* For use in saving and comparison
 	*/
    public function hashPassword($password)
    {
        return CPasswordHelper::hashPassword($password);
    }

	/*
	* Encrypt new users password for db storage
	*/
	public function beforeSave()
	{
		//if($this->isNewRecord){
			$this->password = $this->hashPassword($this->password);
			//}
		return parent::beforeSave();
	}
}
