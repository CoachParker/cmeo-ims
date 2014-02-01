<?php

class EventTypeController extends Controller
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
				'actions'=>array('index','view','create','createA','update','admin'),
				'users'=>array('@'),
				'expression'=>'isset($user->type) && 
				(($user->type==="admin") || 
				($user->type==="coordinator") ||
				($user->type==="reception"))',
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
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
		$model=new EventType;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['EventType']))
		{
			$model->attributes=$_POST['EventType'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idEventType));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreateA()
	{
            //var_dump( $_POST ); 
            //Yii::trace('<pre>'.print_r( $_POST,1 ).'</pre>');
            Yii::import('ext.multimodelform.MultiModelForm');
 
		$eventType = new EventType;
                $member = new EventAttribute;
                $validatedMembers = array();  //ensure an empty array

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['EventType']))
		{
			$eventType->attributes=$_POST['EventType'];
                        
			if($eventType->save())
                        {
                            if(MultiModelForm::validate($member,$validatedMembers))
                            {
                            //the value for the foreign key 'groupid'
                            //Yii::trace('<pre>'.print_r($validatedMembers,1).'</pre>');
                            $masterValues = array ('eventTypes'=>array(0=>$eventType->idEventType));
                            //Yii::trace('<pre>'.print_r($masterValues,1).'</pre>');
                            if (MultiModelForm::save($member,$validatedMembers,$deleteMembers,$masterValues))
                            {
                                //$entity->people = $validatedMembers;
                                //$entity->update();
                                //write many-to-many relations, since masterValues isn't working with CAdvancedArBehaviour
                                foreach($validatedMembers as $attribute ) {
                                    $eventTypeAttribute = new EventTypeAttribute;
                                    $eventTypeAttribute->eventAttributeId = $attribute->idEventAttribute;
                                    $eventTypeAttribute->eventTypeId = $eventType->idEventType;
                                    if(!$eventTypeAttribute->save()) print_r($eventTypeAttribute->errors);  
                                }
                                $this->redirect(array('eventType/view','id'=>$eventType->idEventType));
                            }
                        }	
                        
                            }	
		}

		$this->render('createA',array(
			'eventType'=>$eventType,
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
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['EventType']))
		{
			$model->attributes=$_POST['EventType'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idEventType));
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
		$dataProvider=new CActiveDataProvider('EventType');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new EventType('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['EventType']))
			$model->attributes=$_GET['EventType'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return EventType the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=EventType::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param EventType $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='event-type-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
