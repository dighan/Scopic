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
 * Thrown when a determinant operation cannot be done during runtime
 *
 * @category Scopic
 * @package  Scopic_Exception
 * @author   Yvan Michel <yvan@scopicproject.org>
 * @link     http://www.scopicproject.org
 */
class Scopic_Exception_Runtime extends RuntimeException
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
            Scopic_Exception::formatMessage($thrower, $message)
        );
    }
}
