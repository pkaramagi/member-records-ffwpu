<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
use kartik\widgets\DatePicker;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\CertifiedQualification */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="certified-qualification-form box box-primary">

    <?php $form = ActiveForm::begin([
	    'id' =>'certified-qualification-form',
	]); ?>
    <div class="box-body">
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
<div class="row">
<div class="col-md-6">
    <?= $form->field($model, 'certification_institution')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-md-6">
    <?= $form->field($model, 'date')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter Certification date ...'],
        'pluginOptions' => [
            'autoclose'=>true
        ]
    ])->label('Certification Date'); ?>
</div>
</div>

	
    <?= $form->field($model, 'remarks')->widget(TinyMce::className(), [
        'options' => ['rows' => 6],
        'language' => 'en_GB',
        'clientOptions' => [
            'menubar'=>false,
            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent "
        ]
    ]);?>
	

	<?= $form->field($model, 'user_id')->hiddenInput(['value'=> isset($user_id) ? $user_id : $model->user_id ])->label(false); ?>
   
    </div>
    <div class="form-group box-footer">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
