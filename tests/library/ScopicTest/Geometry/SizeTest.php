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

namespace ScopicTest\Geometry;

use Scopic\Geometry\Size;

/**
 * @package  ScopicTest\Geometry
 * @author   Yvan Michel <yvan@scopicproject.org>
 * @link     http://www.scopicproject.org
 */
class SizeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests constructor with valid sizes
     */
    public function testValidConstructor()
    {
        try {
            $size = new Size(0, 0);
            $size = new Size(23, 0);
            $size = new Size(0, 23);
            $size = new Size(23, 23);
        } catch (\InvalidArgumentException $exception) {
            $this->fail('Valid sizes throw an \InvalidArgumentException');
        }
    }

    /**
     * Tests constructor with invalid width
     */
    public function testInvalidConstructorForWidth()
    {
        try {
            $size = new Size(23.3, 23);
            $size = new Size(-23.3, 23);
            $size = new Size('23.3', 23);
        } catch (\InvalidArgumentException $exception) {
            return;
        }

        $this->fail('Invalid width do not throw an \InvalidArgumentException');
    }

    /**
     * Tests constructor with invalid height
     */
    public function testInvalidConstructorForHeight()
    {
        try {
            $size = new Size(23, 23.3);
            $size = new Size(23, -23.3);
            $size = new Size(23, '23.3');
        } catch (\InvalidArgumentException $exception) {
            return;
        }

        $this->fail('Invalid height do not throw an \InvalidArgumentException');
    }

    /**
     * Tests getters
     */
    public function testGetters()
    {
        $width = 831;
        $height = 2043;
        $size = new Size($width, $height);

        $this->assertEquals($width, $size->getWidth());
        $this->assertEquals($height, $size->getHeight());
        $this->assertEquals(
            array('width' => $width, 'height' => $height),
            $size->getSizes()
        );
    }
}
