<?php 
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\data\ArrayDataProvider;
?>
<?php
	/* controller to be used in edit and update functionality*/	
	Yii::$app->controller->id = 'punishment';

	$dataProvider = new ArrayDataProvider(['allModels'=>$models, 'key'=>'id']);

 ?>
 <p class="clearfix">
 <?=Html::a('Add New Punishment' , ['punishment/create'] , [ 'data-toggle'=>'modal' , 'data-title'=>'Add New Award', 'data-target'=>'#user-details-add','class' => 'btn btn-success btn-xs pull-right' ]); ?>
</p>
<?php Pjax::begin([
	'id' => 'punishment-grid',
	'timeout'=> '3000',
]); ?>   
	 <?= GridView::widget([
        'dataProvider' => $dataProvider,
		'summary' => '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'issued_by',
            'remarks:html',
            [
			
				'class' => 'yii\grid\ActionColumn',
				'buttonOptions' => ['class'=>'action-link',],
			],
        ],
    ]); ?>
<?php Pjax::end(); ?>