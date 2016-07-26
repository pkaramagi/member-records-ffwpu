<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Religion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="religion-form box box-primary">

    <?php $form = ActiveForm::begin(); ?>
	<div class="box-body">

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        </div>
    <div class="form-group box-footer">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
