<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
use kartik\widgets\DatePicker;
use kartik\widgets\Select2;
/* @var $this yii\web\View */
/* @var $model common\models\GeneralCareerRecord */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="general-career-record-form box box-primary">

    <?php $form = ActiveForm::begin([
	    'id' =>'general-career-form',
	]); ?>
	
	<div class="box-body">

    <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'organisation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->widget(TinyMce::className(), [
        'options' => ['rows' => 6],
        'language' => 'en_GB',
        'clientOptions' => [
            'menubar'=>false,
            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent "
        ]
    ]);?>


    <?= $form->field($model, 'start_date')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter Starting date ...'],
        'pluginOptions' => [
            'autoclose'=>true
        ]
    ])->label('Starting Date'); ?>

    <?= $form->field($model, 'end_date')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter Ending date ...'],
        'pluginOptions' => [
            'autoclose'=>true
        ]
    ])->label('Ending Date'); ?>

	<?= $form->field($model, 'user_id')->hiddenInput(['value'=> isset($user_id) ? $user_id : $model->user_id ])->label(false); ?>
   
    <div class="form-group box-footer">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
