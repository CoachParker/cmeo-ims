<?php

/*
 * This is the model class for the table "loginForm"
 * and open the template in the editor.
 */

/**
 * Description of loginForm2
 *
 * @author gary
 */
class loginForm2 extends CFormModel{
    public $username;
    public $password;
    public $rememberMe=false;

    private $_identity;
    
    public function rules(){
        return array(
            array('username, password', 'required'),
            array('rememberMe', 'boolean'),
            array('password', 'authenticate'),
        );
    } 

/**
 * @param string $attribute the name of the attribute to be validated
 * @param array $params options specified in the validation rule
 */
    public function authenticate($attribute,$params){
        $this->_identity=new UserIdentity($this->username,$this->password);
        if(!$this->_identity->authenticate())
            $this->addError('password','Incorrect username or password.');
    }
        
        
 }

?>
