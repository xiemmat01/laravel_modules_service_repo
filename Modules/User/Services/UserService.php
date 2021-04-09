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
        $request->validate([
            'name'       => 'required',
            'email'      => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'password'   => 'required',
            'repassword' => 'required|same:password',
            'level'      => 'required',
        ], [
            'name.required'     => 'Please Enter Your Name',
            'password.required' => 'Please Enter Your Password',
            'repassword.same'   => 'RePassword not the same Password',
            'email.required'    => 'Please Enter Your Email',
            'email.regex'       => 'Email Error Syntax',
            'level.required'    => 'Please choose level',
        ]);
        $user = [
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "level" => $request->level,
        ];

        return $this->userRepository->update($user, $id);
    }

    public function delete($id)
    {
        return $this->userRepository->delete($id);
    }
}
