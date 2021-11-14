<?php

namespace Xhunter\Enumerable;

use Xhunter\Abstracts\AEnumerable;

class SubEstaciones extends AEnumerable
{
   
   const ESTACIÓN_DE_BOMBEROS_BASE_UNO = 2;
   const SUBESTACIÓN_DE_CONCORDIA = 3;
   const SUBESTACIÓN_DE_SANTA_LUCIA = 4;
   const SUBESTACIÓN_DE_SOLIDARIDAD_NACIONAL = 5;
   

   public static function getAll()
   {
       return [
         
           self:: ESTACIÓN_DE_BOMBEROS_BASE_UNO => 'ESTACIÓN DE BOMBEROS BASE # 1',
           self:: SUBESTACIÓN_DE_CONCORDIA => 'SUBESTACIÓN DE CD. CONCORDIA',
           self:: SUBESTACIÓN_DE_SANTA_LUCIA => 'SUBESTACIÓN DE SANTA LUCIA',
           self:: SUBESTACIÓN_DE_SOLIDARIDAD_NACIONAL => 'SUBESTACIÓN DE SOLIDARIDAD NACIONAL',
          
       ];
   }

   public static function getSubEstaciones($key, $default = null){
       $value = self::getValue($key, null);
       if(null == $value) return $default;
       return $value;
   }
}