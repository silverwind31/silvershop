<?php

namespace common\models;

use common\components\StaticFunctions;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $category_id
 * @property int $brand_id
 * @property float|null $new_price
 * @property float|null $old_price
 * @property int|null $new
 * @property int|null $top
 * @property int|null $sale
 * @property string|null $image
 * @property string|null $created_date
 * @property string|null $updated_date
 * @property int|null $status
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $galleryImages;
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'category_id','brand_id'], 'required'],
            [['brand_id','category_id','new', 'top', 'sale', 'status'], 'integer'],
            [['new_price', 'old_price'], 'number'],
            [['created_date', 'updated_date', 'galleryImages','description'], 'safe'],
            [['name', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'category_id' => 'Category ID',
            'brand_id'=> 'Brand ID',
            'new_price' => 'New Price',
            'old_price' => 'Old Price',
            'new' => 'New',
            'top' => 'Top',
            'sale' => 'Sale',
            'image' => 'Image',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated Date',
            'status' => 'Status',
            'description'=> 'Description'
        ];
    }

    public function getProductCategories(){
        return ArrayHelper::map(ProductCategories::find()->all(),'id','name');
    }
    public function getAllBrands(){
        return ArrayHelper::map(Brand::find()->all(),'id','name');
    }

    public function getProductCategoryName(){
        return $this->hasOne(ProductCategories::className(),['id'=>'category_id']);
    }
    public function getGalleryPreview(){
        $images = ProductGallery::find()->where(['product_id'=>$this->id])->all();

        $result = [];

        foreach ($images as $image){
            $result[] = StaticFunctions::getImage($image->image, 'product', $this->id);
        }
        return $result;
    }
    public function getGalleryConfig(){
        $images = ProductGallery::find()->where(['product_id' => $this->id])->all();
        $result = [];
        foreach ($images as $image){
            $result[] = [
                'key' => $image->id,
                'url' => Url::to(['/product/delete-image'])
            ];
        }

        return $result;
    }
    public function getProductChars(){
        return $this->hasMany(ProductChar::className(),['product_id'=>'id']);
    }
    public function getRelatedProducts(){
        return self::find()->where(['category_id'=>$this->category_id])->andWhere(['!=','id',$this->id])->limit(3)->all();
    }

}
