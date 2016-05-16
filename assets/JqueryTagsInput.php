<?php

namespace faryshta\assets;

use yii\web\AssetBundle;

/**
 * @author Angel Guevara <angeldelcaos@gmail.com>
 */
class JqueryTagsInput extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@bower/jquery.tagsinput';

    /**
     * @inheritdoc
     */
    public $js = ['jquery.tagsinput.js'];

    /**
     * @inheritdoc
     */
    public $css = ['jquery.tagsinput.css'];

    /**
     * @inheritdoc
     */
    public $depends = ['yii\web\JqueryAsset'];
}
