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
    /*
     * Tests constructor with valid coordinates
     */
    public function testValidConstructor()
    {
        try {
            $point = new Point(0, 0);
            $point = new Point(24, 0);
            $point = new Point(0, 24);
            $point = new Point(34, 24);
        } catch (\InvalidArgumentException $exception) {
            $this->fail('Valid point coordinates trigger an \InvalidArgumentException');
        }
    }

    /*
     * Tests constructor with invalid coordinates
     */
    public function testInvalidConstructor()
    {
        try {
            $point = new Point(23.3, 0);
            $point = new Point(0, 23.3);
            $point = new Point(23.3, 23.3);
            $point = new Point(-23.3, 23.3);
            $point = new Point(23.3, -23.3);
            $point = new Point(-23.3, -23.3);
            $point = new Point('23.3', '-23.3');
        } catch (\InvalidArgumentException $exception) {
            return;
        }

        $this->fail('Invalid point coordinates do not trigger an \InvalidArgumentException');
    }
}
