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
	private static $credentials;


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

	public static function getDbHost()
	{
		return self::getEnvironmentVariable('DB_HOST');
	}

	private static function getEnvironmentVariable($varName)
	{
		if ( ! isset (self::$credentials[ $varName ]) ) self::$credentials[ $varName ] = getenv($varName);

		return self::$credentials[ $varName ];
	}

	public static function getDbName()
	{
		return self::getEnvironmentVariable('DB_NAME');
	}

	public static function getDbPort()
	{
		return self::getEnvironmentVariable('DB_PORT');
	}

	public static function getDbUsername()
	{
		return self::getEnvironmentVariable('DB_USERNAME');
	}

	public static function getDbPassword()
	{
		return self::getEnvironmentVariable('DB_PASSWORD');
	}

	public static function getPDOErrorMode()
	{
		return self::getEnvironmentVariable('PDO_ERROR_MODE');
	}
}