<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Services\SkillService;

class SkillController extends ResourceController
{
    private $skillService;

    public function __construct()
    {
        $this->skillService = new SkillService();
    }

    public function get()
    {
        $result = $this->skillService->get();
        return $this->respond($result);
    }
}
