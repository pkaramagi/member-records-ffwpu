<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Donation */

$this->title = Yii::t('app', 'Create Donation');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Donations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="donation-create">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->
<?php  if(isset($ajax)){  /*Render a form specific to ajax */ ?>

	<?= $this->render('_form-ajax', [
        'model' => $model,
		'donation_types'=>$donation_types,
		'user_id' => $user_id,
    ]) ?>
	
<?php } else { ?>

    <?= $this->render('_form', [
        'model' => $model,
        'donation_types'=>$donation_types,
		'users' => $users,
    ]) ?>
	
<?php } ?>
</div>
