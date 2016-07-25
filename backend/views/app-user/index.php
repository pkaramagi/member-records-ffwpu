<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\AppUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'App Users');
$this->params['breadcrumbs'][] = $this->title;
?>

<!--    <h1><?= Html::encode($this->title) ?></h1> -->
<?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<p>
    <?= Html::a(Yii::t('app', 'Create App User'), ['create'], ['class' => 'btn btn-success']) ?>
</p>
<div class="app-user-index box box-primary">
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
                'first_name',
                'middle_name',
                'last_name',
          
                // 'nationality',
                // 'blessing_group_id',
                // 'date_of_birth',
                // 'spiritual_date_of_birth',
                // 'spiritual_parent',
                // 'passport',
                // 'picture',
                // 'joined_at',
                // 'sex',
                // 'religion_id',
                // 'generation_id',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
        <?php Pjax::end(); ?>
    </div><!-- /.box-body -->
</div>
