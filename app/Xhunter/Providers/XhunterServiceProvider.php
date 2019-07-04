<?php

namespace Xhunter\Providers\XhunterServiceProvider;

use Illuminate\Support\ServiceProvider;
use Xhunter\Repositories\Productos\ProductoRepository;
use Xhunter\Validators\Productos\ProductosValidator;
use Xhunter\Repositories\Cargos\CargoRepository;
use Xhunter\Validators\Cargos\CargosValidator;
use Xhunter\Repositories\Personal\PersonalRepository;
use Xhunter\Validators\Personal\PersonalValidator;

class XhunterServiceProvider extends ServiceProvider
{

    public function register()
    {
        //Repositorios
        $this->app->bind(ProductoRepository::class);
        $this->app->bind(CargoRepository::class);
        $this->app->bind(PersonalRepository::class);

        //Validadores
        $this->app->bind(ProductosValidator::class);
        $this->app->bind(CargosValidator::class);
        $this->app->bind(PersonalValidator::class);
    }
}