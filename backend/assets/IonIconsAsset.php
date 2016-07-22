<?php
/**
 * Created by PhpStorm.
 * User: Philip
 * Date: 7/22/2016
 * Time: 3:43 PM
 */

namespace backend\assets;
use yii\web\AssetBundle;


class IonIconsAsset extends  AssetBundle
{
    public $sourcePath = '@bower/ionicons';
    public $css = [
        'css/ionicons.min.css',
    ];
/*
    public $publishOptions = [
        'only' => [
            'fonts/',
            'css/',
        ]
    ];
*/
}