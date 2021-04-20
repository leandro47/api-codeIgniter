<?php

namespace App\Repositories;

use App\Models\UserModel;

class UserRepository
{
    protected $user;

    public function __construct()
    {
        $this->user = new UserModel();
    }

    public function get(String $user)
    {
        return $this->user->where(['USER' => $user])->get()->getRow();
    }
}
