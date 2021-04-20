<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Services\ExperienceService;
class ExperienceController extends ResourceController
{
    private $experienceService;

    public function __construct()
    {
        $this->experienceService = new ExperienceService();
    }

    public function get()
    {
        $result = $this->experienceService->get();
        return $this->respond($result);
    }
}
