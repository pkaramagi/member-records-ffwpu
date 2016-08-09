<?php 
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\data\ArrayDataProvider;
?>
<?php
	/* controller to be used in edit and update functionality*/	
	Yii::$app->controller->id = 'qualification';

	$dataProvider = new ArrayDataProvider(['allModels'=>$models ,'key'=>'id']);

 ?>
<p class="clearfix">
 <?=Html::a('Add Qualification' , ['qualification/create'] , [  'data-toggle'=>'modal' , 'data-target'=>'#user-details-add','data-title'=>'Add New Qualification','class' => 'btn btn-success btn-xs pull-right' ]); ?>
</p>
<?php Pjax::begin([
	'id' => 'qualification-grid',
	'timeout'=> '3000',
]); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
		'summary' => '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            'institution',
            //'date_of_completion',
            //'date_of_start',
			
             'major',
            // 'remarks:ntext',
            // 'user_id',
			[ /*display duration*/
				'label' => 'Duration',
				'value' => function($data){
					return $data->date_of_start.' to '.$data->date_of_completion;
				}
			],

            [
			
				'class' => 'yii\grid\ActionColumn',
				'buttonOptions' => ['class'=>'action-link',],
			],
        ],
    ]); ?>
<?php Pjax::end(); ?>