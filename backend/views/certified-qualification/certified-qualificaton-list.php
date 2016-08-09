<?php 
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\data\ArrayDataProvider;
?>
<?php
	/* controller to be used in edit and update functionality*/	
	Yii::$app->controller->id = 'certified-qualification';

	$dataProvider = new ArrayDataProvider(['allModels'=>$models, 'key'=>'id']);

 ?>
<p class="clearfix">
 <?=Html::a('Add Certified Qualification' , ['certified-qualification/create'] , [  'data-toggle'=>'modal' , 'data-target'=>'#user-details-add','data-title'=>'Add New Qualification','class' => 'btn btn-success btn-xs pull-right' ]); ?>
</p>
<?php Pjax::begin([
	'id' => 'certified-qualification-grid',
	'timeout'=> '3000',
]); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
		'summary' 	=> '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            'certification_institution',
            'date',
            //'user_id',
            // 'remarks:ntext',

            [
			
				'class' => 'yii\grid\ActionColumn',
				'buttonOptions' => ['class'=>'action-link',],
			],
        ],
    ]); ?>
<?php Pjax::end(); ?>