<?php

namespace App\Providers;

use App\Repositories\Contracts\ICidadeRepository;
use App\Repositories\Contracts\IMedicoRepository;
use App\Repositories\Contracts\IPacienteRepository;
use App\Repositories\Eloquent\CidadeRepository;
use App\Repositories\Eloquent\MedicoRepository;
use App\Repositories\Eloquent\PacienteRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ICidadeRepository::class, CidadeRepository::class);
        $this->app->bind(IMedicoRepository::class, MedicoRepository::class);
        $this->app->bind(IPacienteRepository::class, PacienteRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
