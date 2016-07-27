<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\GeneralCareerRecordSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'General Career Records');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="general-career-record-index">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create General Career Record'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
	<div class=" box box-primary">
    <!-- .box-header -->
    <div class="box-header with-border">
        <h3 class="box-title">List of Members</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'position',
            'organisation',
            'description:ntext',
            'start_date',
            // 'end_date',
            // 'user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div></div>
