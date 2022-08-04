<?php

namespace App\Providers;

use App\Repository\CategoryRepositoryInterface;
use App\Repository\Eloquent\CategoryRepository;
use App\Repository\Eloquent\MediaRepository;
use App\Repository\Eloquent\MenuRepository;
use App\Repository\MediaRepositoryInterface;
use App\Repository\MenuRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /** 
     * Register services. 
     * 
     * @return void
     */
    public function register()
    {
     $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class); 
     $this->app->bind(MediaRepositoryInterface::class, MediaRepository::class);
     $this->app->bind(MenuRepositoryInterface::class, MenuRepository::class);
    }
 
}
