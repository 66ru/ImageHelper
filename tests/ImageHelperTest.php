<?php

require_once __DIR__.'/../ImageHelper.php';

class ImageHelperTest extends PHPUnit_Framework_TestCase
{
	public function testImages()
	{
		$res = ImageHelper::checkImageCorrect(__DIR__.'/fixtures/valid.jpg');
		$this->assertTrue(is_array($res) && count($res) == 2 && $res[0] == 525 && $res[1] == 719,
			'failed asserting returned value from valid picture');

		$this->assertFalse(ImageHelper::checkImageCorrect(__DIR__.'/fixtures/header-cutted.jpg'));

		// next images must be detected as broken, but I don't know how =)
//		$this->assertFalse(ImageHelper::checkImageCorrect(__DIR__.'/fixtures/center-cutted.jpg'));
//		$this->assertFalse(ImageHelper::checkImageCorrect(__DIR__.'/fixtures/tail-cutted.jpg'));
	}
}
