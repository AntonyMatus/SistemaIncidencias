<?php

namespace Xhunter\Enumerable;

use Xhunter\Abstracts\AEnumerable;

class EstatusVehiculo extends AEnumerable
{
    const FUNCIONAMIENTO = 1;
    const TALLER = 2;

    public static function getAll()
    {
        return [
            self:: FUNCIONAMIENTO => 'Funcionamiento',
            self:: TALLER => 'Taller',

        ];
    }

    public static function getEstatusVehiculo($key, $default = null){
        $value = self::getValue($key, null);
        if(null == $value) return $default;
        return $value;
    }
}