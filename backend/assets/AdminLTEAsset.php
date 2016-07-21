<?php
/**
 * Created by PhpStorm.
 * User: Philip
 * Date: 7/21/2016
 * Time: 4:07 PM
 */

namespace backend\assets;
use yii\web\AssetBundle;


class AdminLTEAsset extends  AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/dist';
    public $css = [
        'css/AdminLTE.min.css',
        'css/skin-blue.min.css',
    ];
    public $j = [
        'js/app.min.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}