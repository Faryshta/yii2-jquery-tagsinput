Faryshta Yii2 jQuery Tags Input
=========================

[![Latest Stable Version](https://poser.pugx.org/faryshta/yii2-jquery-tagsinput/v/stable)](https://packagist.org/packages/faryshta/yii2-jquery-tagsinput) [![Total Downloads](https://poser.pugx.org/faryshta/yii2-jquery-tagsinput/downloads)](https://packagist.org/packages/faryshta/yii2-jquery-tagsinput) [![Latest Unstable Version](https://poser.pugx.org/faryshta/yii2-jquery-tagsinput/v/unstable)](https://packagist.org/packages/faryshta/yii2-jquery-tagsinputr) [![License](https://poser.pugx.org/faryshta/yii2-jquery-tagsinput/license)](https://packagist.org/packages/faryshta/yii2-jquery-tagsinput)

Yii2 widgets for [jQuery Tags Input](https://github.com/xoxco/jQuery-Tags-Input)
(tag list) jquery plugin

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```bash
composer require --prefer-dist "faryshta/yii2-jquery-tagsinput:*"
```

or add

```
"faryshta/yii2-jquery-tagsinput": "*"
```

to the `require` section of your `composer.json` file.

## Usage

```php
use farystha\widgets\JqueryTagsInput;

// with ActiveForm
echo $form->field($model, 'attribute')->widget(JqueryTagsInput::className() [
    // extra configuration
]);

// without ActiveForm and with model.
echo JqueryTagsInput::widget([
    'model' => $model,
    'attribute' => 'attribute',
    // extra configuration
]);
```

## Documentation

This library doesn't define anything new, the widgets classes are very similar
to the class [\\yii\\bootstrap\\Widget](http://www.yiiframework.com/doc-2.0/yii-bootstrap-widget.html) which can be used as documentation for the widget classes.

The JS options can be passed using the `$clientOptions` property and the events
can be declared using the `$clientEvents` property. [The documentation on all the
options and events supported by tagsInput can be found here.](http://xoxco.com/projects/code/tagsinput/)

## License

The BSD License (BSD). Please see [License File](LICENSE.md) for more information.
