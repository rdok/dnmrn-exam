<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace Tests\app\Helpers;
use App\Helpers\Html;

/**
 * Class HtmlTest
 * @package tests\app\Helpers
 */
class HtmlTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @test
	 */
	public function it_renders_stylesheet()
	{
		$html = new Html();

		$url = getenv('BASE_URL') . "/asset.css";

		$this->expectOutputString("<link href='$url' rel='stylesheet' type='text/css' />");

		$html->stylesheet('asset.cs');
	}
}