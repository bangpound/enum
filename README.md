[![Build Status](https://secure.travis-ci.org/dalanhurst/php-enum.png)](http://travis-ci.org/dalanhurst/php-enum)

#PHP 5.3 Enum Implementation

##Basic Usage:

    use RobotSnowfall\Enum;

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

    echo Planet::EARTH;                                // 3
    echo implode(', ', array_keys(Planet::toArray())); // 'MERCURY, VENUS, EARTH, ...'
    echo Planet::EARTH();                              // '3'
    echo Planet::EARTH()->capitalize();                // 'Earth'
