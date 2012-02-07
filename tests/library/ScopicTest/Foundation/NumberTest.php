<?php

/*
 * This file is part of Scopic.
 * Scopic is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Scopic is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with Scopic. If not, see <http://www.gnu.org/licenses/>.
 */

namespace ScopicTest\Foundation;

use Scopic\Foundation\Number;

/**
 * @package  ScopicTest\Foundation
 * @author   Yvan Michel <yvan@scopicproject.org>
 * @link     http://www.scopicproject.org
 */
class NumberTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests valid integers
     */
    public function testValidInt()
    {
        $this->assertTrue(Number::isInt(0));
        $this->assertTrue(Number::isInt(-5));
        $this->assertTrue(Number::isInt(5));
    }

    /**
     * Tests invalid integers
     */
    public function testInvalidInt()
    {
        $this->assertFalse(Number::isInt(34.3));
        $this->assertFalse(Number::isInt(-34.3));
        $this->assertFalse(Number::isInt('5'));
    }

    /**
     * Tests integer conversion
     */
    public function testIntConversion()
    {
        $this->assertEquals(0, Number::toInt(0.0));
        $this->assertEquals(95, Number::toInt(95.45));
        $this->assertEquals(94, Number::toInt(94.99));
        $this->assertEquals(95, Number::toInt('95'));
        $this->assertEquals(-95, Number::toInt('-95'));
    }

    /**
     * Tests valid floats
     */
    public function testValidFloat()
    {
        $this->assertTrue(Number::isFloat(-5.3));
        $this->assertTrue(Number::isFloat(5.3));
    }

    /**
     * Tests invalid floats
     */
    public function testInvalidFloat()
    {
        $this->assertFalse(Number::isFloat(0));
        $this->assertFalse(Number::isFloat(-5));
        $this->assertFalse(Number::isFloat(5));
        $this->assertFalse(Number::isFloat('5.3'));
    }

    /**
     * Tests float conversion
     */
    public function testFloatConversion()
    {
        $this->assertEquals(95.0, Number::toFloat(95));
        $this->assertEquals(95.0, Number::toFloat('95'));
    }

    /**
     * Tests valid unsigned integers
     */
    public function testValidUint()
    {
        $this->assertTrue(Number::isUint(0));
        $this->assertTrue(Number::isUint(5));
    }

    /**
     * Tests invalid unsigned integers
     */
    public function testInvalidUint()
    {
        $this->assertFalse(Number::isUint(-5.3));
        $this->assertFalse(Number::isUint('5'));
        $this->assertFalse(Number::isUint('2.3'));
    }

    /**
     * Tests unsigned integer conversion
     */
    public function testUintConversion()
    {
        $this->assertEquals(0, Number::toUint(-95));
        $this->assertEquals(95, Number::toUint(95.45));
        $this->assertEquals(94, Number::toUint(94.99));
        $this->assertEquals(95, Number::toUint('95'));
        $this->assertEquals(0, Number::toUint('-95'));
    }
}
