<?php

namespace App\Modules\User\Services;

use App\Models\User;
use App\Modules\User\Repositories\UserRepository;
use Illuminate\Http\Request;

class GetAllUserService
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function update(Request $request, $id)
    {
        $user = [
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->password,
            "phone" => $request->phone,
            "level" => $request->level,
        ];

        return $this->userRepository->update($user,$id);
    }
}
