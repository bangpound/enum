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
        $r = new \ReflectionClass('RobotSnowfall\Test\Planet');
        $this->assertFalse($r->getConstructor()->isPublic());
	}

	public function testCanGetMember()
	{
	    $this->assertEquals(3, Planet::EARTH);
	}

	public function testCanGetAssocArray()
	{
        $planets = Planet::toArray();
        $this->assertEquals(1, $planets['MERCURY']);
        $this->assertEquals(2, $planets['VENUS']);
        $this->assertEquals(3, $planets['EARTH']);
        $this->assertEquals(4, $planets['MARS']);
        $this->assertEquals(5, $planets['JUPITER']);
        $this->assertEquals(6, $planets['SATURN']);
        $this->assertEquals(7, $planets['URANUS']);
        $this->assertEquals(8, $planets['NEPTUNE']);
	}

    public function testCanGetEnumObjectByName()
    {
        $this->assertInstanceOf('RobotSnowfall\Test\Planet', Planet::EARTH());
    }

    public function testCanGetEnumObjectByValue()
    {
        $earth = Planet::EARTH;
        $this->assertInstanceOf('RobotSnowfall\Test\Planet', Planet::get($earth));
    }

    public function testCanCastEnumObjectToString()
    {
        $this->assertInternalType('string', (string) Planet::EARTH());
        $this->assertEquals('3', (string) Planet::EARTH());
    }

    public function testCallMethodsOnEnumObject()
    {
        $this->assertEquals('Earth', Planet::EARTH()->capitalize());
    }
}

class Planet extends Enum
{
    const MERCURY = 1;
    const VENUS = 2;
    const EARTH = 3;
    const MARS = 4;
    const JUPITER = 5;
    const SATURN = 6;
    const URANUS = 7;
    const NEPTUNE = 8;

    /**
     * @return int
     */
    public function getPositionFromSun() {
        return $this->_value;
    }

    /**
     * @return string
     */
    public function capitalize() {
        return ucfirst(strtolower($this->_name));
    }

}
