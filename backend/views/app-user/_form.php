<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;
use kartik\widgets\FileInput;
/* @var $this yii\web\View */
/* @var $model common\models\AppUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="app-user-form box box-primary">


    <?php $form = ActiveForm::begin(
			[
				'options'=>['enctype'=>'multipart/form-data'], // important
			]
		); ?>
    <div class="box-body">
        <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'middle_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

        <?=$form->field($model, 'nationality')->widget(Select2::classname(), [
            'data' => $model->getNationalities(),
            'options' => ['placeholder' => 'Nationality ...'],
        ])->label('Nationality'); ?>

        <?=$form->field($model, 'blessing_group_id')->widget(Select2::classname(), [
            'data' => $blessing_groups,
            'options' => ['placeholder' => 'Select a blessing group ...'],
            'pluginOptions' => [
                'tags' => true,
                'maximumInputLength' => 2
            ],

        ])->label('Blessing Group'); ?>

        <?= $form->field($model, 'date_of_birth')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Enter birth date ...'],
            'pluginOptions' => [
                'autoclose'=>true
            ]
        ]); ?>

        <?= $form->field($model, 'spiritual_date_of_birth')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Enter birth date ...'],
            'pluginOptions' => [
                'autoclose'=>true
            ]
        ])->label('Spiritual Birth Date'); ?>


        <?= $form->field($model, 'spiritual_parent')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'passport')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'picture')->widget(FileInput::classname(), [
            'options' => ['accept' => 'image/*'],
        ]); ?>

        <?= $form->field($model, 'joined_at')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'sex')->radioList(array('M'=>'Male','F'=>'Female'))->label('Gender'); ?>

        <?=$form->field($model, 'religion_id')->widget(Select2::classname(), [
            'data' => $religions,
            'options' => ['placeholder' => 'Previous Religion ...'],
        ])->label('Previous Religion'); ?>


        <?=$form->field($model, 'generation_id')->widget(Select2::classname(), [
            'data' => $generations,
            'options' => ['placeholder' => 'Generation ...'],
        ])->label('Generation'); ?>
    </div>
    <div class="form-group box-footer">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
