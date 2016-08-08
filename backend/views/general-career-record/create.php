<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\GeneralCareerRecord */

$this->title = Yii::t('app', 'Create General Career Record');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'General Career Records'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="general-career-record-create">

   <!-- <h1><?= Html::encode($this->title) ?></h1> -->
<?php  if(isset($ajax)){  /*Render a form specific to ajax */ ?>

	<?= $this->render('_form-ajax', [
        'model' => $model,
		'user_id' => $user_id,
    ]) ?>
	
<?php } else { ?>

    <?= $this->render('_form', [
        'model' => $model,
		'users' => $users,
    ]) ?>
	
<?php } ?>
</div>
