<?php

namespace Xhunter\Repositories\Personal;

use Xhunter\Abstracts\ARepository;
use Xhunter\Models\Personal;
use Xhunter\Contracts\IRepository;

class PersonalRepository extends ARepository implements IRepository
{
    /**
     * Se especifica modelo a utilizar
     *
     * @return mixed
     */
    
     public function model()
     {
         return Personal::class;
     }
}