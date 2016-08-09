<?php 
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\data\ArrayDataProvider;
?>
<?php
	/* controller to be used in edit and update functionality*/	
	Yii::$app->controller->id = 'contact';

	$dataProvider = new ArrayDataProvider(['allModels'=>$models ,'key'=>'id' ]);

 ?>
 <p class="clearfix">
 <?=Html::a('Add News Contact' , ['contact/create'] , [  'data-toggle'=>'modal' , 'data-title'=>'Add New Contact', 'data-target'=>'#user-details-add','class' => 'btn btn-success btn-xs pull-right' ]); ?>
</p>
<div>
 <?php Pjax::begin([
	'id' => 'contact-grid',
	'timeout'=> '3000',
]); ?>   
 <?= GridView::widget([
        'dataProvider' => $dataProvider,
		'summary'=> '' ,
		'tableOptions' => ['class' => 'table table-striped'],
		'showHeader' => false ,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
    
			[
				
				'value' => function ($data) {
                return $data->contactType->name;},
			],
			[
				'value' => function ($data) {
                return $data->value;},
			],
			//'id',
            //'contact_type_id',
            //'value',
            //'user_id',
			
            [
			
				'class' => 'yii\grid\ActionColumn',
				'buttonOptions' => ['class'=>'action-link',],
			],
        ],
    ]); ?>
<?php Pjax::end(); ?>	
</div>