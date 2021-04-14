<?php

namespace App\Repositories;

use App\Models\AboutMeModel;
use Exception;

class AboutMeRepository
{
    protected $aboutMe;

    public function __construct()
    {
        $this->aboutMe = new AboutMeModel();
    }

    public function get(int $id)
    { 
        return $this->aboutMe->where(['ID' => $id])->get()->getRow();
    }
}
