<?php

namespace Modules\User\Domain\Services;

use App\Exceptions\NotFoundException;
use Illuminate\Support\Str;
use Modules\User\Domain\Repositories\UserRepository;
use Modules\User\Http\Resources\OutputUser;
use Modules\User\Http\Resources\OutputUserCollection;

class UserService
{
    public function __construct(private readonly UserRepository $userRepository)
    {
    }

    public function list(
        int $page,
        int $perPage
    ): OutputUserCollection {
        $users = $this->userRepository->list($page, $perPage);

        return new OutputUserCollection($users);
    }

    public function store(
        string $name,
        string $email,
        string $password
    ): OutputUser {
        $user = $this->userRepository->create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'uuid' => Str::uuid()->toString(),
        ]);

        return new OutputUser($user);
    }

    public function getByUuid(string $uuid): OutputUser
    {
        $user = $this->userRepository->getByUuid($uuid);

        if (empty($user)) {
            throw new NotFoundException(trans('exception.not_found.user'));
        }

        return new OutputUser($user);
    }
}
