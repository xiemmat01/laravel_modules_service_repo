<?php

namespace App\Modules\User\Services;

use App\Models\User;
use App\Modules\User\Repositories\UserRepository;
use Illuminate\Http\Request;

class CreateUserService
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create(Request $request)
    {
        $user = [
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->password,
            "phone" => $request->phone,
            "level" => $request->level,
        ];

        return $this->userRepository->create($user);
    }

   
}
