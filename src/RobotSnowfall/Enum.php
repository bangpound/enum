<?php
/**
 * PHP 5.3 Enum Implementation
 *
 * PHP version 5.3
 *
 * @package   Enum
 * @author    Doug Hurst <dalan.hurst@gmail.com>
 * @copyright 2012 Doug Hurst
 * @license   http://www.opensource.org/licenses/bsd-license New BSD License
 * @link      http://github.com/dalanhurst/php-enum
 */

namespace RobotSnowfall;

/**
 * PHP 5.3 Enum Implementation
 *
 * @package   Enum
 * @author    Doug Hurst <dalan.hurst@gmail.com>
 * @copyright 2012 Doug Hurst
 * @license   http://www.opensource.org/licenses/bsd-license New BSD License
 * @link      http://github.com/dalanhurst/php-enum
 */
abstract class Enum
{
    /**
     * Enum->toArray() using reflection and late static binding
     *
     * @return array
     */
    final public static function toArray()
    {
        $reflection = new \ReflectionClass(get_called_class());
        return $reflection->getConstants();
    }

    /**
     * Disable Construction
     */
    final protected function __construct()
    {
    }
}
