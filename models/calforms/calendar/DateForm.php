<?php
/**
 * Created by PhpStorm.
 * User: lewis
 * Date: 10/05/15
 * Time: 21:11
 */
namespace app\models\calforms\calendar;

use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class DateForm extends Model
{
    public $month;
    public $year;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            ['month', 'required'],
            ['year', 'required'],
        ];
    }

}