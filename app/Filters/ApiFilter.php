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
        if (!Services::checkAuth($request)) {
            return Services::response()
            ->setStatusCode(403)
            ->setJSON(['code' => 403, 'message' => 'Access denied! You must have a authorization key valid.']);
        }

        Services::options();
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
