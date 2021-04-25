<?php

namespace App\Controllers;

class ResumeController extends BaseController
{
    public function getResume()
    {
        return $this->response->download('assets/docs/resume.pdf', null)->setFileName('curriculo.pdf');
    }
}
