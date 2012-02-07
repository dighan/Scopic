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

use Scopic\Geometry\Rectangle,
    Scopic\Geometry\Point,
    Scopic\Geometry\Size;

/**
 * @todo     Use @expectedException instead try/catch/fail
 * @package  ScopicTest\Geometry
 * @author   Yvan Michel <yvan@scopicproject.org>
 * @link     http://www.scopicproject.org
 */
class RectangleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests valid long constructor prototype
     */
    public function testValidLongConstructor()
    {
        try {
            $rectangle = new Rectangle(0, 0, 600, 600);
        } catch (\InvalidArgumentException $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * Tests valid short constructor prototype
     */
    public function testValidShortConstructor()
    {
        try {
            $rectangle = new Rectangle(
                new Point(23, 34),
                new Size(800, 459)
            );
        } catch (\InvalidArgumentException $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * Tests invalid constructor (unknown prototype)
     */
    public function testInvalidConstructor()
    {
        try {
            $rectangle = new Rectangle('testouille');
        } catch (\InvalidArgumentException $exception) {
            return;
        }

        $this->fail('Invalid constructor (unknown prototype) not throw an \InvalidArgumentException');
    }

    /**
     * Tests invalid short constructor for origin parameter
     */
    public function testInvalidShortConstructorForOrigin()
    {
        try {
            $size = new Size(34, 23);
            $rectangle = new Rectangle(new \Exception('test'), $size);
        } catch (\InvalidArgumentException $exception) {
            return;
        }

        $this->fail('Invalid origin point not throw an \InvalidArgumentException');
    }

    /**
     * Test invalid short constructor for size parameter
     */
    public function testInvalidShortConstructorForSize()
    {
        try {
            $point = new Point(34, 23);
            $rectangle = new Rectangle($point, new \RuntimeException('ouille'));
        } catch (\InvalidArgumentException $exception) {
            return;
        }

        $this->fail('Invalid size not thrower an \InvalidArgumentException');
    }

    /**
     * Tests getters
     */
    public function testGetters()
    {
        $origin = new Point(50, 30);
        $size = new Size(344, 2333);

        $rectangle1 = new Rectangle($origin, $size);
        $rectangle2 = new Rectangle(
            $origin->getX(), $origin->getY(),
            $size->getWidth(), $size->getHeight()
        );

        $this->assertEquals($origin, $rectangle1->getOrigin());
        $this->assertEquals($origin, $rectangle2->getOrigin());
        $this->assertEquals($size, $rectangle1->getSize());
        $this->assertEquals($size, $rectangle2->getSize());
    }

    /**
     * Tests valid kepoints
     */
    public function testValidKeypoints()
    {
        $x = 345;
        $y = 712;
        $width = 103;
        $height = 491;
        $rectangle = new Rectangle($x, $y, $width, $height);

        $keypoint = $rectangle->getKeypoint(Point::TOP_LEFT);
        $this->assertEquals($keypoint->getX(), $x);
        $this->assertEquals($keypoint->getY(), $y);

        $keypoint = $rectangle->getKeypoint(Point::TOP_CENTER);
        $this->assertEquals($keypoint->getX(), $x + (int) ($width / 2));
        $this->assertEquals($keypoint->getY(), $y);

        $keypoint = $rectangle->getKeypoint(Point::RIGHT_TOP);
        $this->assertEquals($keypoint->getX(), $x + $width);
        $this->assertEquals($keypoint->getY(), $y);

        $keypoint = $rectangle->getKeypoint(Point::RIGHT_CENTER);
        $this->assertEquals($keypoint->getX(), $x + $width);
        $this->assertEquals($keypoint->getY(), $y + (int) ($height / 2));

        $keypoint = $rectangle->getKeypoint(Point::BOTTOM_RIGHT);
        $this->assertEquals($keypoint->getX(), $x + $width);
        $this->assertEquals($keypoint->getY(), $y + $height);

        $keypoint = $rectangle->getKeypoint(Point::BOTTOM_CENTER);
        $this->assertEquals($keypoint->getX(), $x + (int) ($width / 2));
        $this->assertEquals($keypoint->getY(), $y + $height);

        $keypoint = $rectangle->getKeypoint(Point::LEFT_BOTTOM);
        $this->assertEquals($keypoint->getX(), $x);
        $this->assertEquals($keypoint->getY(), $y + $height);

        $keypoint = $rectangle->getKeypoint(Point::LEFT_CENTER);
        $this->assertEquals($keypoint->getX(), $x);
        $this->assertEquals($keypoint->getY(), $y + (int) ($height / 2));

        $keypoint = $rectangle->getKeypoint(Point::CENTER_CENTER);
        $this->assertEquals($keypoint->getX(), $x + (int) ($width / 2));
        $this->assertEquals($keypoint->getY(), $y + (int) ($height / 2));
    }

    /**
     * Tests invalid keypoints
     *
     * @expectedException \InvalidArgumentException
     */
    public function testInvalidKeypoints()
    {
        $rectangle = new Rectangle(34, 23, 399, 22);

        $rectangle->getKeypoint(10);
    }
}
