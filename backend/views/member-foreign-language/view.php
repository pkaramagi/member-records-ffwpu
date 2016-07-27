<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\MemberForeignLanguage */

$this->title = $model->user_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Member Foreign Languages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-foreign-language-view">

    <!--<h1><?= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'user_id' => $model->user_id, 'foreign_langauge_id' => $model->foreign_langauge_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'user_id' => $model->user_id, 'foreign_langauge_id' => $model->foreign_langauge_id], [
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
            'user_id',
            'foreign_langauge_id',
        ],
    ]) ?>

</div></div></div>
