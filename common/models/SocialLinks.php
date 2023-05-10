<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "social_links".
 *
 * @property int $id
 * @property string $name
 * @property string $class
 * @property string $link
 * @property int $position
 * @property int|null $order_by
 * @property int|null $status
 */
class SocialLinks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'social_links';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'class', 'link', 'position'], 'required'],
            [['position', 'order_by', 'status'], 'integer'],
            [['name', 'class', 'link'], 'string', 'max' => 255],
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
            'class' => 'Class',
            'link' => 'Link',
            'position' => 'Position',
            'order_by' => 'Order By',
            'status' => 'Status',
        ];
    }
}
