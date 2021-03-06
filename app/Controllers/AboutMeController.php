<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Services\AboutMeService;
class AboutMeController extends ResourceController
{
    private $aboutMeServices;

    public function __construct()
    {
        $this->aboutMeServices = new AboutMeService();
    }

    public function welcome()
    {
        return view('welcome_message');
    }

    public function getById(int $id)
    {
        $result = $this->aboutMeServices->getById($id);
        return $this->respond($result);
    }
}
