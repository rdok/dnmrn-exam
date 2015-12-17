<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace App\Helpers;

use App\Kernel\App;

/**
 * Class Html
 * @package App\Helpers
 */
class Html
{

	/**
	 * @param $url
	 * @return string
	 */
	public static function url($url)
	{
		return App::getBaseURL() . "/{$url}";
	}

	/**
	 * @param $url
	 * @param string $rel
	 * @param string $type
	 */
	public function stylesheet($url, $rel = 'stylesheet', $type = 'text/css')
	{
		echo "<link href='" . App::getBaseURL() . "/$url' rel='$rel' type='$type' />";
	}

	/**
	 * @param $src
	 */
	public function script($src)
	{
		echo "<script src='" . App::getBaseURL() . "/$src'></script>";
	}

	/**
	 * @param array $urls
	 * @param string $active
	 * @param bool $strict
	 * @return string
	 */
	public function activate(array $urls, $active = 'active', $strict = false)
	{
		$requestUri = $_SERVER['REQUEST_URI'];

		foreach ($urls as $url)
		{
			if ( $strict )
			{
				if ( $url === $requestUri ) return $active;
			} else
			{
				if ( $this->startsWith($requestUri, $url) ) return $active;
			}
		}

		return '';
	}

	private function startsWith($haystack, $needle)
	{
		$length = strlen($needle);

		return (substr($haystack, 0, $length) === $needle);
	}
}