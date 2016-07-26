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
    public $sourcePath = '@bower/adminlte/dist';
    public $css = [
        'css/AdminLTE.min.css',
        'css/skins/skin-blue.min.css',
    ];
    public $js = [
        'js/app.min.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'backend\assets\FontAwesomeAsset',
        'backend\assets\IonIconsAsset'
    ];

}