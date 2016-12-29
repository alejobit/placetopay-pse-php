<?php

namespace PlacetoPay\PSE\Helper;

class Validator
{
    public static function validString($value, $length = null)
    {
        if (!is_null($value) && !is_string($value)) {
            throw new \InvalidArgumentException(sprintf(
                'Invalid value, please provide a string, %s given',
                is_object($value) ? get_class($value) : gettype($value)
            ));
        }

        if (isset($value, $length) && strlen($value) > $length) {
            throw new \InvalidArgumentException(sprintf(
                'Invalid string length, maximun %s characters',
                $length
            ));
        }

        return $value;
    }

    public static function validDouble($value)
    {
        if (!is_null($value) && !is_double($value)) {
            throw new \InvalidArgumentException(sprintf(
                'Invalid value, please provide a double, %s given',
                is_object($value) ? get_class($value) : gettype($value)
            ));
        }

        return $value;
    }

    public static function validObject($value, $class)
    {
        if (!$value instanceof $class) {
            throw new \InvalidArgumentException(sprintf(
                'Invalid value, please provide a instance of %s, %s given',
                $class,
                is_object($value) ? get_class($value) : gettype($value)
            ));
        }

        return $value;
    }
}
