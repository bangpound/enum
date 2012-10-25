#PHP 5.3 Enum Implementation

##Basic Usage:

    class Planets extends \RobotSnowfall\Enum
    {
        const MERCURY = 0;
        const VENUS = 1;
        const EARTH = 2;
        const MARS = 3;
        const JUPITER = 4;
        const SATURN = 5;
        const URANUS = 6;
        const NEPTUNE = 7;
    }

    echo Planets::EARTH;                      // 2
    foreach (Planets::toArray() as $planet) {
        echo $planet;                         // MERCURY, VENUS, EARTH, etc.
    };
