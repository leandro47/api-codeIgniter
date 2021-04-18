<?php

namespace App\Services;

use CodeIgniter\HTTP\Response;
use App\Repositories\ExperienceRepository;

class ExperienceService
{
    private $experienceRepository;

    public function __construct()
    {
        $this->experienceRepository = new ExperienceRepository();
    }

    public function get(): array
    {
        $result = $this->experienceRepository->get();

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
