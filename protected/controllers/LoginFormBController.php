<?php

class LoginFormBController extends Controller
{
	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginFormB();

		// collect user input data
		if(isset($_POST['LoginFormB']))
		{
			$model->attributes=$_POST['LoginFormB'];
			// validate user input and redirect to the previous page if valid
			if($model->validate())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

        
}