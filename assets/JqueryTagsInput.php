<?php

namespace faryshta\assets;

use yii\web\AssetBundle;

/**
 * @author Angel Guevara <angeldelcaos@gmail.com>
 */
class JqueryTagsInput extends AssetBundle
{
    public $sourcePath = '@bower/jquery.tagsinput';
    public $js = ['jquery.tagsinput.js'];
    public $css = ['jquery.tagsinput.css'];
    public $depends = ['yii\web\JqueryAsset'];
}
