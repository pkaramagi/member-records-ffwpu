<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Contact */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Contact',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contacts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="contact-update">

   <!-- <h1><?= Html::encode($this->title) ?></h1> -->
<?php  if(isset($ajax)){  /*Render a form specific to ajax */ ?>

	 <?= $this->render('_form-ajax', [
        'model' => $model,
		'contact_types'=>$contact_types,
    ]) ?>
	
<?php } else { ?>

    <?= $this->render('_form', [
        'model' => $model,
		'contact_types'=>$contact_types,
		'users' => $users,
    ]) ?>
	
<?php } ?>
</div>
