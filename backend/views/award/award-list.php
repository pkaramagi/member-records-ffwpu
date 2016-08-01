<?php 
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\data\ArrayDataProvider;
?>
<?php
	$dataProvider = new ArrayDataProvider(['allModels'=>$models]);

 ?>
<?php Pjax::begin(); ?>   
	 <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'issued_by',
            'remarks:html',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?>