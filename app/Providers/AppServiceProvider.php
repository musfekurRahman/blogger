<?php

namespace App\Providers;


use App\Modules\Blogger\Repositories\BloggerRepository;
use App\Modules\Blogger\Repositories\BloggerRepositoryInterface;
use App\Modules\Category\Repositories\CategoryRepository;
use App\Modules\Category\Repositories\CategoryRepositoryInterface;
use App\Modules\Content\Repositories\ContentRepository;
use App\Modules\Content\Repositories\ContentRepositoryInterface;
use App\Modules\User\Repositories\RegisterRepository;
use App\Modules\User\Repositories\RegisterRepositoryInterface;
use App\Modules\User\Repositories\UserRepository;
use App\Modules\User\Repositories\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(RegisterRepositoryInterface::class, RegisterRepository::class);

        $this->app->bind(BloggerRepositoryInterface::class, BloggerRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(ContentRepositoryInterface::class, ContentRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
