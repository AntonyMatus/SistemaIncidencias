<?php

namespace Xhunter\Providers\XhunterServiceProvider;

use Illuminate\Support\ServiceProvider;
use Xhunter\Validators\Productos\ProductosValidator;
use Xhunter\Repositories\Productos\ProductoRepository;

class XhunterServiceProvider extends ServiceProvider
{

    public function register()
    {
        //Repositorios
        $this->app->bind(
            ProductoRepository::class
        );

        //Validadores
        $this->app->bind(ProductosValidator::class);
    }
}