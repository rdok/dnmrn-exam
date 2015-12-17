<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */
require __DIR__ . '/../vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__ . '/..');
$dotenv->load();
$dotenv->required(['BASE_URL'])->notEmpty();

$baseUrl = getenv('BASE_URL');

$mux = new \Pux\Mux;

$mux->get($baseUrl, ['App\Controllers\HomeController', 'home']);
$mux->get($baseUrl . "vessels(?pg=:id)", ['App\Controllers\VesselsController', 'index']);
$mux->get($baseUrl . "vessels/types", ['App\Controllers\VesselsController', 'types']);
$mux->get($baseUrl . "companies", ['App\Controllers\CompaniesController', 'index']);
$mux->get($baseUrl . "users", ['App\Controllers\UsersController', 'index']);

$route = $mux->dispatch($_SERVER['REQUEST_URI']);

echo \Pux\Executor::execute($route);