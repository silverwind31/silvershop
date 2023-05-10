<?php

namespace backend\controllers;

use common\components\StaticFunctions;
use common\models\SectionSlider;
use common\models\SectionSliderSearch;
use common\components\Controller;
use yii\web\NotFoundHttpException;
use Yii;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * SectionSliderController implements the CRUD actions for SectionSlider model.
 */
class SectionSliderController extends Controller
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
     * Lists all SectionSlider models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SectionSliderSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SectionSlider model.
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
     * Creates a new SectionSlider model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new SectionSlider();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                $image = UploadedFile::getInstance($model, 'image');
                if($image){
                    $model->image = StaticFunctions::saveImage($image,'section-slider',$model->id);
                }

                if($model->save()){
                    \Yii::$app->session->setFlash('success','successfully added!');
                    return $this->redirect(['index', 'id' => $model->id]);
                }else{
                    print_r($model->errors);
                }

            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SectionSlider model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oldImage = $model->image;

        if ($this->request->isPost && $model->load($this->request->post())) {
            $image = UploadedFile::getInstance($model, 'image');
            if($image){
                $model->image = StaticFunctions::saveImage($image, 'section-slider',$model->id);
                StaticFunctions::deleteImage($oldImage,'section-slider',$model->id);
            }else{
                $model->image = $oldImage;
            }
            if($model->save()){
                \Yii::$app->session->setFlash('success','successfully updated!');
                return $this->redirect(['update', 'id' => $model->id]);
            }else{
                print_r($model->errors);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SectionSlider model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SectionSlider model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return SectionSlider the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SectionSlider::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
