<?php

namespace Xhunter\Repositories\Emergencias;
use Xhunter\Abstracts\ARepository;
use Xhunter\Models\Emergencia;
use Xhunter\Contracts\IRepository;

class EmergenciaRepository extends ARepository implements IRepository
{
    /**
     * Se especifica modelo a utilizar
     *
     * @return mixed
     */

     public function model()
     {
         return Emergencia::class;
     }
}