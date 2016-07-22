<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\AppUser */
/*change title to firstname and last name*/
$this->title = $model->last_name.' '.$model->first_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'App Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-user-view ">

    <!--<h1><?= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this User?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="app-user-view  box box-primary">
        <!-- /.box-header -->
        <div class="box-header with-border">
            <h3 class="box-title">Details of <?= Html::encode($this->title) ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'first_name',
                    'middle_name',
                    'last_name',
                    'username',
                    'nationality',
                    [                      // the blessing group of the model
                        'label' => 'Blessing Group',
                        'value' => $model->blessingGroup->name,
                    ],
                    'date_of_birth',
                    'spiritual_date_of_birth',
                    'spiritual_parent',
                    'passport',
                    'picture',
                    'joined_at',
                    'sex',
                   // 'religion_id',
                    [                      // the former religion of the model
                        'label' => 'Former Religion',
                        'value' => $model->religion->name,
                    ],
                   // 'generation_id',
                    [                      // the generation of the model
                        'label' => 'Genenation',
                        'value' => $model->generation->name,
                    ],
                ],
            ]) ?>

        </div>
    </div>