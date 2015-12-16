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
$mux->get($baseUrl . "vessels", ['App\Controllers\VesselsController', 'index']);

$route = $mux->dispatch($_SERVER['REQUEST_URI']);

echo \Pux\Executor::execute($route);