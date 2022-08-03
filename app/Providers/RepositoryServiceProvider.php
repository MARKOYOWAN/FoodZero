<?php

namespace App\Providers;

use App\Repository\CategoryRepositoryInterface;
use App\Repository\Eloquent\CategoryRepository;
use App\Repository\Eloquent\MediaRepository;
use App\Repository\MediaRepositoryInterface;
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
    }
 
}
