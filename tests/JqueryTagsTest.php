<?php
namespace faryshta\tests;

use faryshta\widgets\JqueryTagsInput;
/**
 * Test the functionality for the enum extension
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
}
