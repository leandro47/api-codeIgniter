<?php

namespace App\Repositories;

use App\Models\SkillModel;

class SkillRepository
{
    protected $skill;

    public function __construct()
    {
        $this->skill = new SkillModel;
    }

    public function get()
    {
        return $this->skill->get()->getResult();
    }
}
