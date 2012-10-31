<?php

class ImageHelper
{
	/**
	 * @var string full path to identify binary.
	 */
	public static $identify = 'identify';

	/**
	 * @param string $imagePath
	 * @return array|bool if image is valid: array(width, height), false otherwise
	 * @throws Exception
	 */
	public static function checkImageCorrect($imagePath)
	{
		$cmd = self::$identify . " -format \"%w|%h|%k\" ".escapeshellarg($imagePath)." 2>&1";
		$returnVal = 0;
		$output = array();
		exec($cmd, $output, $returnVal);
		if ($returnVal == 0 && count($output) == 1) {
			$imageSizes = explode('|', $output[0]);
			array_pop($imageSizes);
			return $imageSizes;
		} elseif ($returnVal == 127) {
			throw new Exception('Can\'t find identify');
		} else {
			return false;
		}
	}
}
