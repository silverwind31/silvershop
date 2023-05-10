<?php


namespace frontend\controllers;

use common\components\StaticFunctions;
use common\models\Product;
use common\models\SiteUsers;
use common\models\Wishlist;
use frontend\models\LoginForm;
use frontend\models\SignupForm;
use frontend\models\SmsConfirm;
use Yii;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\Response;

class UserController extends MainController
{
    public function actionLogin(){

        if(!Yii::$app->user->isGuest){
            return $this->goHome();
        }
       $model = new LoginForm();

       if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post()) && $model->login()){
           return $this->redirect('profile');
       }
        return $this->render('login',[
            'model'=>$model
        ]);
    }
    public function actionLogout(){
        Yii::$app->user->logout();
        return $this->goHome();
    }
    public function actionProfile(){
        if($user = SiteUsers::findOne(Yii::$app->user->getId())){
            return $this->render('profile',[
                'user'=>$user
            ]);
        }else{
            return $this->redirect(['/site/error']);
        }
    }
    public function actionRegistration(){
        $model = new SignupForm();

        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post()) && $model->signup()){
            return $this->redirect(['confirm','phone'=>$model->phone]);
        }
        return $this->render('registration',[
            'model' => $model
        ]);
    }
    public function actionConfirm($phone){
        $user = SiteUsers::findOne(['phone' =>$phone]);
        $model = new SmsConfirm();

        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post()) && $model->validate()){
            $user->status = 10;
            $user->save();
            $this->redirect(['/user/login']);
        }
        return $this-> render('confirm',[
            'model'=>$model,
            'user'=>$user
        ]);
    }

    public function actionWishlist($model){

        return $this->render('wishlist');
    }
}