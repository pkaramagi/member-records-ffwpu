<?php
/**
 * Created by PhpStorm.
 * User: Philip
 * Date: 7/21/2016
 * Time: 5:13 PM
 */

namespace backend\assets;
use yii\web\AssetBundle;

class LoginAsset extends AssetBundle
{
    public $depends = [
        'backend\assets\AdminLTEAsset',
        'backend\assets\ICheckAsset',
    ];

}