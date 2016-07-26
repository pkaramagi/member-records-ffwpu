<?php

/* @var $this \yii\web\View */
/* @var $content string */
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php $this->beginBody() ?>
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><?= Html::img('@web/img/ffwpu-white-50.png', ['class' => '','alt'=>'FFPWU EA Logo']); ?></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><?= Html::img('@web/img/FFWPU-EA-white.png', ['class' => '','alt'=>'FFPWU EA Logo']); ?></span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <!-- Menu toggle button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 4 messages</li>
                            <li>
                                <!-- inner menu: contains the messages -->
                                <ul class="menu">
                                    <li><!-- start message -->
                                        <a href="#">
                                            <div class="pull-left">
                                                <!-- User Image -->
                                                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                            </div>
                                            <!-- Message title and timestamp -->
                                            <h4>
                                                Support Team
                                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                            </h4>
                                            <!-- The message -->
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <!-- end message -->
                                </ul>
                                <!-- /.menu -->
                            </li>
                            <li class="footer"><a href="#">See All Messages</a></li>
                        </ul>
                    </li>
                    <!-- /.messages-menu -->

                    <!-- Notifications Menu -->
                    <li class="dropdown notifications-menu">
                        <!-- Menu toggle button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">10</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 10 notifications</li>
                            <li>
                                <!-- Inner Menu: contains the notifications -->
                                <ul class="menu">
                                    <li><!-- start notification -->
                                        <a href="#">
                                            <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                        </a>
                                    </li>
                                    <!-- end notification -->
                                </ul>
                            </li>
                            <li class="footer"><a href="#">View all</a></li>
                        </ul>
                    </li>
                    <!-- Tasks Menu -->
                    <li class="dropdown tasks-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-flag-o"></i>
                            <span class="label label-danger">9</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 9 tasks</li>
                            <li>
                                <!-- Inner menu: contains the tasks -->
                                <ul class="menu">
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <!-- Task title and progress text -->
                                            <h3>
                                                Design some buttons
                                                <small class="pull-right">20%</small>
                                            </h3>
                                            <!-- The progress bar -->
                                            <div class="progress xs">
                                                <!-- Change the css width attribute to simulate progress -->
                                                <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">20% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">View all tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <?php
                                $image = Yii::$app->user->identity->getUserProfile()->picture;
                                $fullname = Yii::$app->
                                    user->identity->getUserProfile()->first_name .
                                    Yii::$app->user->identity->getUserProfile()->last_name;

                            ?>
                            <?= Html::img('@web/uploads/' . $image, ['class' => 'user-image','alt'=>'User Image']); ?>
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs"> <?= $fullname ?> </span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
								<?php /*User avatar in the menu*/?>
                                <?= Html::img('@web/uploads/' . $image, ['class' => 'img-circle','alt'=>'User Image']); ?>
                                <p>
									<?php /*User , fullname*/ ?>
                                    <span class="hidden-xs"> <?= $fullname ?> </span>
                                    <small>Super Admin</small>
                                </p>
                            </li>
                            <!-- Menu Body 
                            <li class="user-body">
                                <div class="row">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </div>
                                <!-- /.row 
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
									<?php /* Sign out button, packaged like a button*/ ?>
									<?= Html::beginForm(['/site/logout'], 'post')
										. Html::submitButton(
											'Sign Out',
											['class' => 'btn btn-default btn-flat']
										)
										. Html::endForm()
									?>

                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
                <div class="pull-left image">

                    <?= Html::img('@web/uploads/' . $image, ['class' => 'img-circle','alt'=>'User Image']); ?>

                </div>
                <div class="pull-left info">
                    <p><?=$fullname ?></p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>

            <!-- search form (Optional) -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->

            <!-- Sidebar Menu -->
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                <!-- Optionally, you can add icons to the links -->
				<?php /*urls for app-user crud*/?>
                <li class="treeview">
                    <a href="#"><i class="fa fa-user" aria-hidden="true"></i><span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
					
                    <ul class="treeview-menu">
                        <li><a href="<?php echo Url::toRoute(['app-user/create']);?>"><i class="fa fa-user-plus" aria-hidden="true"></i>Create</a></li>
                        <li><a href="<?php echo Url::toRoute(['app-user/index']);?>"><i class="fa fa-th-list" aria-hidden="true"></i>List</a></li>
						<li><a href="<?php echo Url::toRoute(['app-user/update']);?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></i>Update</a></li>
                        
                    </ul>
                </li>
				<?php /*urls for workshops*/?>
				<li class="treeview">
                    <a href="#"><i class="fa fa-book" aria-hidden="true"></i><span>Workshops</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
					
                    <ul class="treeview-menu">
                        <li><a href="<?php echo Url::toRoute(['workshop/create']);?>"><i class="fa fa-plus-circle" aria-hidden="true"></i></i>Create</a></li>
                        <li><a href="<?php echo Url::toRoute(['workshop/index']);?>"><i class="fa fa-th-list" aria-hidden="true"></i>List</a></li>
						<li><a href="<?php echo Url::toRoute(['workshop/update']);?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></i>Update</a></li>
                        
                    </ul>
                </li>
				<?php /*urls for awards*/?>
				<li class="treeview">
                    <a href="#"><i class="fa fa-trophy" aria-hidden="true"></i><span>Awards</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
					
                    <ul class="treeview-menu">
                        <li><a href="<?php echo Url::toRoute(['award/create']);?>"><i class="fa fa-plus-circle" aria-hidden="true"></i></i>Create</a></li>
                        <li><a href="<?php echo Url::toRoute(['award/index']);?>"><i class="fa fa-th-list" aria-hidden="true"></i>List</a></li>
						<li><a href="<?php echo Url::toRoute(['award/update']);?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></i>Update</a></li>
                        
                    </ul>
                </li>
				<?php /*urls for punishments*/?>
				<li class="treeview">
                    <a href="#"><i class="fa fa-frown-o" aria-hidden="true"></i><span>Punishments</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
					
                    <ul class="treeview-menu">
                        <li><a href="<?php echo Url::toRoute(['punishment/create']);?>"><i class="fa fa-plus-circle" aria-hidden="true"></i></i>Create</a></li>
                        <li><a href="<?php echo Url::toRoute(['punishment/index']);?>"><i class="fa fa-th-list" aria-hidden="true"></i>List</a></li>
						<li><a href="<?php echo Url::toRoute(['punishment/update']);?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></i>Update</a></li>
                        
                    </ul>
                </li>	
				<?php /*urls for Address*/?>
				<li class="treeview">
                    <a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i><span>Address</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
					
                    <ul class="treeview-menu">
                        <li><a href="<?php echo Url::toRoute(['address/create']);?>"><i class="fa fa-plus-circle" aria-hidden="true"></i></i>Create</a></li>
                        <li><a href="<?php echo Url::toRoute(['address/index']);?>"><i class="fa fa-th-list" aria-hidden="true"></i>List</a></li>
						<li><a href="<?php echo Url::toRoute(['address/update']);?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></i>Update</a></li>
                        
                    </ul>
                </li>
				<?php /*urls for punishments*/?>
				<li class="treeview">
                    <a href="#"><i class="fa fa-users" aria-hidden="true"></i><span>Blessing Groups</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
					
                    <ul class="treeview-menu">
                        <li><a href="<?php echo Url::toRoute(['blessing-group/create']);?>"><i class="fa fa-plus-circle" aria-hidden="true"></i></i>Create</a></li>
                        <li><a href="<?php echo Url::toRoute(['blessing-group/index']);?>"><i class="fa fa-th-list" aria-hidden="true"></i>List</a></li>
						<li><a href="<?php echo Url::toRoute(['blessing-group/update']);?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></i>Update</a></li>
                        
                    </ul>
                </li>
				<?php /*urls for punishments*/?>
				<li class="treeview">
                    <a href="#"><i class="fa fa-certificate" aria-hidden="true"></i><span>Certified Qualifications</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
					
                    <ul class="treeview-menu">
                        <li><a href="<?php echo Url::toRoute(['certified-qualification/create']);?>"><i class="fa fa-plus-circle" aria-hidden="true"></i></i>Create</a></li>
                        <li><a href="<?php echo Url::toRoute(['certified-qualification/index']);?>"><i class="fa fa-th-list" aria-hidden="true"></i>List</a></li>
						<li><a href="<?php echo Url::toRoute(['certified-qualification/update']);?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></i>Update</a></li>
                        
                    </ul>
                </li>
				<?php /*urls for punishments*/?>
				<li class="treeview">
                    <a href="#"><i class="fa fa-phone-square" aria-hidden="true"></i><span>Contacts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
					
                    <ul class="treeview-menu">
                        <li><a href="<?php echo Url::toRoute(['contact/create']);?>"><i class="fa fa-plus-circle" aria-hidden="true"></i></i>Create</a></li>
                        <li><a href="<?php echo Url::toRoute(['contact/index']);?>"><i class="fa fa-th-list" aria-hidden="true"></i>List</a></li>
						<li><a href="<?php echo Url::toRoute(['contact/update']);?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></i>Update</a></li>
                        
                    </ul>
                </li>
				<?php /*urls for punishments*/?>
				<li class="treeview">
                    <a href="#"><i class="fa fa-gift" aria-hidden="true"></i><span>Donations</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
					
                    <ul class="treeview-menu">
                        <li><a href="<?php echo Url::toRoute(['donation/create']);?>"><i class="fa fa-plus-circle" aria-hidden="true"></i></i>Create</a></li>
                        <li><a href="<?php echo Url::toRoute(['donation/index']);?>"><i class="fa fa-th-list" aria-hidden="true"></i>List</a></li>
						<li><a href="<?php echo Url::toRoute(['donation/update']);?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></i>Update</a></li>
                        
                    </ul>
                </li>
				<?php /*urls for punishments*/?>
				<li class="treeview">
                    <a href="#"><i class="fa fa-language" aria-hidden="true"></i><span>Foreign Languages</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
					
                    <ul class="treeview-menu">
                        <li><a href="<?php echo Url::toRoute(['foreign-language/create']);?>"><i class="fa fa-plus-circle" aria-hidden="true"></i></i>Create</a></li>
                        <li><a href="<?php echo Url::toRoute(['foreign-language/index']);?>"><i class="fa fa-th-list" aria-hidden="true"></i>List</a></li>
						<li><a href="<?php echo Url::toRoute(['foreign-language/update']);?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></i>Update</a></li>
                        
                    </ul>
                </li>
				<?php /*urls for punishments*/?>
				<li class="treeview">
                    <a href="#"><i class="fa fa-briefcase" aria-hidden="true"></i><span>General Career Record</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
					
                    <ul class="treeview-menu">
                        <li><a href="<?php echo Url::toRoute(['general-career-record/create']);?>"><i class="fa fa-plus-circle" aria-hidden="true"></i></i>Create</a></li>
                        <li><a href="<?php echo Url::toRoute(['general-career-record/index']);?>"><i class="fa fa-th-list" aria-hidden="true"></i>List</a></li>
						<li><a href="<?php echo Url::toRoute(['general-career-record/update']);?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></i>Update</a></li>
                        
                    </ul>
                </li>
				<?php /*urls for punishments*/?>
				<li class="treeview">
                    <a href="#"><i class="fa fa-graduation-cap" aria-hidden="true"></i><span>Qualifications</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
					
                    <ul class="treeview-menu">
                        <li><a href="<?php echo Url::toRoute(['qualification/create']);?>"><i class="fa fa-plus-circle" aria-hidden="true"></i></i>Create</a></li>
                        <li><a href="<?php echo Url::toRoute(['donation/index']);?>"><i class="fa fa-th-list" aria-hidden="true"></i>List</a></li>
						<li><a href="<?php echo Url::toRoute(['donation/update']);?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></i>Update</a></li>
                        
                    </ul>
                </li>
				<?php /*urls for punishments*/?>
				<li class="treeview">
                    <a href="#"><i class="fa fa-users" aria-hidden="true"></i><span>Generations</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
					
                    <ul class="treeview-menu">
                        <li><a href="<?php echo Url::toRoute(['generation/create']);?>"><i class="fa fa-plus-circle" aria-hidden="true"></i></i>Create</a></li>
                        <li><a href="<?php echo Url::toRoute(['generation/index']);?>"><i class="fa fa-th-list" aria-hidden="true"></i>List</a></li>
						<li><a href="<?php echo Url::toRoute(['generation/update']);?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></i>Update</a></li>
                        
                    </ul>
                </li>
				<?php /*urls for punishments*/?>
				<li class="treeview">
                    <a href="#"><i class="fa fa-link" aria-hidden="true"></i><span>Relationships</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
					
                    <ul class="treeview-menu">
                        <li><a href="<?php echo Url::toRoute(['relationship/create']);?>"><i class="fa fa-plus-circle" aria-hidden="true"></i></i>Create</a></li>
                        <li><a href="<?php echo Url::toRoute(['relationship/index']);?>"><i class="fa fa-th-list" aria-hidden="true"></i>List</a></li>
						<li><a href="<?php echo Url::toRoute(['relationship/update']);?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></i>Update</a></li>
                        
                    </ul>
                </li>
				<?php /*urls for punishments*/?>
				<li class="treeview">
                    <a href="#"><i class="fa fa-heart" aria-hidden="true"></i><span>Religions</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
					
                    <ul class="treeview-menu">
                        <li><a href="<?php echo Url::toRoute(['religion/create']);?>"><i class="fa fa-plus-circle" aria-hidden="true"></i></i>Create</a></li>
                        <li><a href="<?php echo Url::toRoute(['religion/index']);?>"><i class="fa fa-th-list" aria-hidden="true"></i>List</a></li>
						<li><a href="<?php echo Url::toRoute(['religion/update']);?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></i>Update</a></li>
                        
                    </ul>
                </li>
				<?php /*urls for punishments*/?>
				<li class="treeview">
                    <a href="#"><i class="fa fa-briefcase" aria-hidden="true"></i><span>Unification Career Record</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
					
                    <ul class="treeview-menu">
                        <li><a href="<?php echo Url::toRoute(['unification-career-record/create']);?>"><i class="fa fa-plus-circle" aria-hidden="true"></i></i>Create</a></li>
                        <li><a href="<?php echo Url::toRoute(['unification-career-record/index']);?>"><i class="fa fa-th-list" aria-hidden="true"></i>List</a></li>
						<li><a href="<?php echo Url::toRoute(['unification-career-record/update']);?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></i>Update</a></li>
                        
                    </ul>
                </li>
				<?php /*urls for punishments*/?>
				<li class="treeview">
                    <a href="#"><i class="fa fa-medkit" aria-hidden="true"></i><span>Chronic Diseases</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
					
                    <ul class="treeview-menu">
                        <li><a href="<?php echo Url::toRoute(['chronic-disease/create']);?>"><i class="fa fa-plus-circle" aria-hidden="true"></i></i>Create</a></li>
                        <li><a href="<?php echo Url::toRoute(['chronic-disease/index']);?>"><i class="fa fa-th-list" aria-hidden="true"></i>List</a></li>
						<li><a href="<?php echo Url::toRoute(['chronic-disease/update']);?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></i>Update</a></li>
                        
                    </ul>
                </li>
				
            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?= Html::encode($this->title) ?>
                <small>Optional description</small>
            </h1>

            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>

        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Page Content Starts Here Here -->

            <?= $content ?>

            <!-- Page Content Ends Here-->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; <?=date('Y') ?> <a href="#">FFWPU East Africa </a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane active" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript::;">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript::;">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                <span class="pull-right-container">
                  <span class="label label-danger pull-right">70%</span>
                </span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
