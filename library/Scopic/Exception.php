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

/**
 * Base exception class
 *
 * @category Scopic
 * @package  Scopic_Exception
 * @author   Yvan Michel <yvan@scopicproject.org>
 * @link     http://www.scopicproject.org
 */
class Scopic_Exception extends Exception
{
    /**
     * Constructor
     *
     * @param object $thrower Object that throws the exception
     * @param string $message Exception message
     */
    public function __construct($thrower, $message)
    {
        parent::__construct(
            self::formatMessage($thrower, $message)
        );
    }

    /**
     * Returns a formatted exception message (make message more verbose)
     *
     * @param  object $thrower Object that throws the exception
     * @param  string $message Exception message
     * @return string
     */
    public static function formatMessage($thrower, $message)
    {
        $throwerClassName = is_object($thrower) ? get_class($thrower) : 'Unknown';

        return sprintf('[%s] %s', $throwerClassName, $message);
    }
}
