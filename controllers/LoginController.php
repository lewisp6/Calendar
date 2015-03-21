<?php
/**
 * Created by PhpStorm.
 * User: lewis
 * Date: 19/03/15
 * Time: 21:45
 */

namespace app\controllers;


use app\models\calforms\LoginForm;
use yii\web\Controller;
use Yii;


class LoginController extends Controller
{

    public function actionIndex()
    {
        $loginForm = new LoginForm();

        if ($loginForm->load(Yii::$app->request->post()) && $loginForm->login()) {
            $this->redirect('/');
        } else {
            return $this->render('login', ['model' => $loginForm]);
        }
    }

}