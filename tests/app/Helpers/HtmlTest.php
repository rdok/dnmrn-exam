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

	/** @test */
	public function it_renders_stylesheet()
	{
		$html = new Html();

		$url = App::getBaseURL() . "/asset.css";

		$this->expectOutputString("<link href='$url' rel='stylesheet' type='text/css' />");

		$html->stylesheet('asset.css');
	}

	/** @test */
	public function it_renders_script()
	{
		$html = new Html();

		$url = App::getBaseURL() . "/script.js";

		$this->expectOutputString("<script src='$url'></script>");

		$html->script('script.js');
	}

	/** @test */
	public function it_returns_absolute_url()
	{
		$html = new Html();

		$this->assertSame(App::getBaseURL() . "/random-url", $html->url("random-url"));
	}

	/** @test */
	public function it_sets_active_classes()
	{
		$html = new Html();
		$expected = 'custom-active';
		$randomUrl = '/random-url?pg=2';

		$_SERVER['REQUEST_URI'] = $randomUrl;

		$actual = $html->activate(['/random-url'], $expected);

		$this->assertEquals($expected, $actual);
	}
}