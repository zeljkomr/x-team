<?php

namespace App\Containers\User\Tasks;

use App\Containers\User\Data\Repositories\UserRepository;
use App\Containers\User\Models\User;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Illuminate\Support\Facades\Hash;

/**
 * Class CreateUserByCredentialsTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class CreateUserByCredentialsTask extends Task
{

    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param string $name
     * @param string $password
     * @param string $email
     * @param string|null $gender
     * @param string|null $birth
     * @param bool $isClient
     * @param string|null $role
     * @return User
     */
    public function run(
        string $name,
        string $password,
        string $email,
        string $gender = null,
        string $birth = null,
        bool $isClient = true,
        string $role = null
    ): User {

        try {
            // create new user
            $user = $this->repository->create([
                'name'               => $name,
                'password'           => Hash::make($password),
                'email'              => $email,
                'gender'             => $gender,
                'birth'              => $birth,
                'is_client'          => $isClient,
                'confirmation_token' => Hash::make($name . $email)
            ])->assignRole($role);


        } catch (Exception $e) {
            throw (new CreateResourceFailedException())->debug($e);
        }

        return $user;
    }

}
