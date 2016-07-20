<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\UnificationCareerRecord */

$this->title = Yii::t('app', 'Create Unification Career Record');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Unification Career Records'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unification-career-record-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'organisations'=>$organisations,
    ]) ?>

</div>
