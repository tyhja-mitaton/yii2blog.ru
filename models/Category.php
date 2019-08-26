<?php


namespace app\models;;


use Yii;
use yii\db\ActiveRecord;

/**
 *@property int id
 *@property string $title
 *@property int $parent_id
 */
class Category extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%category}}';
    }

    public function rules()
    {
        return [
            [['title'], 'string', 'max' => 255],
            [['title'], 'required'],
            ['parent_id', 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'title' => 'Категория',
            'parent.title' => 'Родительская категория',
        ];
    }


}