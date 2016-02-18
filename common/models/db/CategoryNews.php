<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "category_news".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $name
 * @property string $key
 * @property string $descr
 */
class CategoryNews extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category_news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'key', 'descr'], 'required'],
            [['parent_id'], 'integer'],
            [['descr'], 'string'],
            [['name', 'key'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'name' => 'Название',
            'key' => 'Название латиницей',
            'descr' => 'Описание',
        ];
    }
}
