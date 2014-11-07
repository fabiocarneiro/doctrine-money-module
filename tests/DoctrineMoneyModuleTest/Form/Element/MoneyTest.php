<?php

namespace DoctrineMoneyModuleTest\Form\Element;

use InvalidArgumentException;
use PHPUnit_Framework_TestCase as TestCase;
use Money\Money;
use DoctrineMoneyModule\Form\Element\Money as MoneyElement;
use Zend\Form\Form;

/**
 * Tests for Money Form Element
 *
 * @author Fábio Carneiro <fahecs@gmail.com>
 * @license MIT
 */
class MoneyTest extends TestCase
{
    /**
     * @test
     */
    public function testSetObject()
    {
        $element = new MoneyElement();
        $element->setValue(Money::BRL(1));
        $this->assertSame(1, $element->getValue());
    }

    /**
     * @test
     */
    public function testCanSetInteger()
    {
        $element = new MoneyElement();

        $element->setValue(1);

        $this->assertSame(1, $element->getValue());
        $this->assertInstanceOf(Money::class, $element->getValue(false));
        $this->assertSame('USD', $element->getCurrency()->getName());
    }

    /**
     * @test
     */
    public function testThrowInvalidArgumentException()
    {
        $element = new MoneyElement();
        $this->setExpectedException(InvalidArgumentException::class);
        $element->setValue("hello world");
    }

    /**
     * @test
     */
    public function testRetrieveConfiguredCurrency()
    {
        $element = new MoneyElement(null, [
            'currency' => 'BRL'
        ]);

        $this->assertSame('BRL', $element->getCurrency()->getName());
    }
}
