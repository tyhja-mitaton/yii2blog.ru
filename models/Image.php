<?php


namespace app\models;


use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property int $post_id
 * @property string $path
 */
class Image extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%image}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
       return [
           [['path'], 'string'],
           [['post_id'], 'required'],
           [['post_id'], 'integer'],
           [['path'], 'required'],
       ];
    }

}