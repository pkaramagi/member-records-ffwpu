<?php 
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\data\ArrayDataProvider;
?>
<?php
	/* controller to be used in edit and update functionality*/	
	Yii::$app->controller->id = 'donation';

	$dataProvider = new ArrayDataProvider(['allModels'=>$models , 'key'=>'id']);

 ?>
   <p class="clearfix">
 <?=Html::a('Add New Donation' , ['donation/create'] , [  'data-toggle'=>'modal' , 'data-target'=>'#user-details-add','data-title'=>'Add New Donation','class' => 'btn btn-success btn-xs pull-right' ]); ?>
</p>
<?php Pjax::begin([
	'id' => 'donation-grid',
	'timeout'=> '3000',
]); ?>  
  <?= GridView::widget([
        'dataProvider' => $dataProvider,
		'summary' => '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
			[
				'label' => 'Type',
				'value' => function ($data) {
                return $data->donationType->name; } ,
			],
            'name',
            'amount',
            //'donation_type',
			
            //'description:html',
            // 'user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?>