<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\DonationType */

$this->title = Yii::t('app', 'Create Donation Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Donation Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="donation-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
