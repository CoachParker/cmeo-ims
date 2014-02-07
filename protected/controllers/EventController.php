<?php

class EventController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * This will allow binding action parameters from either GET or POST data
	 * !!! ToDo - evaluate security risk
	 */
	public function getActionParams() { return array_merge($_GET, $_POST); }
	
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user with role to perform all actions
				'actions'=>array('index','view','create','createA','update','admin','delete','attributetextboxes','ajaxGetTypes'),
				'users'=>array('@'),
				'expression'=>'isset($user->type) && 
				(($user->type==="admin") || 
				($user->type==="coordinator") ||
				($user->type==="reception"))',
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
		$model = $this->loadModel($id);
		//$model->attributeValues;
		$this->render('view',array(
			'model'=>$model,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * Just added attributes for EventType and EventAttributes, but have not written create/save for them yet, 2014-01-30
	 *
	 */
	public function actionCreate()
	{
		Yii::import('ext.multimodelform.MultiModelForm');

		$model=new Event;
		$eventType=new EventType;
		$member=new EventAttribute;
		$validatedMembers = array(); // ensure an empty array

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Event']))
		{
			$attr = $_POST['Event']['attributes'];
			$model->attributes=$_POST['Event'];
			if($model->save()) {
				$this->addAttributes($attr, $model);
				$this->redirect(array('view','id'=>$model->idEvent));
			}
		} else {
			$this->render('create',array(
				'model'=>$model,
				'eventType'=>$eventType,
				'member'=>$member,
				'validatedMembers'=>$validatedMembers,
			));
		}
	}

	/**
	 * Creates a new EventType with Attributes.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreateA()
	{
            //var_dump( $_POST ); 
            //Yii::trace('<pre>'.print_r( $_POST,1 ).'</pre>');
            Yii::import('ext.multimodelform.MultiModelForm');
 		$model=new Event;
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
                                $this->refresh();
                                //$this->redirect(array('eventType/view','id'=>$eventType->idEventType));
                            }
                        }	
                        
                            }	
		}

		$this->render('create',array(
			'model'=>$model,
				'eventType'=>$eventType,
                    //submit the member and validatedItems to the widget in the edit form
                    'member' => $member,
                    'validatedMembers' => $validatedMembers,
		));
	}
        
        
        /*
         * reload eventTypes for new event form
         */
        
        public function actionAjaxGetTypes(){
            
            //echo "<option value='1'>test1</option> <option value='2'>test2</option>";
            /* This isn't working
            echo CHtml::listOptions(
                    null,
                    CHtml::listData(EventType::model()->findAll(), 'idEventType', 'displayName'),
                    array('prompt'=>'Select a Type')
                    );
            */ 
            // I got something like this to work earlier in development
            // Good it works!
            $data=CHtml::listData(EventType::model()->findAll(), 'idEventType', 'displayName');
            foreach($data as $value=>$name)
                {
                echo CHtml::tag(
                        'option',
                        array('value'=>$value),CHtml::encode($name),true);
                }
        }
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		Yii::import('ext.multimodelform.MultiModelForm');
                
		$model=$this->loadModel($id);

		$eventType=new EventType;
		$member=new EventAttribute;
		$validatedMembers = array(); // ensure an empty array

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Event']))
		{
			$model->attributes=$_POST['Event'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idEvent));
		}

		$this->render('update',array(
			'model'=>$model,
				'eventType'=>$eventType,
				'member'=>$member,
				'validatedMembers'=>$validatedMembers,
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
		$dataProvider=new CActiveDataProvider('Event');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Event('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Event']))
			$model->attributes=$_GET['Event'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Event the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Event::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	
	/**
	 * Ensures the attributes input are valid for the event type, and then (optionally validates data and) adds them to the event
	 * @param array $attr the attributes input, an array keyed by eventAttributeId containing the value for the event attribute in the EAV table
	 * @param Event $event the event object to augment
	 * @return Boolean was the process successful?
	 */
	public function addAttributes($attr, $event)
	{
		$attributes = $event->eventType->eventAttributes;
		$allowed = array();
		foreach ($attributes as $attribute){
			$allowed[] = $attribute->idEventAttribute;
		}
		foreach (array_keys($attr) as $id){
			if (in_array($id, $allowed)){
				// later also get the value type from the event attribute and validate input data to that defined type
				// also needs error checking and handling
				$eav = new EventAttributeValue();
				$eav->eventId = $event->idEvent;
				$eav->eventAttributeId = $id;
				$eav->value = $attr[$id];
				$eav->save();
			} else {
				//Possible hacking attempt
			}
		}
		return true;
	}
	
	
	/**
	 * Performs the AJAX validation.
	 * @param Event $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='event-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
       public function actionDynamicAttributesCheck($id = null)
       {
          try{
            if(is_null($id))
                $id = $_POST['Event']['eventTypeId'];
            
            $eventType = EventType::model()->findByPk($id);
            
            if(is_null($eventType) )
                echo 'There are no additional attributes setup for that type of event.';

            $eventTypeAttributes = $eventType->eventAttributes;
            if($eventTypeAttributes) {
                
                foreach($eventTypeAttributes as $attribute)
                    {
                    echo CHtml::tag('input',
                            array('type'=>'checkbox','checked'=>'checked','value'=>$attribute->idEventAttribute, 'id'=>$attribute->idEventAttribute, 'name'=>'Event[attributeValues][]'),
                            '<span class="custom checkbox"></span>' . CHtml::encode($attribute->displayName),
                            true);
                    }
             }
          }catch(Exception $e){
                 echo $e->getMessage();
             }
			
       }
        
       /*
        * Working on generating text boxes to set values for related attributes
        * take  1 incomplete as of 2013-10-28
        */ 
       public function actionAttributeTextBoxes($idEventType = null, $idEvent = null)
       {
          Yii::trace(print_r($_POST, 1));
		  //return true;
		  try{
            //if(is_null($id))
                //$id = $_POST['Event']['eventTypeId'];
            
			 // //Yii::trace(print_r($_POST, 1));
              // if(is_null($id))
                // if ( isset($_POST['Event']) && isset($_POST['Event']['eventTypeId']) ) $id = $_POST['Event']['eventTypeId'];
                // else {echo "Missing ID <br /><pre>".print_r($_POST, 1)."</pre>"; return;}
            
            // $idevent = null;
            // if( isset($_GET['idEvent']) && $_GET['idEvent'] != null){
                // // !!! needs sanitization
                // $idevent =$_GET['idEvent'];
                // $event = Event::model()->findByPk($idevent);
                // $attributesValues = array();
                // foreach($event->attributeValues as $attr){
                    // $id = $attr->eventAttributeId;
                    // $value = $attr->value;
                    // $attributeValues[$id]=$value;
                // }
				
			if ($idEventType === null || $idEventType === '') {
				Yii::trace('No EventTypeid provided');
				return ''; 
			}
			
			$eventType = EventType::model()->findByPk($idEventType);
			
			$event = null;
			
			if ($idEvent === null || $idEvent === '') {
				Yii::trace('There was no event id provided');
			} else {
				$event = Event::model()->findByPk($idEvent);
				$values = $event->attributeValues;
			}
            //Yii::trace($event);
            
            if(is_null($eventType) ) {
			    Yii::trace('There was no event type found for that id'); //echo 'There are no additional attributes setup for that type of event.';
				return '';
			}
			
			
            $eventTypeAttributes = $eventType->eventAttributes;
            if($eventTypeAttributes) {
                echo '<form action="get">';
                foreach($eventTypeAttributes as $attribute) {
					
					$value = null;
					if ( isset($values) ) {
						foreach ($values as $eventAttributeValue) {
							if ($eventAttributeValue->eventAttributeId == $attribute->idEventAttribute)
								$value = $eventAttributeValue->value;
						}
					}
					
					echo CHtml::tag('label',
                            array('for'=>'eventattr'.$attribute->idEventAttribute),
                            CHtml::encode($attribute->displayName),
                            true);
					echo CHtml::activeTextField(
							EventAttributeValue::model(),// not sure about this
                            'value',
                            array('placeholder'=>$attribute->displayName,
                                'id'=>'eventattr'.$attribute->idEventAttribute, 
                                'name'=>'Event[attributes]['.$attribute->idEventAttribute.']',
								'value' => $value ),
                            true);
                }
				echo '</form>';
             }
             else{
                 echo '<input type="text" placeholder="No additional attributes">';
             }
          }catch(Exception $e){
                 echo $e->getMessage();
             }
       }
 }
