<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model common\models\Relationship */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="relationship-form box box-primary">

    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body">

    <?=$form->field($model, 'relationship_type_id')->widget(Select2::classname(), [
        'data' => $relationship_types,
        'options' => ['placeholder' => 'Select Relationship Type ...'],
        'pluginOptions' => [
            'tags' => true,
            'maximumInputLength' => 2
        ],

    ])->label('Type of Relationship'); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'remarks')->widget(TinyMce::className(), [
        'options' => ['rows' => 6],
        'language' => 'en_GB',
        'clientOptions' => [
            'menubar'=>false,
            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent "
        ]
    ]);?>


    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'related_user_id')->textInput() ?>

    </div>
    <div class="form-group box-footer">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
