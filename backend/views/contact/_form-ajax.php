<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\Contact */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contact-form box box-primary">

   <?php $form = ActiveForm::begin([
	    'id' =>'contact-form',
		]); 
	?>
	
	<div class="box-body">

    <?=$form->field($model, 'contact_type_id')->widget(Select2::classname(), [
        'data' => $contact_types,
        'options' => ['placeholder' => 'Select Contact Type'],
        'pluginOptions' => [
            'tags' => true,
            'maximumInputLength' => 2
        ],

    ])->label('Contact Type'); ?>
	
    <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>
	
    <?= $form->field($model, 'user_id')->hiddenInput(['value'=> $user_id])->label(false); ?>

    </div>
    <div class="form-group box-footer">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
