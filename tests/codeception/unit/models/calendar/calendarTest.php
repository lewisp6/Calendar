<?php
/**
 * Created by PhpStorm.
 * User: lewis
 * Date: 10/05/15
 * Time: 20:46
 */

namespace tests\codeception\unit\models;

use app\models\calendar\calendar;
use yii\codeception\TestCase;

class calendarTest extends TestCase {

    public function testGetDaysInFeb2014()
    {
        $calendar = new calendar();
        $daysInMonth = $calendar->getDaysForMonth(2, 2014);

        $this->assertEquals(28, $daysInMonth);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testGetDaysNoYear()
    {
        $calendar = new calendar();
        $calendar->getDaysForMonth(8, null);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testGetDaysNoMonth()
    {
        $calendar = new calendar();
        $calendar->getDaysForMonth(null, 2015);
    }

}
