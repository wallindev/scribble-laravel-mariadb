<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
  /**
   * Register any application services.
   */
  public function register(): void {
    // Register User Service Provider
    $this->app->register(UserServiceProvider::class);
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void {
    //
  }
}
