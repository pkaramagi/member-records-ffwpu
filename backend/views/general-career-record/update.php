<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\GeneralCareerRecord */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'General Career Record',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'General Career Records'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="general-career-record-update">

    <h1><?= Html::encode($this->title) ?></h1>
<?php  if(isset($ajax)){  /*Render a form specific to ajax */ ?>

	<?= $this->render('_form-ajax', [
        'model' => $model,
    ]); ?>
	
<?php } else { ?>
	
    <?= $this->render('_form', [
        'model' => $model,
		'users' => $users,
    ]); ?>
	
<?php } ?>
</div>
