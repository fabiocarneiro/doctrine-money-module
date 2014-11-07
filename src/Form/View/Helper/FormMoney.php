<?php

namespace DoctrineMoneyModule\Form\View\Helper;

use InvalidArgumentException;
use Zend\Form\View\Helper\FormNumber;
use Zend\Form\ElementInterface;
use DoctrineMoneyModule\Form\Element\Money as MoneyElement;

/**
 * MoneyHelper
 *
 * @author Fábio Carneiro <fahecs@gmail.com>
 * @license MIT
 */
class MoneyHelper extends FormNumber
{
    public function render(ElementInterface $element)
    {
        if ($element instanceof MoneyElement) {
            throw new InvalidArgumentException();
        }

        $name = $element->getName();
        if ($name === null || $name === '') {
            throw new Exception\DomainException(sprintf(
                '%s requires that the element has an assigned name; none discovered',
                __METHOD__
            ));
        }

        $attributes          = $element->getAttributes();
        $attributes['name']  = $name;
        $attributes['type']  = $this->getType($element);
        $attributes['value'] = $element->getValue()->getAmount();

        return sprintf(
            '<input %s%s',
            $this->createAttributesString($attributes),
            $this->getInlineClosingBracket()
        );
    }
}
