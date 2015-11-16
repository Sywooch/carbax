<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "tof_models".
 *
 * @property integer $mod_id
 * @property integer $mod_mfa_id
 * @property string $mod_name
 * @property string $mod_name_eng
 * @property integer $mod_pcon_start
 * @property integer $mod_pcon_end
 * @property integer $mod_pc
 * @property integer $mod_cv
 * @property integer $mod_axl
 */
class TofModels extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tof_models';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mod_id', 'mod_mfa_id'], 'required'],
            [['mod_id', 'mod_mfa_id', 'mod_pcon_start', 'mod_pcon_end', 'mod_pc', 'mod_cv', 'mod_axl'], 'integer'],
            [['mod_name', 'mod_name_eng'], 'string', 'max' => 1200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mod_id' => 'Mod ID',
            'mod_mfa_id' => 'Mod Mfa ID',
            'mod_name' => 'Mod Name',
            'mod_name_eng' => 'Mod Name Eng',
            'mod_pcon_start' => 'Mod Pcon Start',
            'mod_pcon_end' => 'Mod Pcon End',
            'mod_pc' => 'Mod Pc',
            'mod_cv' => 'Mod Cv',
            'mod_axl' => 'Mod Axl',
        ];
    }
}
