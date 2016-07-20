<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\RelationshipSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="relationship-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'relationship_type_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'remarks') ?>

    <?= $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'related_user_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
