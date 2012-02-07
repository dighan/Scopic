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

namespace Scopic\Geometry;

use Scopic\Foundation\Number;

/**
 * Point representation
 *
 * NOTE: Keypoints are predefined and "understandable" coordinates which refer to a specific location.
 *
 * @package  Scopic\Geometry
 * @author   Yvan Michel <yvan@scopicproject.org>
 * @link     http://www.scopicproject.org
 */
class Point
{
    /**
     * Keypoints
     *
     * @var uint
     */
    const TOP_LEFT = 1;
    const TOP_CENTER = 2;
    const RIGHT_TOP = 3;
    const RIGHT_CENTER = 4;
    const BOTTOM_RIGHT = 5;
    const BOTTOM_CENTER = 6;
    const LEFT_BOTTOM = 7;
    const LEFT_CENTER = 8;
    const CENTER_CENTER = 9;

    /**
     * X coordinate
     *
     * @var uint
     */
    private $_x = 0;

    /**
     * Y coordinate
     *
     * @var uint
     */
    private $_y = 0;

    /**
     * Constructor
     *
     * @param  uint $x X coordinate
     * @param  uint $y Y coordinate
     * @throws \InvalidArgumentException Coordinates are not unsigned integers
     */
    public function __construct($x, $y)
    {
        if (!Number::isUint($x)) {
            throw new \InvalidArgumentException('Invalid X coordinate "' . $x . '" (unsigned integer expected)');
        }

        if (!Number::isUint($y)) {
            throw new \InvalidArgumentException('Invalid Y coordinate "' . $y . '" (unsigned integer expected)');
        }

        $this->_x = Number::toUint($x);
        $this->_y = Number::toUint($y);
    }

    /**
     * Returns X coordinate
     *
     * @return uint
     */
    public function getX()
    {
        return $this->_x;
    }

    /**
     * Returns Y coordinate
     *
     * @return uint
     */
    public function getY()
    {
        return $this->_y;
    }

    /**
     * Returns coordinates
     *
     * @return array
     */
    public function getCoordinates()
    {
        return array(
            'x' => $this->_x,
            'y' => $this->_y
        );
    }

    /**
     * Checks whether a keypoint exists
     *
     * @param  uint $keypoint A keypoint
     * @return uint
     * @throws \InvalidArgumentException Keypoint does not exist
     */
    public static function check($keypoint)
    {
        if (!self::exists($keypoint)) {
            throw new \InvalidArgumentException('Keypoint does not exist');
        }

        return $keypoint;
    }

    /**
     * Tests whether a keypoint exists
     *
     * @param  uint  $keypoint A keypoint
     * @return boolean
     */
    public static function exists($keypoint)
    {
        switch ($keypoint) {
            case self::TOP_LEFT:
            case self::TOP_CENTER:
            case self::RIGHT_TOP:
            case self::RIGHT_CENTER:
            case self::BOTTOM_RIGHT:
            case self::BOTTOM_CENTER:
            case self::LEFT_BOTTOM:
            case self::LEFT_CENTER:
            case self::CENTER_CENTER:
                return true;

            default:
                return false;
        }
    }
}
