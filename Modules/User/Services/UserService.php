<?php

namespace Modules\User\Services;

use App\Models\User;
use Modules\User\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserService
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function all()
    {
        return $this->userRepository->all();
    }

    public function create(Request $request)
    {
        debugbar()->info($request);
        $user = [
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "level" => $request->level,
        ];

        return $this->userRepository->create($user);
    }


    public function find($id)
    {
        return $this->userRepository->find($id);
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

        return $this->userRepository->update($user, $id);
    }

    public function delete($id)
    {
        return $this->userRepository->delete($id);
    }
}
