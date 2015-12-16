<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace Tests\app\Kernel;

use App\Kernel\App;

class AppTest extends \PHPUnit_Framework_TestCase
{

	protected $serverName;

	/**
	 * @test
	 */
	public function it_returns_base_url_without_ssl()
	{
		$_SERVER['HTTPS'] = 'off';

		$this->assertEquals('http://' . $_SERVER['SERVER_NAME'], App::getBaseURL());
	}

	/**
	 * @test
	 */
	public function it_returns_base_url_with_ssl()
	{
		$_SERVER['HTTPS'] = 'on';

		$this->assertEquals('https://' . $_SERVER['SERVER_NAME'], App::getBaseURL());
	}


	/**
	 * @test
	 */
	public function it_returns_true_when_ssl_enabled()
	{
		$_SERVER['HTTPS'] = 'on';

		$this->assertTrue(App::isSslEnabled());
	}

	protected function setUp()
	{
		$_SERVER['REQUEST_URI'] = 'random-uri';

		$_SERVER['SERVER_NAME'] = 'random-server-name';
	}

	protected function tearDown()
	{
		unset($_SERVER['REQUEST_URI']);

		unset($_SERVER['SERVER_NAME']);

		App::setBaseUrl(null);
	}
}