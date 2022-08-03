<?php

namespace App\Providers;

use App\Repository\CategoryRepositoryInterface;
use App\Repository\Eloquent\CategoryRepository;
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
    }
 
}
