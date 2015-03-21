<?php

namespace app\models\db\ActiveRecord;

use yii\db\ActiveRecord;

/*
* @property string $user_id
* @property string $email
* @property string $password
*/

class User extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    public function register($email, $password)
    {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $this->email = $email;
        $this->password = $passwordHash;
        $this->save();
    }

    public function findByEmail($email)
    {
        return $this::find()->where(['email' => $email])->one();
    }
}
