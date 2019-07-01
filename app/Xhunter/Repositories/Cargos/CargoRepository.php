<?php

namespace Xhunter\Repositories\Cargos;
use Xhunter\Abstracts\ARepository;
use Xhunter\Models\Cargo;
use Xhunter\Contracts\IRepository;

class CargoRepository extends ARepository implements IRepository
{
    /**
     * Se especifica modelo a utilizar
     *
     * @return mixed
     */

     public function model()
     {
         return Cargo::class;
     }
}