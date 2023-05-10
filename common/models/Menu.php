<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "menu".
 *
 * @property int $id
 * @property string $title
 * @property string $link
 * @property int $position
 * @property int|null $order_by
 * @property int|null $parent
 * @property int $status
 */
class Menu extends \yii\db\ActiveRecord
{
    const HEADER_MENU = 1;
    const FOOTER_MENU = 2;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'link', 'position'], 'required'],
            [['position', 'order_by', 'parent', 'status'], 'integer'],
            [['title', 'link'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'link' => 'Link',
            'position' => 'Position',
            'order_by' => 'Order By',
            'parent' => 'Parent',
            'status' => 'Status',
        ];
    }
    public function getParentElements(){
        return ArrayHelper::map(self::find()->where(['parent'=>null])->all(), 'id','title');
    }
}
