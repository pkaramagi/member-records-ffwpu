<?php 
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\data\ArrayDataProvider;
?>
<?php
	/* controller to be used in edit and update functionality*/	
	Yii::$app->controller->id = 'unification-career-record';

	$dataProvider = new ArrayDataProvider(['allModels'=>$models , 'key'=>'id']);

 ?>
<p class="clearfix">
 <?=Html::a('Add Unification Career' , ['unification-career-record/create'] , [ 'data-toggle'=>'modal' , 'data-title'=>'Add New Unification Career', 'data-target'=>'#user-details-add','class' => 'btn btn-success btn-xs pull-right' ]); ?>
</p>
<?php Pjax::begin([
	'id' => 'unification-career-grid',
	'timeout'=> '3000',
]); ?>    
<?= GridView::widget([
        'dataProvider' => $dataProvider,
		'summary' => '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'id',
            'position',
			[
				'label' => 'Organisation',
				'format' => 'html',
				'value' => function ($data) {
                return Html::tag('p',$data->organisation->name);},
			],
            //'organisation_id',
            'location',
            'department',
            // 'description:ntext',
            // 'start_date',
            // 'end_date',
			[ /*display duration*/
				'label' => 'Duration',
				'value' => function($data){
					return $data->start_date.' to '.$data->end_date;
				}
			],
            // 'current',
            // 'user_id',

            [
			
				'class' => 'yii\grid\ActionColumn',
				'buttonOptions' => ['class'=>'action-link',],
			],
        ],
    ]); ?>
<?php Pjax::end(); ?>



