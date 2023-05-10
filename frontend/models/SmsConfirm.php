<?php


namespace frontend\models;


use common\models\SiteUsers;
use yii\base\Model;

class SmsConfirm extends Model
{
    public $smsCode;
    public $phone;

    public function rules()
    {
        return[
          ['smsCode', 'required'],
          ['smsCode','string','min'=>4, 'max'=>4],
          ['smsCode','verifyCode'],

            ['phone','safe']
        ];
    }
    public function verifyCode($attribute, $params)
    {
        if (!$this->hasErrors()) {
            if ($this->getPhoneSmsCode() != $this->smsCode) {
                $this->addError($attribute, 'Incorrect sms code!');
            }
        }
    }
    public function getPhoneSmsCode(){
        return SiteUsers::findOne(['phone'=>$this->phone])->sms_verification;
    }
}