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

    <?php $form = ActiveForm::begin(); ?>
	
	<div class="box-body">

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'institution')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'major')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_of_start')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter Start date ...'],
        'pluginOptions' => [
            'autoclose'=>true
        ]
    ]); ?>

    <?= $form->field($model, 'date_of_completion')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter Completion date ...'],
        'pluginOptions' => [
            'autoclose'=>true
        ]
    ]); ?>


    <?= $form->field($model, 'remarks')->widget(TinyMce::className(), [
        'options' => ['rows' => 6],
        'language' => 'en_GB',
        'clientOptions' => [
            'menubar'=>false,
            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent "
        ]
    ]);?>


 	<?=$form->field($model, 'user_id')->widget(Select2::classname(), [
            'data' => $users ,
            'options' => ['placeholder' => 'Select a User'],
            'pluginOptions' => [
                'tags' => true,
                'maximumInputLength' => 2
            ],

        ])->label('Which member does this Qualification Record belong to ?'); ?>	
    
	</div>
    <div class="form-group box-footer">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
