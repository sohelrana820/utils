<?php

use Utils\SohelRana820\Text\Text;

class TextTests extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub
    }

    public function testHelloMethod()
    {
        $text = new Text();
        $this->assertTrue($text->hello() == 'hello world');
    }
}