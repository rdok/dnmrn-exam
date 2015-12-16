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

	public function stylesheet($url, $rel = 'stylesheet', $type = 'text/css')
	{
		echo "<link href='" . App::getBaseURL() . "/$url' rel='$rel' type='$type' />";
	}

	public function script($src)
	{
		echo "<script src='" . App::getBaseURL() . "/$src'></script>";
	}
}