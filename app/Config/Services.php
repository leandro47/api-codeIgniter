<?php

namespace Config;

use CodeIgniter\Config\BaseService as CoreServices;
use CodeIgniter\HTTP\Response;


/**
 * Services Configuration file.
 *
 * Services are simply other classes/libraries that the system uses
 * to do its job. This is used by CodeIgniter to allow the core of the
 * framework to be swapped out easily without affecting the usage within
 * the rest of your application.
 *
 * This file holds any application-specific services, or service overrides
 * that you might need. An example has been included with the general
 * method format you should use for your service methods. For more examples,
 * see the core Services file at system/Config/Services.php.
 */
class Services extends CoreServices
{
    // public static function example($getShared = true)
    // {
    //     if ($getShared)
    //     {
    //         return static::getSharedInstance('example');
    //     }
    //
    //     return new \CodeIgniter\Example();
    // }

    public static function options(): Response
    {
        return Services::response()
            ->setHeader('Access-Control-Allow-Origin', '*') //for allow any domain, insecure
            ->setHeader('Access-Control-Allow-Headers', '*') //for allow any headers, insecure
            ->setHeader('Access-Control-Allow-Methods', 'GET') //method allowed
            ->setStatusCode(200); //status code
    }
}
