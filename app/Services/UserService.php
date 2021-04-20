<?php

namespace App\Services;

use CodeIgniter\HTTP\Response;
use App\Repositories\UserRepository;
use CodeIgniter\HTTP\IncomingRequest;
use Config\Services;

class UserService
{
    private $userRepository;
    private static $KEY = 'c1isvFdDMDdmjsdlvsddfxpecFw';
    private static $notAuthorized = [
        'code'    => Response::HTTP_UNAUTHORIZED,
        'message' => 'not authorized',
        'data'    => []
    ];

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function auth(IncomingRequest $request): array
    {
        $user = isset($request->getJSON()->user) ? $request->getJSON()->user : null;
        $pwdPlainText = isset($request->getJSON()->pwd) ? $request->getJSON()->pwd : null;

        if (is_null($user) || is_null($pwdPlainText)) {
            return self::$notAuthorized;
        }

        $userObj = $this->userRepository->get($user);

        if (is_null($userObj)) {
            return self::$notAuthorized;
        }

        $hashVerify = self::verifyHash($userObj->PASSWORD, $pwdPlainText);

        if (!$hashVerify) {
            return self::$notAuthorized;
        }

        return [
            'code' => Response::HTTP_OK,
            'message' => 'token generated',
            'data' => Services::generateToken($userObj->USER)
        ];
    }

    private static function verifyHash(string $pwd, string $plainTextPwd): bool
    {
        $pwd_peppered = hash_hmac("sha256", $plainTextPwd, self::$KEY);

        return password_verify($pwd_peppered, $pwd);
    }
}
