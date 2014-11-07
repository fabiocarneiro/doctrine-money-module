<?php

namespace DoctrineMoneyModule\Form\Element;

use RuntimeException;
use InvalidArgumentException;
use Money\Money as MoneyValueObject;
use Money\Currency;
use Zend\Form\Element\Number;

/**
 * Form element to convert inputs to money objects
 *
 * @author Fábio Carneiro <fahecs@gmail.com>
 * @license MIT
 */
class Money extends Number
{
    /**
     * @var Currency
     */
    protected $currency;

    /**
     * {@inheritDoc}
     */
    public function setOptions($options)
    {
        parent::setOptions($options);

        if (isset($options['currency'])) {
            $this->setCurrency($options['currency']);
        }

        $this->options = $options;
    }

    public function getCurrency()
    {
        if (null === $this->currency) {
            $this->currency = new Currency('USD');
        }

        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency($name)
    {
        $this->currency = new Currency($name);
    }

    public function setValue($value)
    {
        if (is_int($value)) {
            $value = new MoneyValueObject($value, $this->getCurrency());
        }

        if (is_string($value)) {
            try {
                $units = MoneyValueObject::stringToUnits($value);
                $value = new MoneyValueObject($units, $this->getCurrency());
            } catch (Exception $e) {
                throw new InvalidArgumentException(sprintf(
                    '%s expects an parsable string or money object, "%s" given',
                    __METHOD__,
                    is_object($value) ? get_class($value) : gettype($value)
                ));
            }
        }

        if (! $value instanceof Money) {
            throw new RuntimeException;
        }

        parent::setValue($value);
    }
}
