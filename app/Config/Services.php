<?php

namespace Config;

use CodeIgniter\Config\BaseService as CoreServices;
use CodeIgniter\HTTP\IncomingRequest;
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
    private static $key = 'c1isvFdDMDdmjsdlvsddfxpecFw';

    public static function options(): Response
    {
        return Services::response()
            ->setHeader('Access-Control-Allow-Origin', '*') //for allow any domain, insecure
            ->setHeader('Access-Control-Allow-Headers', '*') //for allow any headers, insecure
            // ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE') //method allowed
            ->setHeader('Access-Control-Allow-Methods', '*') //method allowed
            ->setStatusCode(200); //status code
    }

    public static function generateToken(String $user)
    {
        $header = [
            'typ' => 'JWT',
            'alg' => 'HS256'
        ];

        //Payload - Content
        $payload = [
            'name' => $user
        ];

        //JSON
        $header = json_encode($header);
        $payload = json_encode($payload);

        //Base 64
        $header = self::base64UrlEncode($header);
        $payload = self::base64UrlEncode($payload);

        //Sign
        $sign = hash_hmac('sha256', $header . "." . $payload, self::$key, true);
        $sign = self::base64UrlEncode($sign);

        //Token
        return $header . '.' . $payload . '.' . $sign;
    }

    public static function checkAuth(IncomingRequest $request): bool
    {
        if (!is_null($request->getHeader('Authorization'))) {
            $header = explode(' ', $request->getHeader('Authorization'));
            $token = explode('.', $header[2]);

            $tokenHeader = $token[0];
            $payloadHeader = $token[1];
            $singHeader = $token[2];

            $valid = hash_hmac('sha256', $tokenHeader . "." . $payloadHeader, self::$key, true);
            $valid = self::base64UrlEncode($valid);

            return ($singHeader === $valid);
        }
        return false;
    }

    private static function base64UrlEncode($data)
    {
        // First of all you should encode $data to Base64 string
        $b64 = base64_encode($data);

        // Convert Base64 to Base64URL by replacing “+” with “-” and “/” with “_”
        $url = strtr($b64, '+/', '-_');

        // Remove padding character from the end of line and return the Base64URL result
        return rtrim($url, '=');
    }
}
