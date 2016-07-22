<?php
/**
 * Created by PhpStorm.
 * User: Philip
 * Date: 7/21/2016
 * Time: 5:03 PM
 */

namespace backend\assets;
use yii\web\AssetBundle;

class ICheckAsset extends AssetBundle
{
    public $sourcePath = '@bower/adminlte/plugins/iCheck';
    public $css = [
        'square/blue.css',
    ];

    public $js = [
      'icheck.min.js',
    ];

}