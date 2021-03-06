<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\AppUser */

$this->title = Yii::t('app', 'Add New Member');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'App Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-user-create col-md-12">

    <?= $this->render('_form', [
        //pass blessing groups for autocomplete functionality
        'model' => $model,
        'blessing_groups'=>$blessing_groups,
        'religions' => $religions,
        'generations'=> $generations,
    ]) ?>

</div>
