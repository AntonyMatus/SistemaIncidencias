<?php

namespace Xhunter\Repositories\Vehiculos;

use Xhunter\Abstracts\ARepository;
use Xhunter\Models\Vehiculo;
use Xhunter\Contracts\IRepository;

class VehiculoRepository extends ARepository implements IRepository
{
    /**
     * Se especifica modelo a utilizar
     *
     * @return mixed
     */

     public function model()
     {
         return Vehiculo::class;
     }
}