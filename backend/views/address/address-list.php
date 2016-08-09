<?php 
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\data\ArrayDataProvider;
?>
<?php
	/* controller to be used in edit and update functionality*/	
	Yii::$app->controller->id = 'address';
	
	$dataProvider = new ArrayDataProvider(['allModels'=>$models ,'key'=>'id' ]);

 ?>
  <p class="clearfix">
 <?=Html::a('Add New Address' , ['address/create'] , [  'data-toggle'=>'modal' , 'data-target'=>'#user-details-add','data-title'=>'Add New Address','class' => 'add-detail btn btn-success btn-xs pull-right' ]); ?>
</p>
<?php Pjax::begin([
	'id' => 'address-grid',
	'timeout'=> '3000',
]); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
		'summary'=>'',
        'columns' => [
            //'id',
            'street',
            'city',
            //'district',
            'region',
             'country',
            // 'user_id',

            [
			
				'class' => 'yii\grid\ActionColumn',
				'buttonOptions' => ['class'=>'action-link',],
			],
        ],
    ]); ?>
<?php Pjax::end(); ?>