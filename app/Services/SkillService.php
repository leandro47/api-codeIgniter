<?php

namespace App\Services;

use CodeIgniter\HTTP\Response;
use App\Repositories\SkillRepository;

class SkillService
{
    private $skillRepository;

    public function __construct()
    {
        $this->skillRepository = new SkillRepository();
    }

    public function get(): array
    {
        $result = $this->skillRepository->get();

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
