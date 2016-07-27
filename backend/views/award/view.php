<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Award */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Awards'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="award-view">

    <!--<h1><?= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class=" box box-primary">
        <!-- /.box-header -->
        <div class="box-header with-border">
            <h3 class="box-title">Details of <?= Html::encode($this->title) ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">	
		
	<?php
		// full name of user	and id
		$fullname = $model->user->first_name . $model->user->last_name ;
		$id = $model->user->id;
	?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'issued_by',
            'remarks:html',
            //'user_id',
			[                    // the user of the model
                'label' => 'Awarded To',
				'value' => Html::a( $fullname, ['app-user/view', 'id' => $model->user->id], ['class' => 'profile-link']),
                'format'=> 'html',
            ],
        ],
    ]) ?>

</div>
</div>
</div>