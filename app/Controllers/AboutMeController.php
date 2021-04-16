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

    public function getById(int $id)
    {
        $result = $this->aboutMeServices->getById($id);
        $this->options();
        return $this->respond($result);
    }

    private function options(): Response
    {
        return $this->response->setHeader('Access-Control-Allow-Origin', '*') //for allow any domain, insecure
            ->setHeader('Access-Control-Allow-Headers', '*') //for allow any headers, insecure
            ->setHeader('Access-Control-Allow-Methods', 'GET') //method allowed
            ->setStatusCode(200); //status code
    }
}
