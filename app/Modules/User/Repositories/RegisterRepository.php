<?php

namespace App\Modules\User\Repositories;


use App\Modules\Blogger\Repositories\BloggerRepository;
use App\Modules\Blogger\Repositories\BloggerRepositoryInterface;
use App\Services\UtilsService;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class RegisterRepository implements RegisterRepositoryInterface
{

    public function __construct(protected UserRepositoryInterface $userRepository,protected BloggerRepositoryInterface $bloggerRepository)
    {
    }

    /**
     * @throws Exception
     */
    public function create(array $request): void
    {
        DB::beginTransaction();
        try {
            $user = $this->userRepository->create([
                'name' => UtilsService::characterOnlySanitize($request['name']),
                'email' => $request['email'],
                'password' => $request['password'],
            ]);

            $this->bloggerRepository->createForRegistration(['blog_name' => $request['blog_name'], 'user' => $user]);

            event(new Registered($user));

            Auth::login($user);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }

}
