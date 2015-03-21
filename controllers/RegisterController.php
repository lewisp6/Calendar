<?php
/**
 * Created by PhpStorm.
 * User: lewis
 * Date: 19/03/15
 * Time: 20:46
 */

namespace app\controllers;

use app\models\calforms\RegistrationForm;
use app\models\db\ActiveRecord\User;
use Yii;
use yii\web\Controller;

class RegisterController extends Controller
{
    public function actionIndex()
    {
        $registrationForm = new RegistrationForm();

        if ($registrationForm->load(Yii::$app->request->post()) && $registrationForm->validate()) {
            $user = new User();
            $user->register($registrationForm->email, $registrationForm->password);

            return $this->redirect('/login');
        }

        return $this->render('register', [
            'model' => $registrationForm
            ]);
    }
}