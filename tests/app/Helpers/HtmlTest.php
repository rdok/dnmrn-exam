<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace Tests\app\Helpers;

use App\Helpers\Html;
use App\Kernel\App;
use Tests\BaseTest;

/**
 * Class HtmlTest
 * @package tests\app\Helpers
 */
class HtmlTest extends BaseTest
{
	/**
	 * @test
	 */
	public function it_renders_stylesheet()
	{
		$html = new Html();

		$url = App::getBaseURL() . "/asset.css";

		$this->expectOutputString("<link href='$url' rel='stylesheet' type='text/css' />");

		$html->stylesheet('asset.css');
	}
}