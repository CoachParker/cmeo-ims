<?php

/*
 * Copied from Larry Ullman's Yii Book
 * 2013 September 18 Wednesday
 */

class AjaxController extends Controller{
    
    public function actionSimple() {
        echo 'true';
    }
    
    
    public function actionHtml(){
        echo '<p>Here <em>Gary</em> issttempting to understand how to use
            java script and ajax with the yii framework, with the help
            of a wonderful text by Larry Ullman, <span style="text-decoration: 
            underline;">The Yii Book</span>.</p>';
    }
    
    public function actionDynamicHtml() {
        // Dynamic data
        $data = array(
            'title'=>'Dynamic!',
            'content'=>'<p>Here I am attempting to load content through a 
                partial render</p>',
        );
        //Render this page
        $this->renderPartial('dynamic', array('data'=>$data));
    }
}
?>
