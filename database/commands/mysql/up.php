<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

require __DIR__ . '/../../../vendor/autoload.php';


$dotenv = new Dotenv\Dotenv(__DIR__ . '/../../..');
$dotenv->load();
$dotenv->required(['DB_HOST', 'DB_NAME', 'DB_USERNAME', 'DB_PASSWORD', 'DB_PORT'])->notEmpty();

$database = new \Database\migrations\mysql\SetUpMySqlDb();

$database->up();
