<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\Interface\AuthenticationRepositoryInterface;
use App\Repository\AuthenticationRepository;
use App\Repository\Interface\PageRepositoryInterface;
use App\Repository\Interface\CategoryRepositoryInterface;
use App\Repository\PageRepository;
use App\Repository\CategoryRepository;
use App\Models\Category;
use App\Observers\CategoryObserver;
use App\Models\User;
use App\Observers\UserObserver;
use App\Models\Page;
use App\Observers\PageObserver;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(AuthenticationRepositoryInterface::class, AuthenticationRepository::class);
        $this->app->bind(PageRepositoryInterface::class, PageRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
    }
     
    public function boot()
    {
        User::observe(UserObserver::class);
        Category::observe(CategoryObserver::class);
        Page::observe(PageObserver::class);
    }
}
