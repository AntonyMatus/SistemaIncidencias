<?php

namespace Xhunter\Enumerable;

use Xhunter\Abstracts\AEnumerable;

class Colonias extends AEnumerable
{
   
   const Administración_Fiscal_Regional_Peninsular_de_Hacienda = 1;
   const Adolfo_López_Mateos = 2;
   const Ah_kim_pech = 3;
   const Alameda = 4;
   const Altamira = 5;
   const Altavista = 6;
   const Ampliación_Ciudad_Concordia = 7;
   const Ampliación_Esperanza = 8;
   const Ampliación_Invasión_Esperanza = 9;
   const Ampliación_Jardines = 10;
   const Ampliación_Josefa_Ortiz_de_Domínguez = 11;
   const Ampliación_Kala = 12;
   const Ampliación_polvorín = 13;
   const Ampliación_polvorín_II = 14;
   const Ampliación_San_Antonio = 15;
   Const Ampliación_San_Rafael = 16;
   const Aviación = 17;
   const Bellavista = 18;
   const Benito_Juárez = 19;
   const Buanavista = 20;
   const Bugambilias = 21;
   const Camino_Real = 22;
   const Candelaria = 23;
   const Casa_Blanca = 24;
   const Ciudad_Concordia = 25;
   const Las_Palmas = 26;
   const Colonial_Campeche = 27;
   const Cuatro_Caminos = 28;
   const Carmelo = 29;
   const Polvorin = 30;
   const Emiliano_Zapata = 31;
   const Ezmeralda = 32;
   const Esperanza = 33;
   const Fidel_Velásquez = 34;
   const Flor_de_Limón = 35;
   const Girasoles = 36;
   const Guadalupe_Victoria = 37;
   const Héroe_de_Nacozari = 38;
   const Ignacio_Zaragoza = 39;
   const Independencia = 40;
   const Jardines = 41;
   const Justo_Sierra = 42;
   const Kala = 43;
   const Kala_II = 44;
   const La_Ermita =45;
   const Los_Laureles = 46;
   const Minas = 47;
   const Mirador = 48;
   const Miramar = 49;
   const Pablo_Garcia = 50;
   const Peña = 51;
   const Samula = 52;



   public static function getAll()
   {
       return [
         
           self:: Administración_Fiscal_Regional_Peninsular_de_Hacienda => 'Administración Fiscal Regional Peninsular de Hacienda',
           self::Adolfo_López_Mateos => 'Adolfo López Mateos',
           self:: Ah_kim_pech => 'Ah-kim-Pech',
           self:: Alameda => 'Alameda',
           self:: Altamira => 'Altamira',
           self:: Altavista => 'Altavista',
           self:: Ampliación_Ciudad_Concordia => 'Ampliación Ciudad Concordia',
           self:: Ampliación_Esperanza => 'Ampliación Experanza',
           self:: Ampliación_Invasión_Esperanza => 'Ampliación Invasión Esperanza',
           self:: Ampliación_Jardines => 'Ampliación Jardines',
           self:: Ampliación_Josefa_Ortiz_de_Domínguez => 'Ampliación Josefa Ortiz de Domínguez',
           self:: Ampliación_Kala => 'Ampliación Kala',
           self:: Ampliación_polvorín => 'Ampliación Polvorín',
           self:: Ampliación_polvorín_II => 'Ampliación Polvorin II',
           self:: Ampliación_San_Antonio => 'Ampliación San Antonio',
           self:: Ampliación_San_Rafael => 'Ampliación San Rafael',
           self:: Aviación => 'Aviación',
           self:: Bellavista => 'Bellavista',
           self:: Benito_Juárez => 'Benito Juárez',
           self:: Buanavista => 'Buenavista',
           self:: Bugambilias => 'Bugambilias',
           self:: Camino_Real => 'Camino Real',
           self::Candelaria => 'Candelaria',
           self::Casa_Blanca => 'Casa Blanca',
           self::Ciudad_Concordia => 'Ciudad Concordia',
           self::Las_Palmas => 'Las Palmas',
           self::Colonial_Campeche => 'Colonial Campeche',
           self::Cuatro_Caminos => 'Cuatro Caminos',
           self::Carmelo => 'Carmelo',
           self::Polvorin => 'Polvorin',
           self::Emiliano_Zapata => 'Emiliano Zapata',
           self::Ezmeralda => 'Ezmeralda',
           self::Esperanza => 'Esperanza',
           self::Fidel_Velásquez => 'Fidel Velázquez',
           self::Flor_de_Limón => 'Flor de Limón',
           self::Girasoles => 'Girasole',
           self::Guadalupe_Victoria => 'Guadalupe Victoria',
           self::Héroe_de_Nacozari => 'Héroe de Nacozari',
           self::Ignacio_Zaragoza => 'Ignacio Zaragoza',
           self::Independencia => 'Independencia',
           self::Jardines => 'Jardines',
           self::Justo_Sierra => 'Justo Sierra',
           self::Kala => 'Kala',
           self::Kala_II => 'Kala II',
           self::La_Ermita => 'La Ermita',
           self::Los_Laureles => 'Los Laureles',
           self::Minas => 'Minas',
           self::Mirador => 'Mirador',
           self::Miramar => 'Miramar',
           self::Pablo_Garcia => 'Pablo Garcia',
           self::Peña => 'Peña',
           self::Samula => 'Samula',
       ];
   }

   public static function getColonias($key, $default = null){
       $value = self::getValue($key, null);
       if(null == $value) return $default;
       return $value;
   }
}