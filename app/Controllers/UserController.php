<?php

namespace App\Controllers;

use App\Services\UserService;
use CodeIgniter\RESTful\ResourceController;
use Config\Services;

class UserController extends ResourceController
{
    private $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function auth()
    {
        Services::options();
        return $this->respond($this->userService->auth($this->request));
    }
}
