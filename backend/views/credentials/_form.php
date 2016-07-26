<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
/* @var $this yii\web\View */
/* @var $model common\models\Credentials */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="credentials-form box box-primary">

    <?php $form = ActiveForm::begin(); ?>
	
	<div class="box-body">

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
	<?= $form->field($model, 'pass')->textInput(['maxlength' => true])  ?>

    <?php // $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'password_reset_token')->textInput(['maxlength' => true])  ?> 

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'email_activation_token')->textInput(['maxlength' => true]) ?> 

	
        <?=$form->field($model, 'user_id')->widget(Select2::classname(), [
            'data' => $users,
            'options' => ['placeholder' => 'User ...'],
        ])->label('User'); ?>

    <?= $form->field($model, 'role')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?php /* $form->field($model, 'created_at')->textInput() */ ?>

    <?php /* $form->field($model, 'updated_at')->textInput() */ ?>

    </div>
    <div class="form-group box-footer">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
