<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BlessingGroup */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Blessing Group',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Blessing Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="blessing-group-update">

  <!--  <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
