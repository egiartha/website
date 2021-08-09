<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;
use Blade;
use DB;
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
        // Data Kehadiran Per Siswa
        view()->composer('layouts/admin', function($view)
        {
            $view->with('aplikasi', DB::table("settings")->first());
            $view->with('settings', DB::table("settings")->first());
            $view->with('pengajuan_belum', DB::table("tb_pengaduan")->where('kategori','pengajuan')->where('status','0')->get());
            $view->with('pengajuan_proses', DB::table("tb_pengaduan")->where('kategori','pengajuan')->where('status','proses')->get());
            $view->with('pengajuan_diterima', DB::table("tb_pengaduan")->where('kategori','pengajuan')->where('status','diterima')->get());
            $view->with('pengajuan_ditolak', DB::table("tb_pengaduan")->where('kategori','pengajuan')->where('status','ditolak')->get());
            $view->with('pengajuan_selesai', DB::table("tb_pengaduan")->where('kategori','pengajuan')->where('status','selesai')->get());

            $view->with('aspirasi_belum', DB::table("tb_pengaduan")->where('kategori','aspirasi')->where('status','0')->get());
            $view->with('aspirasi_proses', DB::table("tb_pengaduan")->where('kategori','aspirasi')->where('status','proses')->get());
            $view->with('aspirasi_diterima', DB::table("tb_pengaduan")->where('kategori','aspirasi')->where('status','diterima')->get());
            $view->with('aspirasi_ditolak', DB::table("tb_pengaduan")->where('kategori','aspirasi')->where('status','ditolak')->get());
            
         
        });
        view()->composer('layouts/layout', function($view)
        {
            $view->with('aplikasi', DB::table("settings")->first());
            
         
        });
       Schema::defaultStringLength(191);
       Blade::directive('currency', function ($expression) {
        return "Rp. <?php echo number_format($expression, 0, ',', '.'); ?>";
    });
    }
}
