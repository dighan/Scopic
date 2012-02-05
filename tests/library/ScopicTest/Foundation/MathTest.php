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

use Scopic\Foundation\Math;

/**
 * NOTE: Math::isInt, Math::isFloat, Math::int and Math::float are not tested because they just wrap native PHP functions.
 *
 * @package  ScopicTest\Foundation
 * @author   Yvan Michel <yvan@scopicproject.org>
 * @link     http://www.scopicproject.org
 */
class MathTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests that a number is an unsigned integer
     */
    public function testNumberIsUint()
    {
        $this->assertTrue(
            Math::isUint(95)
        );

        $this->assertTrue(
            Math::isUint(0)
        );
    }

    /**
     * Tests that a number is not un unsigned integer
     */
    public function testNumberIsNotUint()
    {
        $this->assertFalse(
            Math::isUint(-95)
        );

        $this->assertFalse(
            Math::isUint(95.4)
        );

        $this->assertFalse(
            Math::isUint('95')
        );

        $this->assertFalse(
            Math::isUint('95.4')
        );
    }

    /**
     * Tests the unsigned integer conversion
     */
    public function testNumberToUint()
    {
        $this->assertEquals(
            0,
            Math::uint(-95)
        );

        $this->assertEquals(
            95,
            Math::uint(95.45)
        );

        $this->assertEquals(
            94,
            Math::uint(94.99)
        );

        $this->assertEquals(
            95,
            Math::uint('95')
        );

        $this->assertEquals(
            0,
            Math::uint('-95')
        );
    }
}
