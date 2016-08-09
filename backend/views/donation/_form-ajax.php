<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use  kartik\widgets\Select2;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model common\models\Donation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="donation-form box">

    <?php $form = ActiveForm::begin([
	    'id' =>'donation-form',
	]); ?>
	
	<div class="box-body">
<div class="row">
<div class="col-md-4">
    <?=$form->field($model, 'donation_type')->widget(Select2::classname(), [
        'data' => $donation_types,
        'options' => ['placeholder' => 'Select a Donation Type ...'],
    ])->label('Donation Type'); ?>
</div>
<div class="col-md-4">
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
</div><div class="col-md-4">
    <?= $form->field($model, 'amount')->textInput() ?>
</div>
</div>
<div class="row">
<div class="col-md-12">
<?= $form->field($model, 'description')->widget(TinyMce::className(), [
        'options' => ['rows' => 6],
        'language' => 'en_GB',
        'clientOptions' => [
            'menubar'=>false,
            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent "
        ]
    ]);?>
</div>
</div>
</div>
    

 <?= $form->field($model, 'user_id')->hiddenInput(['value'=> isset($user_id) ? $user_id : ''  ])->label(false); ?>

    <div class="form-group box-footer">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
	
    <?php ActiveForm::end(); ?>

</div>
