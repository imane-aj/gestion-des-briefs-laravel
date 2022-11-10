<?php

namespace App\Providers;

use App\Models\Student;
use App\Models\Promotion;
use Illuminate\Support\Facades\App;
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
        if (! App::runningInConsole()) {
            // 
            $students = Student::orderBy('id','DESC')->get();
            $promotion = Promotion::orderBy('id','DESC')->get();
            \view()->share([
                'promotion'=> $promotion,
                'students' => $students
            ]);
        }
      
    }
}
