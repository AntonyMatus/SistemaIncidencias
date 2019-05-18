<?php

namespace Xhunter\Repositories\Productos;

use Xhunter\Abstracts\ARepository;
use Xhunter\Models\Producto;
use Xhunter\Contracts\IRepository;

class ProductoRepository extends ARepository implements IRepository
{
    /**
     * Se especifica modelo a utilizar
     *
     * @return mixed
     */
    public function model()
    {
        return Producto::class;
    }
}