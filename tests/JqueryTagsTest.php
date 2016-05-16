<?php
namespace faryshta\tests;

use faryshta\widgets\JqueryTagsInput;
use yii\base\InvalidConfigException;

/**
 * Test the functionality for the jQuery tags input plugin
 */
class JqueryTagsTest extends TestCase
{
    public function testTags()
    {
        $expected = <<<'HTML'
<input type="text" id="w0" class="form-control" name="tags" value="yii2,jquery">
HTML;

        $this->assertEquals($expected, JqueryTagsInput::widget([
            'name' => 'tags',
            'value' => 'yii2,jquery',
        ]));
    }

    public function testAutocompleteException()
    {
        try {
            JqueryTagsInput::widget([
                'name' => 'tags',
                'value' => 'yii2,jquery',
                'clientOptions' => ['autocomplete_url' => ''],
            ]);
            $this->fail('Expected exception was not thrown');
        } catch (InvalidConfigException $e) {
            $this->assertNotEmpty($e->getMessage());
        }
    }
}
