<?php

namespace App\Enum;

use ReflectionClass;

abstract class RoleEnum
{
    const User = 1;
    const Admin = 2;

    public static function values()
    {
      $reflectionClass = new ReflectionClass(__CLASS__);
      return array_flip($reflectionClass->getConstants());
    }
}