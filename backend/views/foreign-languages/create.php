<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ForeignLanguages */

$this->title = Yii::t('app', 'Create Foreign Languages');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Foreign Languages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="foreign-languages-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
