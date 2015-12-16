<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace Tests\app\Kernel;

use App\Kernel\App;
use Tests\BaseTest;

class AppTest extends BaseTest
{

	protected $serverName;

	/**
	 * @test
	 */
	public function it_returns_base_url_without_ssl()
	{
		$_SERVER['HTTPS'] = 'off';

		$this->assertSame('http://' . $_SERVER['SERVER_NAME'], App::getBaseURL());
	}

	/**
	 * @test
	 */
	public function it_returns_base_url_with_ssl()
	{
		$_SERVER['HTTPS'] = 'on';

		$this->assertSame('https://' . $_SERVER['SERVER_NAME'], App::getBaseURL());
	}


	/**
	 * @test
	 */
	public function it_returns_true_when_ssl_enabled()
	{
		$_SERVER['HTTPS'] = 'on';

		$this->assertTrue(App::isSslEnabled());
	}

	/**
	 * @test
	 */
	public function it_returns_db_host()
	{
		$randomDbHost = "random-db-host";

		putenv("DB_HOST={$randomDbHost}");

		$this->assertSame($randomDbHost, App::getDbHost());
	}

	/**
	 * @test
	 */
	public function it_returns_db_name()
	{
		$randomDbName = "random-db-name";

		putenv("DB_NAME={$randomDbName}");

		$this->assertSame($randomDbName, App::getDbName());
	}

	/**
	 * @test
	 */
	public function it_returns_db_port()
	{
		$randomDbPort = "random-db-port";

		putenv("DB_PORT={$randomDbPort}");

		$this->assertSame($randomDbPort, App::getDbPort());
	}

	/**
	 * @test
	 */
	public function it_returns_db_username()
	{
		$randomDbUsername = "random-db-username";

		putenv("DB_USERNAME={$randomDbUsername}");

		$this->assertSame($randomDbUsername, App::getDbUsername());
	}

	/**
	 * @test
	 */
	public function it_returns_db_password()
	{
		$randomDbPassword = "random-db-password";

		putenv("DB_PASSWORD={$randomDbPassword}");

		$this->assertSame($randomDbPassword, App::getDbPassword());
	}

	/**
	 * @test
	 */
	public function it_returns_db_error_mode()
	{
		$randomDbErrorMode = "random-db-error-mode";

		putenv("PDO_ERROR_MODE={$randomDbErrorMode}");

		$this->assertSame($randomDbErrorMode, App::getPDOErrorMode());
	}

}