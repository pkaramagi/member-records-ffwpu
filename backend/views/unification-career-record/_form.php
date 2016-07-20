<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model common\models\UnificationCareerRecord */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="unification-career-record-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model, 'organisation_id')->widget(Select2::classname(), [
        'data' => $organisations,
        'options' => ['placeholder' => 'Select Relationship Type ...'],
        'pluginOptions' => [
            'tags' => true,
            'maximumInputLength' => 2
        ],

    ])->label('Organisation'); ?>

    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'department')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->widget(TinyMce::className(), [
        'options' => ['rows' => 6],
        'language' => 'en_GB',
        'clientOptions' => [
            'menubar'=>false,
            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent "
        ]
    ]);?>

    <?= $form->field($model, 'start_date')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter Certification date ...'],
        'pluginOptions' => [
            'autoclose'=>true
        ]
    ])->label('Starting Date'); ?>

    <?= $form->field($model, 'end_date')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter Certification date ...'],
        'pluginOptions' => [
            'autoclose'=>true
        ]
    ])->label('Completion Date Date'); ?>

    <?= $form->field($model, 'current')->checkbox(
    ) ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
