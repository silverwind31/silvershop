<?php


namespace common\components;


use common\models\Menu;
use Yii;
use yii\helpers\FileHelper;

class StaticFunctions
{
    public static function saveImage($image,$modelType,$modelId){
        $fileName = "photo" . md5($image->baseName . time() . rand(1,100000));
        $fileName .= "." . $image->extension;
        $dir = Yii::getAlias("@frontend") . "/web/uploads/{$modelType}/{$modelId}/";
        if(!is_dir($dir)){
            FileHelper::createDirectory($dir);
        }
        if($image->saveAs($dir.$fileName)){
            return$fileName;
        }
    }
    public static function getImage($imageName,$modelType,$modelId){
        $file = Yii::getAlias("@frontend") . "/web/uploads/{$modelType}/{$modelId}/{$imageName}";
        if(is_file($file)){
            return Yii::$app->params['frontend'] . "/uploads/{$modelType}/{$modelId}/{$imageName}";
        }
        return Yii::$app->params['frontend'] . "/images/no_photo.png";
    }
    public static function deleteImage($imageName,$modelType,$modelId){
        $file = Yii::getAlias("@frontend") . "/web/uploads/{$modelType}/{$modelId}/{$imageName}";
        if(is_file($file)){
            unlink($file);
        }
    }
    public static function renderMenu($id){
        $out = '';
        $menu = Menu::findOne($id);
        $query = Menu::find()->where(['parent'=>$menu->id,'status'=>1]);

        if($query->exists()){
            $out .= "<li><a href='#'>{$menu->title}</a>";
            $out .= '<ul>';
            $items = $query->orderBy(['order_by'=>SORT_ASC])->all();

            foreach ($items as $item){
                $out .= self::renderMenu($item->id);
            }
            $out .="</ul>";
        }else{
            $out .= "<li><a href='{$menu->link}'>{$menu->title}</a></li>";
        }
        return $out;
    }
}