<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\MemberForeignLanguage */

$this->title = Yii::t('app', 'Create Member Foreign Language');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Member Foreign Languages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-foreign-language-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
