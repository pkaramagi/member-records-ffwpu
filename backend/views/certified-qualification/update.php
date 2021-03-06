<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CertifiedQualification */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Certified Qualification',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Certified Qualifications'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="certified-qualification-update">

    <!--<h1><?= Html::encode($this->title) ?></h1> -->

<?php  if(isset($ajax)){  /*Render a form specific to ajax */ ?>

	<?= $this->render('_form-ajax', [
        'model' => $model,
    ]) ?>
	
<?php } else { ?>

    <?= $this->render('_form', [
        'model' => $model,
		'users' => $users,
    ]) ?>
	
<?php } ?>
</div>
