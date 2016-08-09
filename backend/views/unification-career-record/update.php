<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\UnificationCareerRecord */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Unification Career Record',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Unification Career Records'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="unification-career-record-update">

   <!-- <h1><?= Html::encode($this->title) ?></h1> -->

	<?php  if(isset($ajax)){  /*Render a form specific to ajax */ ?>

	<?= $this->render('_form-ajax', [
        'model' => $model,
		'organisations' => $organisations,
		
    ]) ?>
	
	<?php } else { ?>

    <?= $this->render('_form', [
        'model' => $model,
		'organisations' => $organisations,
		'users' => $users,
    ]) ?>
	<?php }  ?>
</div>
