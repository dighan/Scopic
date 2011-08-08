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
 * Autoload handler
 *
 * @category Scopic
 * @package  Scopic_Autoload
 * @author   Yvan Michel <yvan@scopicproject.org>
 * @link     http://www.scopicproject.org
 */
class Scopic_Autoload
{
    /**
     * Stores Scopic autoload handler into PHP autoload stack
     */
    public static function register()
    {
        spl_autoload_register(
            array(__CLASS__, 'autoload')
        );
    }

    /**
     * Scopic autoload handler
     *
     * @param string $className Class to load
     */
    public static function autoload($className)
    {
        if (strpos($className, 'Scopic') == 0) {
            $classFile = realpath(dirname(__FILE__) . '/../') . '/' .str_replace('_', '/', $className) . '.php';

            if (file_exists($classFile)) {
                require_once $classFile;
            }
        }
    }
}

Scopic_Autoload::register();
