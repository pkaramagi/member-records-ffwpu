<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\widgets\Select2;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model common\models\Workshop */
/* @var $form yii\widgets\ActiveForm */
/* @var $workshop_types array*/
?>

<div class="workshop-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=$form->field($model, 'workshop_type_id')->widget(Select2::classname(), [
        'data' => $workshop_types,
        'options' => ['placeholder' => 'Select Type of Workshop ...'],
        'pluginOptions' => [
            'tags' => true,
            'maximumInputLength' => 2
        ],

    ])->label('Workshop Type'); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'theme')->widget(TinyMce::className(), [
        'options' => ['rows' => 6],
        'language' => 'en_GB',
        'clientOptions' => [
            'menubar'=>false,
            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent "
        ]
    ]);?>

    <?= $form->field($model, 'details')->widget(TinyMce::className(), [
        'options' => ['rows' => 6],
        'language' => 'en_GB',
        'clientOptions' => [
            'menubar'=>false,
            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent "
        ]
    ]);?>

    <?= $form->field($model, 'date_started')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter date of Starting Workshop ...'],
        'pluginOptions' => [
            'autoclose'=>true
        ]
    ])->label('Starting Date'); ?>

    <?= $form->field($model, 'date_end')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter date of Ending Workshop  ...'],
        'pluginOptions' => [
            'autoclose'=>true
        ]
    ])->label('Ending Date'); ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
