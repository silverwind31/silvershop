<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "product_categories".
 *
 * @property int $id
 * @property int|null $parent
 * @property string $name
 * @property string|null $image
 * @property int|null $status
 */
class ProductCategories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent', 'status'], 'integer'],
            [['name'], 'required'],
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
            'parent' => 'Parent',
            'name' => 'Name',
            'image' => 'Image',
            'status' => 'Status',
        ];
    }
    public function generateParentCategories(){
        return ArrayHelper::map(self::find()->all(),'id','name');
    }
    public function getCategoryProducts(){
        return $this->hasMany(Product::className(),['category_id'=>'id']);
    }
    public function getChildCategories(){
        return self::find()->where(['parent'=>$this->id])->all();
    }
    public function getParentCategory(){
        return self::findOne($this->parent);
    }
}
