<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace Tests;

use App\Kernel\App;

abstract class BaseTest extends \PHPUnit_Framework_TestCase
{

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