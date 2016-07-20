<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\RelationshipType */

$this->title = Yii::t('app', 'Create Relationship Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Relationship Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="relationship-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
