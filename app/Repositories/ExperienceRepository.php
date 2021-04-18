<?php

namespace App\Repositories;

use App\Models\ExperienceModel;

class ExperienceRepository
{
    protected $experience;

    public function __construct()
    {
        $this->experience = new ExperienceModel();
    }

    public function get()
    { 
        return $this->experience->get()->getResult();
    }
}
