<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AppUserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="app-user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'first_name') ?>

    <?= $form->field($model, 'middle_name') ?>

    <?= $form->field($model, 'last_name') ?>

 
    <?php // echo $form->field($model, 'nationality') ?>

    <?php // echo $form->field($model, 'blessing_group_id') ?>

    <?php // echo $form->field($model, 'date_of_birth') ?>

    <?php // echo $form->field($model, 'spiritual_date_of_birth') ?>

    <?php // echo $form->field($model, 'spiritual_parent') ?>

    <?php // echo $form->field($model, 'passport') ?>

    <?php // echo $form->field($model, 'picture') ?>

    <?php // echo $form->field($model, 'joined_at') ?>

    <?php // echo $form->field($model, 'sex') ?>

    <?php // echo $form->field($model, 'religion_id') ?>

    <?php // echo $form->field($model, 'generation_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
