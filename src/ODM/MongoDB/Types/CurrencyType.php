<?php

namespace DoctrineMoneyModule\DBAL\Types;

use Exception;
use Doctrine\ODM\MongoDB\Types\StringType;
use Money\Currency;

class CurrencyType extends StringType
{
    const NAME = 'currency';

    public function getName()
    {
        return self::NAME;
    }

    public function convertToPHPValue($value)
    {
        if ($value === null || $value instanceof Currency) {
            return $value;
        }

        $val = new Currency($value);

        if (!$val) {
            throw new Exception('Invalid value for type conversion to Money\Money');
        }

        return $val;
    }
}
