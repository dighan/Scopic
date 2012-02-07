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

use Scopic\Geometry\Point;

/**
 * @package  ScopicTest\Geometry
 * @author   Yvan Michel <yvan@scopicproject.org>
 * @link     http://www.scopicproject.org
 */
class PointTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests constructor with valid coordinates
     */
    public function testValidConstructor()
    {
        try {
            $point = new Point(0, 0);
            $point = new Point(24, 0);
            $point = new Point(0, 24);
            $point = new Point(24, 24);
        } catch (\InvalidArgumentException $exception) {
            $this->fail('Valid point coordinates throw an \InvalidArgumentException');
        }
    }

    /**
     * Tests constructor with invalid X coordinate
     */
    public function testInvalidConstructorForX()
    {
        try {
            $point = new Point(23.3, 23);
            $point = new Point(-23.3, 23);
            $point = new Point('23.3', 23);
        } catch (\InvalidArgumentException $exception) {
            return;
        }

        $this->fail('Invalid point X coordinate do not throw an \InvalidArgumentException');
    }

    /**
     * Tests constructor with invalid Y coordinates
     */
    public function testInvalidConstructor()
    {
        try {
            $point = new Point(23, 23.3);
            $point = new Point(23, -23.3);
            $point = new Point(23, '23.3');
        } catch (\InvalidArgumentException $exception) {
            return;
        }

        $this->fail('Invalid point Y coordinate do not throw an \InvalidArgumentException');
    }

    /**
     * Tests getters
     */
    public function testGetters()
    {
        $x = 234;
        $y = 1034;
        $point = new Point($x, $y);

        $this->assertEquals($x, $point->getX());
        $this->assertEquals($y, $point->getY());
        $this->assertEquals(
            array('x' => $x, 'y' => $y),
            $point->getCoordinates()
        );
    }

    /**
     * Tests keypoints exist
     */
    public function testKeypointsExist()
    {
        $this->assertTrue(
            Point::exists(Point::TOP_LEFT)
        );

        $this->assertTrue(
            Point::exists(Point::TOP_CENTER)
        );

        $this->assertTrue(
            Point::exists(Point::RIGHT_TOP)
        );

        $this->assertTrue(
            Point::exists(Point::RIGHT_CENTER)
        );

        $this->assertTrue(
            Point::exists(Point::BOTTOM_RIGHT)
        );

        $this->assertTrue(
            Point::exists(Point::BOTTOM_CENTER)
        );

        $this->assertTrue(
            Point::exists(Point::LEFT_BOTTOM)
        );

        $this->assertTrue(
            Point::exists(Point::LEFT_CENTER)
        );

        $this->assertTrue(
            Point::exists(Point::CENTER_CENTER)
        );

        try {
            Point::check(Point::TOP_LEFT);
            Point::check(Point::TOP_CENTER);
            Point::check(Point::RIGHT_TOP);
            Point::check(Point::RIGHT_CENTER);
            Point::check(Point::BOTTOM_RIGHT);
            Point::check(Point::BOTTOM_CENTER);
            Point::check(Point::LEFT_BOTTOM);
            Point::check(Point::LEFT_CENTER);
            Point::check(Point::CENTER_CENTER);
        } catch (\InvalidArgumentException $exception) {
            $this->fail('Valid keypoints throw an \InvalidArgumentException');
        }
    }

    /**
     * Tests keypoints do not exist
     */
    public function testInvalidKeypoints()
    {
        $this->assertFalse(
            Point::exists(10)
        );

        $this->assertFalse(
            Point::exists(0)
        );

        $this->assertFalse(
            Point::exists('TOP_LEFT')
        );

        try {
            Point::check(10);
            Point::check(0);
            Point::check('TOP_LEFT');
        } catch (\InvalidArgumentException $exception) {
            return;
        }

        $this->fail('Invalid keypoints do not throw an \InvalidArgumentException');
    }
}
