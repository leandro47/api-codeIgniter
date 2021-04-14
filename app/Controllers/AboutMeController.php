<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\Response;
use App\Services\AboutMeService;

class AboutMeController extends ResourceController
{
	private $aboutMeServices;

	public function __construct()
	{
		$this->aboutMeServices = new AboutMeService;
	}

	public function welcome()
	{
		return view('welcome_message');
	}

	public function getById()
	{
		$result = $this->aboutMeServices->getById(1);
		return $this->respond($result);	
	}
}
