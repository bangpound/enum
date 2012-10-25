<?php
/**
 * PHP 5.3 Enum Implementation
 *
 * PHP version 5.3
 *
 * @package   Test
 * @author    Doug Hurst <dalan.hurst@gmail.com>
 * @copyright 2012 Doug Hurst
 * @license   http://www.opensource.org/licenses/bsd-license New BSD License
 * @link      http://github.com/dalanhurst/php-enum
 */

namespace RobotSnowfall\Test;
use \RobotSnowfall\Enum;

/**
 * Enum Test
 *
 * @package   Test
 * @author    Doug Hurst <dalan.hurst@gmail.com>
 * @copyright 2012 Doug Hurst
 * @license   http://www.opensource.org/licenses/bsd-license New BSD License
 * @link      http://github.com/dalanhurst/php-enum
 */
class EnumTest extends \PHPUnit_Framework_TestCase
{
	public function testCannotInstantiateDirectly()
	{
        $r = new \ReflectionClass('RobotSnowfall\Test\Planets');
        $this->assertFalse($r->getConstructor()->isPublic());
	}

	public function testCanGetMember()
	{
	    $this->assertEquals(2, Planets::EARTH);
	}

	public function testCanGetAssocArray()
	{
        $planets = Planets::toArray();
        $this->assertEquals(0, $planets['MERCURY']);
        $this->assertEquals(1, $planets['VENUS']);
        $this->assertEquals(2, $planets['EARTH']);
        $this->assertEquals(3, $planets['MARS']);
        $this->assertEquals(4, $planets['JUPITER']);
        $this->assertEquals(5, $planets['SATURN']);
        $this->assertEquals(6, $planets['URANUS']);
        $this->assertEquals(7, $planets['NEPTUNE']);
	}
}

class Planets extends Enum{
    const MERCURY = 0;
    const VENUS = 1;
    const EARTH = 2;
    const MARS = 3;
    const JUPITER = 4;
    const SATURN = 5;
    const URANUS = 6;
    const NEPTUNE = 7;
}
