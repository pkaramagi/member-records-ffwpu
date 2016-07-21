<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */
/*
 * inputTemplate overides default yii bootstrap activeformfield
 * */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login login-box">
    <!-- disable heading <h1><?= Html::encode($this->title) ?></h1> -->
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>FFWPU</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Please fill out the following fields to login:</p>

            <?php $form = ActiveForm::begin(['id' => 'login-form',]); ?>

            <?php /* {input} replaces <input />*/?>

            <?= $form->field($model, 'username',[
                   'inputTemplate' => '
                            <div class="form-group has-feedback">
                                {input}<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            </div>'
                ])->textInput(); ?>

            <?php /* {input} replaces <input />*/?>

            <?= $form->field($model, 'password',[
                    'inputTemplate'=> '
                            <div class="form-group has-feedback">
                                {input}<span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>'
                ])->passwordInput(); ?>

            <div class="row">
                <div class="col-xs-8">
                    <?php /* {input} replaces <input />*/?>

                    <?= $form->field($model, 'rememberMe',[
                        'inputTemplate'=> '
                        <div class="checkbox icheck">
                            <label> {input} Remember Me</label>
                         </div>
                    '
                    ])->checkbox()->label(false); ?>
                </div>

                <!-- /.col -->
                <div class="col-xs-4 form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
                </div>
                <!-- /.col -->
            </div>
            <?php ActiveForm::end(); ?>
            <!--
                    <div class="social-auth-links text-center">
                        <p>- OR -</p>
                        <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
                            Facebook</a>
                        <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
                            Google+</a>
                    </div>
                    <!-- /.social-auth-links -->

            <a href="#">I forgot my password</a><br>
            <!--   <a href="register.html" class="text-center">Register a new membership</a> -->

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

