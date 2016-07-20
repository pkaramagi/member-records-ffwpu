<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Relationship */

$this->title = Yii::t('app', 'Create Relationship');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Relationships'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="relationship-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
