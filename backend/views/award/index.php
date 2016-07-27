<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\AwardSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Awards');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php /*button for creating an award*/?>
    <p>
        <?= Html::a(Yii::t('app', 'Create Award'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<div class="award-index box box-primary">

    <!--<h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!-- .box-header -->
    <div class="box-header with-border">
        <h3 class="box-title">List of <?= Html::encode($this->title) ?></h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'issued_by',
            'remarks:ntext',
            'user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div></div>
