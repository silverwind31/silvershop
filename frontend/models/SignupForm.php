<?php

namespace frontend\models;

use common\models\SiteUsers;
use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $phone;
    public $password;
    public $rePassword;
    public $username;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['phone', 'trim'],
            ['phone', 'required'],
            ['phone', 'unique', 'targetClass' => '\common\models\SiteUsers', 'message' => 'This username has already been taken.'],
            ['phone', 'string', 'min' => 2, 'max' => 20],

            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\SiteUsers', 'message' => 'This phone number has already been registrated.'],
            ['username', 'string', 'max' => 255],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['rePassword', 'required'],
            ['rePassword', 'string', 'min' => 6],
            ['rePassword','validateRePassword']
        ];
    }
    public function validateRePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            if ($this->password != $this->rePassword) {
                $this->addError($attribute, 'Incorrect password.');
            }
        }
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new SiteUsers();
        $user->phone = $this->phone;
        $user->username = $this->username;
        $user->setPassword($this->password);
        $user->sms_verification = rand(1000,9999);

       if($user->save()){
           return true;
       }else{
           print_r($user->errors);
       }

    }

    public function attributeLabels()
    {
        return[
            'phone'=>'Phone number',
            'password'=>'Enter your password',
            'rePassword'=>'Retry your password',
            'username'=>'Username'

        ];
    }
}
