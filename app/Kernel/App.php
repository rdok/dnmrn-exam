<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace App\Kernel;

/**
 * Class App
 * @package app\Kernel
 */
class App
{

	/**
	 * @var
	 */
	private static $baseUrl;

	/**
	 * @return mixed
	 */
	public static function getBaseURL()
	{
		if ( ! isset(self::$baseUrl) )
		{
			$protocol = self::isSslEnabled() ? 'https' : 'http';

			$requestUri = getenv('BASE_URL') === '/' ? '' : getenv('BASE_URL');

			self::setBaseUrl("$protocol://" . $_SERVER['SERVER_NAME'] . $requestUri);
		}

		return self::$baseUrl;
	}

	/**
	 * @param mixed $baseUrl
	 */
	public static function setBaseUrl($baseUrl)
	{
		self::$baseUrl = $baseUrl;
	}

	public static function isSslEnabled()
	{
		return isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off';
	}
}