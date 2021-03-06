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

    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body">
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'certification_institution')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter Certification date ...'],
        'pluginOptions' => [
            'autoclose'=>true
        ]
    ])->label('Certification Date'); ?>


	<?=$form->field($model, 'user_id')->widget(Select2::classname(), [
            'data' => $users ,
            'options' => ['placeholder' => 'Select a User'],
            'pluginOptions' => [
                'tags' => true,
                'maximumInputLength' => 2
            ],

        ])->label('Member Qualified'); ?>
	
    <?= $form->field($model, 'remarks')->widget(TinyMce::className(), [
        'options' => ['rows' => 6],
        'language' => 'en_GB',
        'clientOptions' => [
            'menubar'=>false,
            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent "
        ]
    ]);?>


    </div>
    <div class="form-group box-footer">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
