<?php 
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\data\ArrayDataProvider;
?>
<?php
	/* controller to be used in edit and update functionality*/	
	Yii::$app->controller->id = 'general-career-record';

	$dataProvider = new ArrayDataProvider(['allModels'=>$models , 'key'=>'id']);

 ?>
<p class="clearfix">
 <?=Html::a('Add General Career' , ['general-career-record/create'] , [ 'data-toggle'=>'modal' , 'data-title'=>'Add New Career', 'data-target'=>'#user-details-add','class' => 'btn btn-success btn-xs pull-right' ]); ?>
</p>

<?php Pjax::begin([
	'id' => 'general-career-grid',
	'timeout'=> '3000',
]); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
		'summary' => '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
		   'organisation',
            'position',
            //'description:ntext',
            //'start_date',
			[ /*display duration*/
				'label' => 'Duration',
				'value' => function($data){
					return $data->start_date.' to '.$data->end_date;
				}
			],
            // 'end_date',
            // 'user_id',

            [
			
				'class' => 'yii\grid\ActionColumn',
				'buttonOptions' => ['class'=>'action-link',],
			],
        ],
    ]); ?>
<?php Pjax::end(); ?>

