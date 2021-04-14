<?php

namespace App\Services;

use CodeIgniter\HTTP\Response;
use App\Repositories\AboutMeRepository;

class AboutMeService
{
    private $aboutMeRepository;

    public function __construct()
    {
        $this->aboutMeRepository = new AboutMeRepository();
    }

    public function getById(int $id)
    {
        $result = $this->aboutMeRepository->get($id);

        if ($result) {
            return [
                'code' => Response::HTTP_OK,
                'message' => 'OK',
                'data' => $result
            ];
        }

        return [
            'code'    => Response::HTTP_NO_CONTENT,
            'message' => 'No content',
            'data'    => $result
        ];
    }
}
