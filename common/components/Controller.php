<?php
namespace common\components;

use yii\filters\AccessControl;

class Controller extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['login', 'error',],
                        'allow' => true,
                    ],
                    [

                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
}