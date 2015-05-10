<?php

namespace app\models\calforms;

use app\models\db\ActiveRecord\User;
use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class LoginForm extends Model
{
    public $email;
    public $password;

    private $_user = false;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!password_verify($this->password, $user->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided email and password.
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            $session = Yii::$app->session;
            $session->set('user_id', $this->getUser()->user_id);
        } else {
            return false;
        }
    }

    /**
     * Finds user by email
     *
     * @return user|null
     */
    public function getUser()
    {
        $user = new user();
        if ($this->_user === false) {
            $this->_user = $user->findByEmail($this->email);
        }

        return $this->_user;
    }
}
