<?php

namespace tests\codeception\unit\models;

use app\models\db\ActiveRecord\User;
use yii\codeception\TestCase;

class UserTest extends TestCase
{
    public function testValidatePasswordTrue()
    {
        $user = new User();
        $user->password = 'password';

        $this->assertTrue($user->validatePassword('password'));
    }

    public function testValidatePasswordFalse()
    {
        $user = new User();
        $user->password = 'djifosjfisd';
        $this->assertFalse($user->validatePassword('password'));
    }
}
