<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "advantages".
 *
 * @property int $id
 * @property string $icon
 * @property string $title
 * @property string $description
 * @property int|null $order_by
 * @property int $status
 */
class Advantages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'advantages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['icon', 'title', 'description'], 'required'],
            [['order_by', 'status'], 'integer'],
            [['icon', 'title', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'icon' => 'Icon',
            'title' => 'Title',
            'description' => 'Description',
            'order_by' => 'Order By',
            'status' => 'Status',
        ];
    }
}
