<?php

class VisitController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
				'actions'=>array('index','view','create','update','admin','dynamicpeoplecheck'),
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
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Visit;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Visit']))
		{
			$model->attributes=$_POST['Visit'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idVisit));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Visit']))
		{
			$model->attributes=$_POST['Visit'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idVisit));
		}

		$this->render('update',array(
			'model'=>$model,
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
		$dataProvider=new CActiveDataProvider('Visit');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Visit('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Visit']))
			$model->attributes=$_GET['Visit'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Visit the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Visit::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Visit $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='visit-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
/*
 * Generate checkbox list input options for people dependent on entity
 */        

       public function actionDynamicPeopleCheck($id = null)
       {
          try{
            if(is_null($id))
                $id = $_POST['Visit']['entityId'];
            
            $entity = Entity::model()->findByPk($id);
            
            if(is_null($entity) )
                echo 'There are no people setup for that Family.';

            $entitypeople = $entity->people;
            if($entitypeople) {
               //why doesn't this work
               //echo CHtml::listData($entitypeople, 'idPerson', 'firstName');
                
                foreach($entitypeople as $person)
                    {
                    echo CHtml::tag('input',
                            array('type'=>'checkbox','checked'=>'checked','value'=>$person->idPerson, 'id'=>$person->idPerson, 'name'=>'Visit[people][]'),
                            '<span class="custom checkbox"></span>' . CHtml::encode($person->firstName),
                            true);
                    }
             }
          }catch(Exception $e){
                 echo $e->getMessage();
             }
       }
       
       public function actionDynamicPeople($id = null)
       {
          try{
            if(is_null($id))
                $id = $_POST['Visit']['entityId'];
            
            $entity = Entity::model()->findByPk($id);
            
            if(is_null($entity) )
                echo 'There are no people setup for that Family.';

            $entitypeople = $entity->people;
            if($entitypeople) {
               //why doesn't this work
               //echo CHtml::listData($entitypeople, 'idPerson', 'firstName');
                
                foreach($entitypeople as $person)
                    {
                    echo CHtml::tag('option',
                            array('value'=>$person->idPerson),CHtml::encode($person->firstName),true);
                    }
             }
          }catch(Exception $e){
                 echo $e->getMessage();
             }
       }
/*
 * Playing with dependent drop down lists
 * The following is from the yii forum
 * I was planning to use it in the related view, dep_drop_ex
 */
 
public function actionSelectcounty(){ 
    echo $_POST['RamCity']['con_id'];
    $listdata = RamCountry::model()->findAll('con_id=:contryid',
        array(':contryid'=>(int)$_POST['RamCity']['con_id'])); 
    
    $listdata = CHtml::listData($listdata,'c_id','description');
    
    echo CHtml::tag('option',array('value'=>''),'select Country',true);
    
    foreach($listdata as $value => $description){
        echo CHtml::tag('option',
                array('value'=>$value),CHtml::encode($description),true);
        }
}

public function actionSelectState(){
    $listdata = RamState::model()->findAll('c_id=:contryid',array(':contryid'=>(int)$_POST['RamCity']['c_id']));
    
    $listdata = CHtml::listData($listdata,'s_id','description');
    
    echo CHtml::tag('option',array('value'=>''),'select State',true);
    
    foreach($listdata as $value => $description){
        echo CHtml::tag('option',
                array('value'=>$value),CHtml::encode($description),true);
        }
}
                
public function actionSelectCity(){
    $listdata = RamCity::model()->findAll('s_id=:contryid',array(':contryid'=>(int)$_POST['RamCity']['s_id']));
    
    $listdata = CHtml::listData($listdata,'ct_id','description');
    
    echo CHtml::tag('option',array('value'=>''),'select City',true);
    
    foreach($listdata as $value => $description){
        echo CHtml::tag('option',
                array('value'=>$value),CHtml::encode($description),true);
        }
}
       
       
}
