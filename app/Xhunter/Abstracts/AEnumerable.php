<?php
/**
 * @author fistergutierrez
 * @copyright fistergutierrez@gmail.com
 * @version create date 2019-06-07 18:34:46
 * @version modify date 2019-06-07 18:34:46
 * @todo clase para enumerables
 */

namespace Xhunter\Abstracts\Abstracts;

abstract class AEnumerable
{
    abstract public static function getAll();

    public static function getValue($key, $default = null)
    {
        $items = static::getAll();
        foreach ($items as $k => $value)
        {
            if ($k == $key) return $value;
        }
        return $default;
    }

    public static function getKeys()
    {
        return array_keys(static::getAll());
    }

    public static function getValues()
    {
        return array_values(static::getAll());
    }
}