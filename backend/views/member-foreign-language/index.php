<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\MemberForeignLanguageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Member Foreign Languages');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-foreign-language-index">

   <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Member Foreign Language'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="box box-primary">
        <!-- /.box-header -->
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

            'user_id',
            'foreign_langauge_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div></div></div>
