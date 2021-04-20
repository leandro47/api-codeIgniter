<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use Config\Services;

class ApiFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (Services::checkAuth($request)) {
            Services::options();
        } else {
            return Services::response()
                ->setStatusCode(403)
                ->setJSON([
                    'code'    => 403,
                    'message' => 'Access denied! You must have a authorization key valid.'
                ]);
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
