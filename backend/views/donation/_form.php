<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use  kartik\widgets\Select2;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model common\models\Donation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="donation-form box box-primary">

    <?php $form = ActiveForm::begin(); ?>
	
	<div class="box-body">

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <?=$form->field($model, 'donation_type')->widget(Select2::classname(), [
        'data' => $donation_types,
        'options' => ['placeholder' => 'Select a Donation Type ...'],
    ])->label('Blessing Group'); ?>

    <?= $form->field($model, 'description')->widget(TinyMce::className(), [
        'options' => ['rows' => 6],
        'language' => 'en_GB',
        'clientOptions' => [
            'menubar'=>false,
            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent "
        ]
    ]);?>

	<?=$form->field($model, 'user_id')->widget(Select2::classname(), [
            'data' => $users,
            'options' => ['placeholder' => 'User ...'],
        ])->label('User'); ?>
    </div>
    <div class="form-group box-footer">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
	
    <?php ActiveForm::end(); ?>

</div>
