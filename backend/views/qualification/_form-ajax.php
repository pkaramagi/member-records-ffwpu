<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use  kartik\widgets\DatePicker;
use  kartik\widgets\Select2;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model common\models\Qualification */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="qualification-form box box-primary">

    <?php $form = ActiveForm::begin([
	    'id' =>'qualification-form',
	]); ?>
	
	<div class="box-body">

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
<div class="row">
<div class="col-md-6">
    <?= $form->field($model, 'institution')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-md-6">
    <?= $form->field($model, 'major')->textInput(['maxlength' => true]) ?>
</div></div>
<div class="row">
<div class="col-md-6">
    <?= $form->field($model, 'date_of_start')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter Start date ...'],
        'pluginOptions' => [
            'autoclose'=>true
        ]
    ]); ?>
</div>
<div class="col-md-6">
    <?= $form->field($model, 'date_of_completion')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter Completion date ...'],
        'pluginOptions' => [
            'autoclose'=>true
        ]
    ]); ?>

</div></div>
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
