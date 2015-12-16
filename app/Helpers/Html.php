<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace App\Helpers;

/**
 * Class Html
 * @package App\Helpers
 */
class Html
{

	public function stylesheet($url, $rel = 'stylesheet', $type = 'text/css')
	{
		echo "<link href='" . getenv('BASE_URL') . "$url' rel='$rel' type='$type' />";
	}
}