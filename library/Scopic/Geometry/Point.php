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

use Scopic\Foundation\Math;

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
     * @var integer
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
     * @var integer
     */
    private $_x = 0;

    /**
     * Y coordinate
     *
     * @var integer
     */
    private $_y = 0;

    /**
     * Constructor
     *
     * @param  uint $x X coordinate
     * @param  uint $y Y coordinate
     * @throws \InvalidArgumentException Coordinates are not unsigned integer
     */
    public function __construct($x, $y)
    {
        if (!Math::isUint($x)) {
            throw new \InvalidArgumentException('Invalid X coordinate "' . $x . '" (unsigned integer expected)');
        }

        if (!Math::isUint($y)) {
            throw new \InvalidArgumentException('Invalid Y coordinate "' . $y . '" (unsigned integer expected)');
        }

        $this->_x = Math::uint($x);
        $this->_y = Math::uint($y);
    }

    /**
     * Moves current coordinates
     *
     * @param uint $newX New X coordinate
     * @param uint $newY New Y coordinate
     */
    public function move($newX, $newY)
    {
        $this->_x = Math::uint($newX);
        $this->_y = Math::uint($newY);
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
     * Checks that a keypoint exists
     *
     * @param  integer $keypoint A keypoint
     * @return integer
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
     * Tests that a keypoint exists
     *
     * @param  integer $keypoint A keypoint
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
