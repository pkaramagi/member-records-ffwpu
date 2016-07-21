<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MemberForeignLanguage */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Member Foreign Language',
]) . $model->user_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Member Foreign Languages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user_id, 'url' => ['view', 'user_id' => $model->user_id, 'foreign_langauge_id' => $model->foreign_langauge_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="member-foreign-language-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
