<?php

namespace Xhunter\Repositories\Registros;

use Xhunter\Abstracts\ARepository;
use Xhunter\Models\Registro;
use Xhunter\Contracts\IRepository;

class RegistroRepository extends ARepository implements IRepository
{
    /**
     * Se especifica modelo a utilizar
     *
     * @return mixed
     */
    public function model()
    {
        return Registro::class;
    } 
}