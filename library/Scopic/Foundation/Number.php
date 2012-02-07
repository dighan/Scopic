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
 * Number utility
 *
 * @package  Scopic\Foundation
 * @author   Yvan Michel <yvan@scopicproject.org>
 * @link     http://www.scopicproject.org
 */
class Number
{
    /**
     * Tests whether a number is an integer
     *
     * @param  mixed $number
     * @return bool
     */
    public static function isInt($number)
    {
        return is_integer($number);
    }

    /**
     * Tests whether a number is a float
     *
     * @param  mixed $number
     * @return bool
     */
    public static function isFloat($number)
    {
        return is_float($number);
    }

    /**
     * Tests whether a number is an unsigned integer
     *
     * @param  mixed $number
     * @return bool
     */
    public static function isUint($number)
    {
        return is_integer($number) && ($number >= 0);
    }

    /**
     * Converts a number to an integer
     *
     * @param  mixed $number
     * @return int
     */
    public static function toInt($number)
    {
        return (int) $number;
    }

    /**
     * Converts a number to a float
     *
     * @param  mixed $number
     * @return float
     */
    public static function toFloat($number)
    {
        return (float) $number;
    }

    /**
     * Converts a number to an unsigned integer
     *
     * @param  mixed $number
     * @return int
     */
    public static function toUint($number)
    {
        $number = (int) $number;

        return ($number < 0) ? 0 : $number;
    }
}
