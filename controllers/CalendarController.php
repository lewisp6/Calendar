<?php
/**
 * Created by PhpStorm.
 * User: lewis
 * Date: 22/03/15
 * Time: 12:13
 */

namespace app\controllers;

use app\models\calendar\calendar;
use app\models\calforms\calendar\DateForm;
use yii\web\Controller;
use Yii;

class CalendarController extends Controller
{

    public function actionIndex()
    {
        $calendar = new calendar();
        $dateForm = new DateForm();

        $monthYear = $calendar->setMonthYear();

        if ($dateForm->load(Yii::$app->request->post()) && $dateForm->validate()) {
            $monthYear = $calendar->setMonthYear($dateForm->month, $dateForm->year);
        }

        $numberOfDays = $calendar->getDaysForMonth($monthYear['month'], $monthYear['year']);

        return $this->render('calendar', [
            'numberOfDays' => $numberOfDays,
            'dateForm'     => $dateForm
        ]);
    }
}
