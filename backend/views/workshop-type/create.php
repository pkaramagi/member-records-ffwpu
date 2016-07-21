<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\WorkshopType */

$this->title = Yii::t('app', 'Create Workshop Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Workshop Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workshop-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
