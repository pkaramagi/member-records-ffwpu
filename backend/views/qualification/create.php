<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Qualification */

$this->title = Yii::t('app', 'Create Qualification');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Qualifications'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qualification-create">

    <!--<h1><?= Html::encode($this->title) ?></h1> -->

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
