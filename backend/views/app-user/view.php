<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model common\models\AppUser */
/*change title to firstname and last name*/
$this->title = $model->last_name.' '.$model->first_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'App Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-user-view ">
<div id="user-id" data-id=<?=$model->id; ?> style="display:none;"></div>
	<div class="row">
		<div class="col-md-3">
		 <div class=" box box-primary">
        
        <div class="box-body box-profile">
			<?php
				 $image = Yii::$app->user->identity->getUserProfile()->picture;
				 $name = $model->first_name.' '.$model->middle_name.' '.$model->last_name;
			?>
			<?= Html::img('@web/uploads/' . $image, ['class' => 'img-circle profile-user-img img-responsive','alt'=>'User Profile Picture']); ?> 
            <h3 class="profile-username text-center"><?=$name; ?></h3>
			<p class="text-muted text-center"><?= $model->nationality.' '.$model->generation->name ?></p>
			  <?= Html::a(Yii::t('app', '<i class="fa fa-pencil-square" aria-hidden="true"></i>    Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-block btn-sm']) ?>
        <?= Html::a(Yii::t('app', ' <i class="fa fa-trash" aria-hidden="true"></i>   Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger btn-block btn-sm',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this User?'),
                'method' => 'post',
            ],
        ]) ?>
			<br>
			<ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Membership ID</b> <a class="pull-right"><?= $model->id ?></a>
                </li>
				<li class="list-group-item">
                  <b>Sex</b> <a class="pull-right"><?= $model->sex ?></a>
                </li>
                <li class="list-group-item">
                  <b>Passport</b> <a class="pull-right"><?= $model->passport ?></a>
                </li>
                <li class="list-group-item">
                  <b>Date of Birth</b> <a class="pull-right"><?= $model->date_of_birth ?></a>
                </li>
				<li class="list-group-item">
                  <b>Spiritual Birth Date</b> <a class="pull-right"><?= $model->spiritual_date_of_birth ?></a>
                </li>
				<li class="list-group-item">
                  <b>Joined At</b> <a class="pull-right"><?= $model->joined_at; ?></a>
                </li>
				
              </ul>
			<?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                  //  'id',
                   // 'username',
                   // 'nationality',
                    [                      // the blessing group of the model
                        'label' => 'Blessing Group',
                        'value' => $model->blessingGroup->name,
                    ],
                    //'date_of_birth',
                    //'spiritual_date_of_birth',
                    //'spiritual_parent',
                   // 'passport',
                    //'picture',
                    //'joined_at',
                    //'sex',
                   // 'religion_id',
                    [                      // the former religion of the model
                        'label' => 'Former Religion',
                        'value' => $model->religion->name,
                    ],
                   // 'generation_id',
                   
                ],
            ]) ?>

        </div>
		</div>
		
		
	</div>
	<?php /*User details start here */?>
   <div class="col-md-9">
	<?= $this->render('_details', ['model'=> $model ] ); ?>
   </div>
	<?php /*User details end here */?>
   
</div>
	
</div>

<?php Modal::begin([
        'header' => '<h4 class="modal-title"></h4>', 	
		'headerOptions' => ['class' => 'modal-header'],
		'id'=>'user-details-add',
		'class' =>'modal',
		'size' => 'modal-lg'
		
]); ?>
<?=Html::tag('div', '' , ['class' => 'modalContent']) ?>

<?php Modal::end(); ?>