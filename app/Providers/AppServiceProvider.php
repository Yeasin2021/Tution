<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Essential\Interfaces\StudentInterface;
use App\Essential\Repositories\StudentRepository;
use App\Services\CountSallary;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //Student interface & repository registered
        $this->app->bind(StudentInterface::class,StudentRepository::class);
        $this->app->bind('Count',CountSallary::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
