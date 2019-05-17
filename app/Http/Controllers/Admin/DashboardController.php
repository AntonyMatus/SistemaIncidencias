<?php

namespace Sislab\Http\Controllers\Admin;

use Sislab\Http\Controllers\Controller;
use Illuminate\Support\Collection as Collection;
use Spatie\Permission\Models\Permission;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $routes = [];
        foreach (\Route::getRoutes()->getIterator() as $route){
            if (strpos($route->uri, 'admin') !== false){
                $r = explode('/', $route->uri);
                $routes[] =  $r[1];
            }
        }
        $routes = array_diff($routes, array('dashboard', 'users', 'roles'));
        $result = Collection::make(array_unique($routes));
        $result->each(function ($item, $key) {
            // crear permisos para cada elemento de colección
            Permission::firstOrCreate(['name' => 'Listar ' . $item]);
            Permission::firstOrCreate(['name' => 'Ver ' . $item]);
            Permission::firstOrCreate(['name' => 'Crear ' . $item]);
            Permission::firstOrCreate(['name' => 'Editar ' . $item]);
            Permission::firstOrCreate(['name' => 'Eliminar ' . $item]);
        });
        return view('dashboard');
    }
}
