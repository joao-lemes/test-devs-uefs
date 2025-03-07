<?php

namespace Modules\User\Domain\Services;

use Modules\User\Domain\Repositories\UserRepository;
use Modules\User\Http\Resources\OutputUser;

class UserService
{
    public function __construct(private readonly UserRepository $userRepository)
    {
    }

    public function store(
        string $name,
        string $email,
        string $password
    ): OutputUser {;
        $account = $this->userRepository->create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
        ]);

        return new OutputUser($account);
    }
}
