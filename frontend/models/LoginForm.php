<?php


namespace frontend\models;


use common\models\SiteUsers;
use Yii;
use yii\base\Model;

class LoginForm extends Model
{
    public $phone;
    public $password;
    /**
     * @var mixed
     */
    public $_user;
    
    public function rules(){
        return [
            [['phone','password'], 'required'],
            ['password','validatePassword']
        ];
    }
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = SiteUsers::findByPhone($this->phone);
        }

        return $this->_user;
    }
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), 3600 * 24 * 30);
        }

        return false;
    }

    public function attributeLabels()
    {
        return[
          'phone'=>'Phone number',
          'password'=>'Password'
        ];
    }


}