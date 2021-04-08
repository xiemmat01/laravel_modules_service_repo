<?php

namespace App\Modules\User\Services;

use App\Models\User;
use App\Modules\User\Repositories\UserRepository;

class DeleteUserService
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function delete($id)
    {
        return $this->userRepository->delete($id);
    }
}
