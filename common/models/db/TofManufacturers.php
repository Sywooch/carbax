<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "tof_manufacturers".
 *
 * @property integer $mfa_id
 * @property string $mfa_brand
 * @property string $mfa_mfc_code
 * @property integer $mfa_pc_mfc
 * @property integer $mfa_cv_mfc
 * @property integer $mfa_eng_mfc
 * @property integer $mfa_axl_mfc
 */
class TofManufacturers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tof_manufacturers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mfa_id'], 'required'],
            [['mfa_id', 'mfa_pc_mfc', 'mfa_cv_mfc', 'mfa_eng_mfc', 'mfa_axl_mfc'], 'integer'],
            [['mfa_brand'], 'string', 'max' => 1200],
            [['mfa_mfc_code'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mfa_id' => 'Mfa ID',
            'mfa_brand' => 'Mfa Brand',
            'mfa_mfc_code' => 'Mfa Mfc Code',
            'mfa_pc_mfc' => 'Mfa Pc Mfc',
            'mfa_cv_mfc' => 'Mfa Cv Mfc',
            'mfa_eng_mfc' => 'Mfa Eng Mfc',
            'mfa_axl_mfc' => 'Mfa Axl Mfc',
        ];
    }
}
