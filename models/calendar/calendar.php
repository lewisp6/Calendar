<?php
/**
 * Created by PhpStorm.
 * User: lewis
 * Date: 22/03/15
 * Time: 13:21
 */
namespace app\models\calendar;

class calendar {
    public function getDaysForMonth($month, $year)
    {
        if (!$month || !$year)
        {
            throw new \InvalidArgumentException("No month or year supplied");
        }

        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        return $daysInMonth;
    }
}
