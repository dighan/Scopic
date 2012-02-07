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
 * Size representation
 *
 * @package  Scopic\Geometry
 * @author   Yvan Michel <yvan@scopicproject.org>
 * @link     http://www.scopicproject.org
 */
class Size
{
    /**
     * Width
     *
     * @var uint
     */
    private $_width = 0;

    /**
     * Height
     *
     * @var uint
     */
    private $_height = 0;

    /**
     * Constructor
     *
     * @param  uint $width  Width
     * @param  uint $height Height
     * @throws \InvalidArgumentException Sizes are not unsigned integers
     */
    public function __construct($width, $height)
    {
        if (!Math::isUint($width)) {
            throw new \InvalidArgumentException('Invalid width "' . $width . '" (unsigned integer expected)');
        }

        if (!Math::isUint($height)) {
            throw new \InvalidArgumentException('Invalid height "' . $height . '" (unsigned integer expected)');
        }

        $this->_width = Math::uint($width);
        $this->_height = Math::uint($height);
    }

    /**
     * Returns width
     *
     * @return uint
     */
    public function getWidth()
    {
        return $this->_width;
    }

    /**
     * Returns height
     *
     * @return uint
     */
    public function getHeight()
    {
        return $this->_height;
    }

    /**
     * Returns sizes
     *
     * @return array
     */
    public function getSizes()
    {
        return array(
            'width' => $this->_width,
            'height' => $this->_height
        );
    }
}
