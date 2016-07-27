<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\GeneralCareerRecord */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'General Career Records'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="general-career-record-view">

     <!--<h1><?= Html::encode($this->title) ?></h1> -->

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
	<div class=" box box-primary">
    <!-- .box-header -->
    <div class="box-header with-border">
        <h3 class="box-title">List of Members</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'position',
            'organisation',
            'description:ntext',
            'start_date',
            'end_date',
            'user_id',
        ],
    ]) ?>

</div></div></div>
