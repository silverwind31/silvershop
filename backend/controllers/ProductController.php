<?php

namespace backend\controllers;

use common\components\StaticFunctions;
use common\models\Model;
use common\models\Product;
use common\models\ProductChar;
use common\models\ProductGallery;
use common\models\ProductSearch;
use Yii;
use yii\db\Exception;
use yii\helpers\ArrayHelper;
use common\components\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
        );
    }

    /**
     * Lists all Product models.
     *
     * @return string
     */
    public function actionIndex()
    {
        if(Yii::$app->request->isPost){
            $deletedIds = Yii::$app->request->post('deleted_ids');
            $deletedIdsArr = explode(',',$deletedIds);
            array_pop($deletedIdsArr);
            Product::deleteAll(['id'=>$deletedIdsArr]);
        }


        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|Response
     */
    public function actionCreate()
    {
        $model = new Product();
        $productChars = [new ProductChar()];


        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {

                $productChars = Model::createMultiple(ProductChar::classname());
                Model::loadMultiple($productChars, Yii::$app->request->post());

                // ajax validation
                if (Yii::$app->request->isAjax) {
                    Yii::$app->response->format = Response::FORMAT_JSON;
                    return ArrayHelper::merge(
                        ActiveForm::validateMultiple($productChars),
                        ActiveForm::validate($model)
                    );
                }

                $valid = $model->validate();
                $valid = Model::validateMultiple($productChars) && $valid;

                if ($valid) {
                    $transaction = \Yii::$app->db->beginTransaction();
                    try {
                        if ($flag = $model->save(false)) {
                            foreach ($productChars as $productChar) {
                                $productChar->product_id = $model->id;
                                if (! ($flag = $productChar->save(false))) {
                                    $transaction->rollBack();
                                    break;
                                }
                            }
                        }
                        if ($flag) {
                            $transaction->commit();

                        }
                    } catch (Exception $e) {
                        $transaction->rollBack();
                    }
                }


                # Main image
                $image = UploadedFile::getInstance($model,'image');
                if($image){
                    $model->image = StaticFunctions::saveImage($image,'product',$model->id);
                }
                # Images gallery
                $productGallery = UploadedFile::getInstances($model,'galleryImages');
                if($productGallery){
//                    echo '<pre>';
//                    print_r($productGallery);die;
                    foreach ($productGallery as $item){
                        $productImage = new ProductGallery();
                        $productImage->product_id= $model->id;
                        $productImage->image = StaticFunctions::saveImage($item,'product', $model->id);
                        $productImage->save();
                    }
                }
                if($model->save()){
                    return $this->redirect(['index']);
                }else{
                    print_r($model->errors);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'productChars'=>(empty($productChars)) ? [new ProductChar()] : $productChars
        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $oldImage = $model->image;
        $productChars = $model->productChars;
        if ($this->request->isPost && $model->load($this->request->post())) {

            $oldIDs = ArrayHelper::map($productChars, 'id', 'id');
            $productChars = Model::createMultiple(ProductChar::classname(), $productChars);
            Model::loadMultiple($productChars, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($productChars, 'id', 'id')));

            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($productChars),
                    ActiveForm::validate($model)
                );
            }

            $valid = $model->validate();
            $valid = Model::validateMultiple($productChars) && $valid;


            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (! empty($deletedIDs)) {
                            ProductChar::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($productChars as $productChar) {
                            $productChar->product_id = $model->id;
                            if (! ($flag = $productChar->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();

                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }

            $image = UploadedFile::getInstance($model,'image');
            if($image){
                $model->image = StaticFunctions::saveImage($image,'product',$model->id);
                StaticFunctions::deleteImage($oldImage,'product',$model->id);
            }else{
                $model->image = $oldImage;
            }
            # Images gallery
            $productGallery = UploadedFile::getInstances($model,'galleryImages');
            if($productGallery){
//                    echo '<pre>';
//                    print_r($productGallery);die;
                foreach ($productGallery as $item){
                    $productImage = new ProductGallery();
                    $productImage->product_id= $model->id;
                    $productImage->image = StaticFunctions::saveImage($item,'product', $model->id);
                    $productImage->save();
                }
            }

            if($model->save()){
                return $this->redirect(['index', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'productChars'=>(empty($productChars)) ? [new ProductChar()] : $productChars,
        ]);
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionDeleteImage(){
        $id = Yii::$app->request->post()['key'];
        $image = ProductGallery::findOne($id);
        $image->delete();
        return true;
    }
}
