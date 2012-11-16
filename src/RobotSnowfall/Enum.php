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
     * @var mixed The enumeration's name
     */
    protected $_name;

    /**
     * @var mixed The enumeration's value
     */
    protected $_value;

    /**
     * @param mixed $value
     */
    protected function __construct($name, $value)
    {
        if (!is_scalar($value)) {
            throw new \BadMethodCallException('Enum values must be scalar');
        }
        $this->_name = $name;
        $this->_value = $value;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->_value;
    }

    /**
     * @static
     *
     * @return array
     */
    public static function toArray()
    {
        $reflection = new \ReflectionClass(get_called_class());
        return $reflection->getConstants();
    }

    /**
     * @static
     *
     * @param string $value The value of the enumeration
     *
     * @return Enum
     */
    public static function get($value)
    {
        $e = static::toArray();
        if (in_array($value, $e)) {
            return new static(array_search($value, $e), $value);
        }
    }

    /**
     * @static
     *
     * @param string $name      The name of the enumeration
     * @param array  $arguments Ignored
     *
     * @return Enum
     */
    public static function __callStatic($name, $arguments) {
        $e = static::toArray();
        if (in_array($name, array_keys($e))) {
            return new static($name, $e[$name]);
        }
    }
}
