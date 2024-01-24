<?php

namespace App\Providers;

use App\Models\Blog;
use App\Observers\BlogObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        // 将分页默认视图修改为bootstrap
        Paginator::useBootstrap();

        // 修改分页默认视图
        Paginator::defaultView('vendor.pagination.my-page');
        Paginator::defaultSimpleView('vendor.pagination.my-page');

        // 注册观察者
        Blog::observe(BlogObserver::class);
    }
}
