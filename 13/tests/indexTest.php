<?php
require_once "app/index.php";

use PHPUnit\Framework\TestCase;
use index\index;

class ComplexExpressionTest extends TestCase
{
    public function testAddCorrect()
    {
        $complex = new ComplexExpression(10, 2);
        $complex->add(new ComplexExpression(2, -10));
        $this->assertEquals("(12,-8)", $complex->__toString());
    }

    public function testAddIncorrect()
    {
        $complex = new ComplexExpression(5, 2);
        $complex->add(new ComplexExpression(2, -10));
        $this->assertTrue("(7,-8)" != $complex->__toString());
    }

    public function testSubCorrect()
    {
        $complex = new ComplexExpression(5, 2);
        $complex->sub(3);
        $this->assertTrue("(15,6)" == $complex->__toString());
    }

    public function testSubIncorrect()
    {
        $complex = new ComplexExpression(5, 2);
        $complex->sub(5);
        $this->assertFalse("(550,823)" == $complex->__toString());
    }

    public function testMultCorrect()
    {
        $complex = new ComplexExpression(5, 2);
        $complex->mult(new ComplexExpression(2, -1)); //(5+2i)*(2-i)=10-i+2 =12-i
        $this->assertEquals("(12,-1)", $complex->__toString());
    }

    public function testMultIncorrect()
    {
        $complex = new ComplexExpression(5, 2);
        $complex->mult(new ComplexExpression(2, -1));
        $this->assertFalse("(1,1)" == $complex->__toString());
    }

    public function testDivCorrect()
    {
        $complex = new ComplexExpression(-2, 1);
        $complex->div(new ComplexExpression(1, 1));
        $this->assertEquals("(-0.5,1.5)", $complex->__toString());
    }

    public function testDivIncorrect()
    {
        $complex = new ComplexExpression(-2, 1);
        $complex->div(new ComplexExpression(1, 1));
        $this->assertNotSame("(1,1)", $complex->__toString());
    }

    public function testAbsCorrect()
    {
        $complex = new ComplexExpression(0, 0);
        $this->assertIsFloat($complex->abs());

    }

    public function testAbsIncorrect()
    {
        $complex = new ComplexExpression(0, 1);
        $this->assertNotSame('10', $complex->abs());
    }

}