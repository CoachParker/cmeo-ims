<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class FamilyController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform no actions
				'actions'=>array(''),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user with role to perform most actions
			      'actions'=>array('index','view','create','update','admin','register','register2'),
				'users'=>array('@'),
				'expression'=>'isset($user->type) && 
				(($user->type==="admin") || 
				($user->type==="coordinator") ||
				($user->type==="reception"))',
			),
			array('allow', // allow admin and coordinator roles to perform 'delete' action
				'actions'=>array('delete'),
				'users'=>array('@'),
				'expression'=>'isset($user->type) && 
				(($user->type==="admin") || 
				($user->type==="coordinator"))',
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
/*	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
*/
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
            var_dump( $_POST ); 
            //Yii::trace('<pre>'.print_r( $_POST,1 ).'</pre>');
            Yii::import('ext.multimodelform.MultiModelForm');
 
		$entity = new Entity;
                $member = new Person;
                $validatedMembers = array();  //ensure an empty array

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Entity']))
		{
			$entity->attributes=$_POST['Entity'];
                        
			if($entity->save())
                        {
                            if(MultiModelForm::validate($member,$validatedMembers))
                            {
                            //the value for the foreign key 'groupid'
                            //Yii::trace('<pre>'.print_r($validatedMembers,1).'</pre>');
                            $masterValues = array ('entities'=>array(0=>$entity->idEntity));
                            //Yii::trace('<pre>'.print_r($masterValues,1).'</pre>');
                            if (MultiModelForm::save($member,$validatedMembers,$deleteMembers,$masterValues))
                            {
                                //$entity->people = $validatedMembers;
                                //$entity->update();
                                //write many-to-many relations, since masterValues isn't working with CAdvancedArBehaviour
                                foreach($validatedMembers as $person ) {
                                    $entityPerson = new EntityPerson;
                                    $entityPerson->personId = $person->idPerson;
                                    $entityPerson->entityId = $entity->idEntity;
                                    if(!$entityPerson->save()) print_r($entityPerson->errors);  
                                }
                                $this->redirect(array('entity/view','id'=>$entity->idEntity));
                            }
                        }	
                        
                            }	
		}

		$this->render('create',array(
			'entity'=>$entity,
                    //submit the member and validatedItems to the widget in the edit form
                    'member' => $member,
                    'validatedMembers' => $validatedMembers,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
            Yii::import('ext.multimodelform.MultiModelForm');
            
		$entity=$this->loadModel($id);
                
                $member = new Person;
                $validatedMembers = array();//ensure an empty array

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Entity']))
		{
			$entity->attributes=$_POST['Entity'];
                        
                        //the value for the foreign key 'entityId'
                        //not sure this will work with this many-to-many relationship
                        $masterValues = array ('entityId'=>$entity->id);
                        
			if(//Save the master model after saving valid members
                            MultiModelForm::save($member,$validatedMembers,$deleteMembers,$masterValues) && 
                                $entity->save()
                           )
				$this->redirect(array('entity/view','id'=>$entity->idEntity));
		}

		$this->render('update',array(
                    'entity'=>$entity,
                    //submit the member and validatedItems to the widget in the edit form
                    'member'=>$member,
                    'validatedMembers' => $validatedMembers,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Entity');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Entity('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Entity']))
			$model->attributes=$_GET['Entity'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Entity the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Entity::model()->with('people')->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Entity $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='entity-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

   /*
    * Attempting a form with multiple models
    * Gary 2014-01-08
    */     
        public function actionRegister()
                {
            $form = new CForm('application.views.entity.registerForm');
            $form['entity']->model = new Entity;
            $form['person']->model = new Person;
            if($form->submitted('register') && $form->validate())
                {
                $entity = $form['entity']->model;
                $person = $form['person']->model;
                if($entity->save(false))
                    {
                    // this lead to error "Indirect modification of overloaded property Person::$entities has no effect"
                    //$person->entities->entityId = $entity->idEntity;
                    // this lead to error "Object of class Entity could not be converted to int"
                    //$person->entities=Entity::model()->findByPk($entity->idEntity);
                    // finally! this works with CAdvandcedArBehavior
                    $person->entities=$entity->idEntity;
                    $person->save(false);
                    $this->redirect(array('view','id'=>$entity->idEntity));
                    }   
                 }
                    $this->render('register', array('form'=>$form));
                    
                 }

   /*
    * Attempting a form with multiple models
    * CActiveForm
    * Gary 2014-01-13
    */     
        public function actionRegister2()
                {
            var_dump( $_POST ); 
            $entityModel = new Entity;
            $personModel = new Person;
            if(isset($_POST['Entity']))
                {
                $entityModel->attributes=$_POST['Entity'];
                /*
                $entity = $entityModel;
                $person = $personModel;
                if($entityModel->save(false))
                    {
                    // finally! this works with CAdvandcedArBehavior
                    //$person->entities=$entity->idEntity;
                    // Need to loop through the extra people from jqrelcopy, but not sure how yet 2014-01-13
                    foreach ($person->id as $personi)
                    {
                        $personi->entities=$entity->idEntity;
                        $personi->save(false);
                    }
                    //$person->save(false);
                    $this->redirect(array('view','id'=>$entity->idEntity));
                    }   */
                 }
	    $this->render('register2', array('entity'=>$entityModel,
					     'person'=>$personModel,));
                    
                 }

      
}

?>
