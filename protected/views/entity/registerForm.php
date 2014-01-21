<?php

/*
 * Attmpting form for entity registration with a person
 */

return array(
    'elements'=>array(
        'entity'=>array(
            'type'=>'form',
            'title'=>'New Entity Registration',
            'class'=>'panel',
            'elements'=>array(
                'name'=>array(
                    'type'=>'text',
                ),
                'entityTypeId'=>array(
                    'type'=>'radiolist',
                    'items'=>CHtml::listData(EntityType::model()->findAll(), 'idEntityType', 'name'),
                    'separator'=>'&nbsp; &nbsp;',
                    'labelOptions'=>array('style'=>'display:inline',),
                ),
                'address1'=>array(
                    'type'=>'text',
                ),
                'address2'=>array(
                    'type'=>'text',
                ),
                'city'=>array(
                    'type'=>'text',
                ),
                'state'=>array(
                    'type'=>'text',
                ),
                'zip'=>array(
                    'type'=>'text',
                ),
                'phone'=>array(
                    'type'=>'text',
                ),
                'comments'=>array(
                    'type'=>'text',
                )
            ),
        ),
 
        'person'=>array(
            'type'=>'form',
            'title'=>'Person Information',
            'class'=>'panel',
            'elements'=>array(
                'firstName'=>array(
                    'type'=>'text',
                    'class'=>'large-6 columns',
                ),
                'lastName'=>array(
                    'type'=>'text',
                    'class'=>'large-6 columns',
                ),
                'personTypeId'=>array(
                    'type'=>'radiolist',
                    'items'=>  CHtml::listData(PersonType::model()->findAll(), 'idPersonType', 'Name'),
                    'separator'=>'&nbsp; &nbsp;',
                    'labelOptions'=>array('style'=>'display:inline',)),
                'email'=>array(
                    'type'=>'text',
                    'class'=>'large-6 columns',
                ),
                'birthDate'=>array(
                    'type'=>'date',
                    'class'=>'large-6 columns',
                ),
                'phone'=>array(
                    'type'=>'text',
                    'class'=>'large-6 columns',
                ),
                'comments'=>array(
                    'type'=>'text',
                    'class'=>'large-6 columns',
                ),
            ),
        ),
    ),
 
    'buttons'=>array(
        'register'=>array(
            'type'=>'submit',
            'label'=>'Register',
        ),
    ),
);
?>
