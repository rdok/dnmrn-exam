<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace Database\migrations;


interface Migration
{
	public function up();

	public function down();

	public function getTableNameVessels();
}