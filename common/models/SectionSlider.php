<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "section_slider".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string|null $image
 * @property string $btn_link
 * @property string $btn_text
 * @property string|null $created_date
 * @property int|null $status
 */
class SectionSlider extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'section_slider';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'btn_link', 'btn_text'], 'required'],
            [['created_date'], 'safe'],
            [['status'], 'integer'],
            [['title', 'description', 'image', 'btn_link', 'btn_text'], 'string', 'max' => 255],
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
            'description' => 'Description',
            'image' => 'Image',
            'btn_link' => 'Btn Link',
            'btn_text' => 'Btn Text',
            'created_date' => 'Created Date',
            'status' => 'Status',
        ];
    }
}
