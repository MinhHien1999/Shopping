<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use App\hoadon;
use App\khachhang;
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
        view()->composer('backend.dashboard', function ($view) {
            $view->with('monthNow',Carbon::now()->month)
            ->with('doanhthu',hoadon::whereYear('created_at','=',date('Y'))
            ->whereMonth('created_at','<=',Carbon::now()->month)
            ->where('hoadon_trangthai','=',1)
            ->sum('hoadon_tongtien'))
            ->with('users_count',khachhang::count())
            ->with('hoadon_daxuly_count',hoadon::where('hoadon_trangthai','=',1)->count())
            ->with('hoadon_chuaxuly_count',hoadon::where('hoadon_trangthai','=',0)->count());
        });
    }
}
