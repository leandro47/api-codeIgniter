<?php

namespace App\Controllers;

class ResumeController extends BaseController
{
    public function getResume()
    {
    
        return $this->response->download('assets/docs/resume.docx', null)->setFileName('curriculo.docx');
    }
}
