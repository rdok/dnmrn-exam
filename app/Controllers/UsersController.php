<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace App\Controllers;

use App\Models\Repositories\Users\MySqlDbUsersRepository;

class UsersController extends BaseController
{
	protected $usersRepository;

	public function __construct()
	{
		parent::__construct();

		$this->usersRepository = new MySqlDbUsersRepository();
	}

	public function index()
	{
		$users = $this->usersRepository->getAll();

		$this->twig->display('users/index.twig', compact('users'));
	}

}