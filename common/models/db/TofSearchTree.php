<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "tof_search_tree".
 *
 * @property integer $str_id
 * @property integer $str_id_parent
 * @property integer $str_des_id
 * @property string $str_des
 * @property integer $str_type
 * @property string $str_type_des
 * @property integer $str_level
 * @property integer $str_sort
 */
class TofSearchTree extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tof_search_tree';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['str_id'], 'required'],
            [['str_id', 'str_id_parent', 'str_des_id', 'str_type', 'str_level', 'str_sort'], 'integer'],
            [['str_des', 'str_type_des'], 'string', 'max' => 1200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'str_id' => 'Str ID',
            'str_id_parent' => 'Str Id Parent',
            'str_des_id' => 'Str Des ID',
            'str_des' => 'Str Des',
            'str_type' => 'Str Type',
            'str_type_des' => 'Str Type Des',
            'str_level' => 'Str Level',
            'str_sort' => 'Str Sort',
        ];
    }
}
