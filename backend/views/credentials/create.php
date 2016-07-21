<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Credentials */

$this->title = Yii::t('app', 'Create Credentials');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Credentials'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="credentials-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
