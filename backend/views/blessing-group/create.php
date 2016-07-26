<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\BlessingGroup */

$this->title = Yii::t('app', 'Create Blessing Group');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Blessing Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blessing-group-create">

   <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
