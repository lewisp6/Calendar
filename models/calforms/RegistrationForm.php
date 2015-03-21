<?php

namespace app\models\calforms;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class RegistrationForm extends Model
{
    public $email;
    public $password;
    public $passwordConfirmation;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['email', 'password', 'passwordConfirmation'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],

            // password and password confirmation must match
            ['passwordConfirmation', 'compare', 'compareAttribute' => 'password']
        ];
    }
}
