<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ChronicDisease */

$this->title = Yii::t('app', 'Create Chronic Disease');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Chronic Diseases'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chronic-disease-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
