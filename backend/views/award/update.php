<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Award */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Award',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Awards'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="award-update">

   <!-- <h3><?= Html::encode($this->title) ?></h3> -->

    <?= $this->render( isset($ajax) ? '_form-ajax' : '_form', [
        'model' => $model,
		'users' => $users,
    ]) ?>

</div>
