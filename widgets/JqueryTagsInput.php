<?php

namespace faryshta\widgets;

use yii\helpers\Html;
use yii\helpers\Json;
use yii\base\InvalidConfigException;
use yii\widgets\InputWidget;
use faryshta\assets\JqueryTagsInput as JqueryTagsAsset;

/**
 * Renders a jQuery Tags Input widget.
 *
 * For example to use the widget with a  model:
 *
 * ````php
 * echo JqueryTagsInput::widget([
 *     'name'  => 'tags',
 *     'value'  => 'hello,world',
 *     'clientOptions' => [
 *         'defaultText' => 'custom placeholder',
 *     ],
 * ]);
 * ```
 *
 * You can also use this widget in an `ActiveForm` using the
 * `ActiveField::widget()`method, for example like this:
 *
 * ```php
 * <?= $form->field($model, 'tags')->widget(JqueryTagsInput::classname(), [
 *     'clientOptions' => [
 *         'defaultText' => 'custom placeholder',
 *     ],
 * ]) ?>
 * ```
 *
 * @author Angel (Faryshta) Guevara <angeldelcaos@gmail.com>
 */
class JqueryTagsInput extends InputWidget
{
    /**
     * @var array the HTML attributes for the widget container tag.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $options = ['class' => 'form-control'];

    /**
     * @var array options to be passed to he js plugin.
     * @see https://github.com/xoxco/jQuery-Tags-Input#options
     */
    public $clientOptions = [];

    /**
     * @var array the event handlers for the underlying jquery plugin.
     * @see https://github.com/xoxco/jQuery-Tags-Input#options
     */
    public $clientEvents = [];

    /**
     * @inheritdoc
     */
    public function init()
    {
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->hasModel()
                ? Html::getInputId($this->model, $this->attribute)
                : $this->getId();
        }
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        echo $this->hasModel()
            ? Html::activeTextInput(
                    $this->model,
                    $this->attribute,
                    $this->options
                )
            : Html::textInput($this->name, $this->value, $this->options);

        $this->registerScript();
        $this->registerEvent();
    }

    /**
     * Register the js scripts including the required assets and the options in
     * `$clientOptions`
     */
    protected function registerScript()
    {
        $view = $this->getView();
        if (isset($this->clientOptions['autocomplete_url'])) {
            if (class_exists('yii\jui\AutoComplete')) {
                \yii\jui\AutoComplete::register($view);
            } else {
                throw new InvalidConfigException(
                    'To use autocomplete functionality you need to install the '
                    . ' JUI Extension for Yii 2. '
                    . 'http://www.yiiframework.com/doc-2.0/ext-jui-index.html'
                );
            }
        }
        $clientOptions = empty($this->clientOptions)
            ? ''
            : Json::encode($this->clientOptions);

        JqueryTagsAsset::register($view);
        $view->registerJs(
            "jQuery('#{$this->options["id"]}').tagsInput({$clientOptions});"
        );
    }

    /**
     * Register the events in `$clientEvents`
     */
    protected function registerEvent()
    {
        if (empty($this->clientEvents)) {
            return;
        }
        $js = '';
        foreach ($this->clientEvents as $event => $handle) {
            $js .= "jQuery('#{$this->options["id"]}').on('$event',$handle);";
        }
        $this->getView()->registerJs($js);
    }
}
