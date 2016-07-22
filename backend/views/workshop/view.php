<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Workshop */

$this->title = $model->workshopType->name.'-'.$model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Workshops'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workshop-view">

   <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
	
    <div class="app-user-view  box box-primary">
        <!-- .box-header -->
        <div class="box-header with-border">
            <h3 class="box-title">Details of <?= Html::encode($this->title) ?></h3>
        </div>
        <!-- /.box-header -->	
        <!-- .box-body -->
        <div class="box-body">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            //'workshop_type_id',
			[  // the workshop type name of the model
            'label' => 'Workshop Type',
            'value' => $model->workshopType->name,
			],
            'title',
            'theme:html',
            'location',
            'date_started',
            'date_end',
            'details:html',
        ],
    ]) ?>
	
	</div>

</div>
