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

use Scopic\Geometry\Point,
    Scopic\Geometry\Size;

/**
 * Rectangle representation
 *
 * @package  Scopic\Geometry
 * @author   Yvan Michel <yvan@scopicproject.org>
 * @link     http://www.scopicproject.org
 */
class Rectangle
{
    /**
     * Origin point
     *
     * @var Scopic\Geometry\Point
     */
    private $_origin = null;

    /**
     * Size
     *
     * @var Scopic\Geometry\Size
     */
     private $_size = null;

     /**
      * Constructor
      *
      * @todo Add constructor prototypes doc
      */
    public function __construct()
    {
        $args = func_get_args();
        $numArgs = func_num_args();

        if ($numArgs == 4) {
            $this->_origin = new Point($args[0], $args[1]);
            $this->_size = new Size($args[2], $args[3]);
        } else if ($numArgs == 2) {
            if (!($args[0] instanceof Point)) {
                throw new \InvalidArgumentException('Invalid origin (Scopic\Geometry\Point instance expected)');
            }

            if (!($args[1] instanceof Size)) {
                throw new \InvalidArgumentException('Invalid size (Scopic\Geometry\Size instance expected)');
            }

            $this->_origin = $args[0];
            $this->_size = $args[1];
        } else {
            throw new \InvalidArgumentException('Invalid constructor prototype');
        }
    }

    /**
     * Returns origin
     *
     * @return Scopic\Geometry\Point
     */
    public function getOrigin()
    {
        return $this->_origin;
    }

    /**
     * Returns size
     *
     * @return Scopic\Geometry\Size
     */
    public function getSize()
    {
        return $this->_size;
    }

    /**
     * Returns a keypoint
     *
     * @return Scopic\Geometry\Point
     */
     public function getKeypoint($keypoint)
     {
        $keypoint = Point::check($keypoint);

        switch ($keypoint) {
            case Point::TOP_LEFT:
                $keypoint = $this->_origin;
                break;

            case Point::TOP_CENTER:
                $keypoint = new Point(
                    $this->_origin->getX() + (int) ($this->_size->getWidth() / 2),
                    $this->_origin->getY()
                );
                break;

            case Point::RIGHT_TOP:
                $keypoint = new Point(
                    $this->_origin->getX() + $this->_size->getWidth(),
                    $this->_origin->getY()
                );
                break;

            case Point::RIGHT_CENTER:
                $keypoint = new Point(
                    $this->_origin->getX() + $this->_size->getWidth(),
                    $this->_origin->getY() + (int) ($this->_size->getHeight() / 2)
                );
                break;

            case Point::BOTTOM_RIGHT:
                $keypoint = new Point(
                    $this->_origin->getX() + $this->_size->getWidth(),
                    $this->_origin->getY() + $this->_size->getHeight()
                );
                break;

            case Point::BOTTOM_CENTER:
                $keypoint = new Point(
                    $this->_origin->getX() + (int) ($this->_size->getWidth() / 2),
                    $this->_origin->getY() + $this->_size->getHeight()
                );
                break;

            case Point::LEFT_BOTTOM:
                $keypoint = new Point(
                    $this->_origin->getX(),
                    $this->_origin->getY() + $this->_size->getHeight()
                );
                break;

            case Point::LEFT_CENTER:
                $keypoint = new Point(
                    $this->_origin->getX(),
                    $this->_origin->getY() + (int) ($this->_size->getHeight() / 2)
                );
                 break;

            case Point::CENTER_CENTER:
                $keypoint = new Point(
                    $this->_origin->getX() + (int) ($this->_size->getWidth() / 2),
                    $this->_origin->getY() + (int) ($this->_size->getHeight() / 2)
                );
                break;
        }

        return $keypoint;
    }
}
