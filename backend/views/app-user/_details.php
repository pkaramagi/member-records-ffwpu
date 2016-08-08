<?php
use yii\bootstrap\Tabs;
use yii\data\ArrayDataProvider;
?>
	<div class="nav-tabs-custom">
		<?= Tabs::widget([
		'encodeLabels' => false,
		'id' => 'tb-1',
    'items' => [
		[
            'label' => '<i class="fa fa-phone-square" aria-hidden="true"></i> &nbsp; Contact Details',
            'content' => \Yii::$app->view->render('@backend/views/contact/contact-list.php', ['models'=>$model->contacts]),
            
			'options' => ['id' => 'user-contacts-tab'],
        ],
		[
            'label' => '<i class="fa fa-map-marker" aria-hidden="true"></i> &nbsp; Address',
            'active' => true,
			'content' => \Yii::$app->view->render('@backend/views/address/address-list.php', ['models'=>$model->addresses]), 
        ],	
		
    ],
]);
   ?>

	</div>

	<div class="nav-tabs-custom">
		<?= Tabs::widget([
		'encodeLabels' => false,
		'id' => 'tb-2',
    'items' => [
		
		[
            'label' => '<i class="fa fa-gift" aria-hidden="true"></i> &nbsp; Donations',
            'content' => \Yii::$app->view->render('@backend/views/donation/donation-list.php', ['models'=>$model->donations]),
           
        ],	
        [
            'label' => ' <i class="fa fa-trophy" aria-hidden="true"></i> &nbsp; Awards',
            'content' => \Yii::$app->view->render('@backend/views/award/award-list.php', ['models'=>$model->awards]) ,
            
			
        ],
        [
            'label' => '<i class="fa fa-frown-o" aria-hidden="true"></i> &nbsp; Punishments',
            'content' => \Yii::$app->view->render('@backend/views/punishment/punishment-list.php', ['models'=>$model->punishments]),
           
        ],
        	
       
    ],
]);
   ?>

	</div>
		<div class="nav-tabs-custom">
		<?= Tabs::widget([
		'encodeLabels' => false,
		'id' => 'tb-3',
    'items' => [
		
		[
            'label' => '<i class="fa fa-map-marker" aria-hidden="true"></i> &nbsp; Unification Career',
            'content' => \Yii::$app->view->render('@backend/views/unification-career-record/unification-career-list.php', ['models'=>$model->unificationCareerRecords]),
			'active' => true,			
        ],	
		
		[
            'label' => '<i class="fa fa-map-marker" aria-hidden="true"></i> &nbsp; General Career ',
            'content' => \Yii::$app->view->render('@backend/views/general-career-record/general-career-list.php', ['models'=>$model->generalCareerRecords]), 
        ],	
		[
            'label' => '<i class="fa fa-phone-square" aria-hidden="true"></i> &nbsp; Qualifications',
            'content' => \Yii::$app->view->render('@backend/views/qualification/qualificaton-list.php', ['models'=>$model->qualifications]),
            
        ],
	
		[
            'label' => '<i class="fa fa-phone-square" aria-hidden="true"></i> &nbsp; Certified Qualifications',
            'content' => \Yii::$app->view->render('@backend/views/certified-qualification/certified-qualificaton-list.php', ['models'=>$model->certifiedQualifications]),
           
        ],		
				
    ],
]);
   ?>
</div>
	