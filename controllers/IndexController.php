<?php
/**
 * Created by PhpStorm.
 * User: lewis
 * Date: 19/03/15
 * Time: 21:45
 */

namespace app\controllers;


use yii\web\Controller;
use Yii;

class IndexController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

}