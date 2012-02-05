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

namespace Scopic\Foundation;

/**
 * Math utilities
 *
 * @package  Scopic\Foundation
 * @author   Yvan Michel <yvan@scopicproject.org>
 * @link     http://www.scopicproject.org
 */
class Math
{
    /**
     * Tests that a number is an integer
     *
     * @param  mixed   $number
     * @return boolean
     */
    public static function isInt($number)
    {
        return is_integer($number);
    }

    /**
     * Tests that a number is a float
     *
     * @param  mixed   $number
     * @return boolean
     */
    public static function isFloat($number)
    {
        return is_float($number);
    }

    /**
     * Tests that a number is an unsigned integer (positive number)
     *
     * @param  mixed   $number
     * @return boolean
     */
    public static function isUint($number)
    {
        return is_integer($number) && ($number >= 0);
    }

    /**
     * Returns an integer number
     *
     * @param  mixed   $number
     * @return integer
     */
    public static function int($number)
    {
        return (int) $number;
    }

    /**
     * Returns a float number
     *
     * @param  mixed $number
     * @return float
     */
    public static function float($number)
    {
        return (float) $number;
    }

    /**
     * Returns an unsigned integer number
     *
     * @param  mixed   $number
     * @return integer
     */
    public static function uint($number)
    {
        $number = (int) $number;

        return ($number < 0) ? 0 : $number;
    }
}
