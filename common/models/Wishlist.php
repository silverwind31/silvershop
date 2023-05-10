<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "wishlist".
 *
 * @property int $id
 * @property int $user_id
 * @property string $product_ids
 * @property string|null $created_date
 */
class Wishlist extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wishlist';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'product_ids'], 'required'],
            [['user_id'], 'integer'],
            [['created_date'], 'safe'],
            [['product_ids'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'product_ids' => 'Product Ids',
            'created_date' => 'Created Date',
        ];
    }
    
}
