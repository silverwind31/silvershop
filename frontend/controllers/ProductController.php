<?php


namespace frontend\controllers;


use common\components\StaticFunctions;
use common\models\Cart;
use common\models\Product;
use common\models\ProductCategories;
use common\models\Regions;
use common\models\ShopOrder;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\helpers\Url;

class ProductController extends MainController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [

                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
    public function actionAddToCart($id){
        $product = Product::findOne($id);
        $cart = new Cart();
        $cart->addToCart($product);
        $productData['name'] = $product->name;
        $productData['image'] = StaticFunctions::getImage($product->image,'product',$product->id);
        return Json::encode($productData);
    }

    public function actionCart(){
        return $this->renderAjax('cart');
    }
    public function actionClearCart(){
        unset($_SESSION['cart']);
        return $this->redirect('basket');
    }

    public function actionTotalCount(){
        if(!empty($_SESSION['cart']['total_count'])){
            return $_SESSION['cart']['total_count'];
        }
        return 0;
    }
    public function actionCategory($id){

        if($category = ProductCategories::findOne($id)){
            $child = ProductCategories::find()->where(['parent'=>$category->id])->all();

            if(!empty($child)){
                $childIds = ArrayHelper::map($child,'id','id');
                $subChild = ProductCategories::find()->where(['parent'=>$childIds])->all();

                if($subChild){
                    $subChildIds = ArrayHelper::map($subChild,'id','id');
                    $products = Product::find()->where(['category_id'=>$subChildIds]);
                }else{
                    $products = Product::find()->where(['category_id'=>$childIds]);
                }


            }else{
                $products = Product::find()->where(['category_id'=>$category->id]);
            }
        }else{
            return $this->redirect(['/site/error']);
        }



        $minPrice = \Yii::$app->request->get('min_price');
        if(!empty($minPrice)){
            $products->andFilterWhere(['>=','new_price',$minPrice]);
        }

        $maxPrice = \Yii::$app->request->get('max_price');
        if(!empty($maxPrice)){
            $products->andFilterWhere(['<=','new_price',$maxPrice]);
        }
        $brands = \Yii::$app->request->get('brands');
        if(!empty($brands)){
            $products->andFilterWhere(['brand_id'=>$brands]);
        }
        $sort = \Yii::$app->request->get('orderby');
        if(!empty($sort)){
            switch ($sort){
                case 'price-low':
                $products->orderBy(['new_price'=>SORT_ASC]);

                break;
                case 'price-high':
                    $products->orderBy(['new_price'=>SORT_DESC]);

                break;
            }
        }
        $products = $products->all();
        return $this->render('category',[
            'category'=>$category,
            'child'=>$child,
            'products'=>$products,
        ]);
    }
    public function actionDeleteItem($id){
        $id = \Yii::$app->request->get('id');
    }
    public function actionView($id){
        if($model = Product::findOne($id)){

            $category = ProductCategories::findOne($model->category_id);
            return $this->render('view',[
                'model'=>$model,
                'category'=>$category
            ]);
        }
        return $this->goHome();
    }
    public function actionBasket(){
        return $this->render('basket');
    }
    public function actionCheckout(){
        $model = new ShopOrder();
        if(\Yii::$app->request->isPost && $model->load(\Yii::$app->request->post() && $model->save())){
            return $this->redirect(Url::home());
        }
        return $this->render('checkout',[
            'model'=>$model
        ]);
    }
    public function actionIncreaseProduct($id){
        $product = Product::findOne($id);
        $cart = new Cart();
        $cart -> addToCart($product,1);
        return $this->redirect('basket');
    }
    public function actionDecreaseProduct($id){
        $product = Product::findOne($id);
        $cart = new Cart();
        $cart -> addToCart($product,-1);
        return $this->redirect('basket');
    }
    public function actionRegion(){
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if (isset($_POST['depdrop_parents'])) {
            $ids = $_POST['depdrop_parents'];
            $districtId = empty($ids[0]) ? null : $ids[0];
            if ($districtId != null) {
                $regions = Regions::find()->where(['district_id'=>$districtId])->all();
                $result = [];
                foreach ($regions as $region){
                    array_push($result,[
                        'id'=> $region -> id,
                        'name'=>$region -> name
                    ]);
                }

                return ['output'=>$result, 'selected'=>''];
            }
        }
        return ['output'=>'', 'selected'=>''];
    }

}