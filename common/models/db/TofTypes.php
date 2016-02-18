<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "tof_types".
 *
 * @property integer $typ_id
 * @property integer $typ_mod_id
 * @property string $typ_cds
 * @property string $typ_mmt_cds
 * @property integer $typ_pcon_start
 * @property integer $typ_pcon_end
 * @property integer $typ_kw_from
 * @property integer $typ_hp_from
 * @property integer $typ_ccm
 * @property string $typ_litres
 * @property integer $typ_cylinders
 * @property integer $typ_doors
 * @property integer $typ_tank
 * @property integer $typ_kv_voltage_tex_id
 * @property string $typ_kv_voltage_des
 * @property integer $typ_kv_abs_tex_id
 * @property string $typ_kv_abs_des
 * @property integer $typ_kv_asr_tex_id
 * @property string $typ_kv_asr_des
 * @property integer $typ_kv_engine_tex_id
 * @property string $typ_kv_engine_des
 * @property integer $typ_kv_brake_type_tex_id
 * @property string $typ_kv_brake_type_des
 * @property integer $typ_kv_brake_syst_tex_id
 * @property string $typ_kv_brake_syst_des
 * @property integer $typ_kv_fuel_tex_id
 * @property string $typ_kv_fuel_des
 * @property integer $typ_kv_catalyst_tex_id
 * @property string $typ_kv_catalyst_des
 * @property integer $typ_kv_body_tex_id
 * @property string $typ_kv_body_des
 * @property string $typ_max_weight
 * @property integer $typ_kv_model_tex_id
 * @property string $typ_kv_model_des
 * @property integer $typ_kv_axle_tex_id
 * @property string $typ_kv_axle_des
 * @property integer $typ_kv_drive_tex_id
 * @property string $typ_kv_drive_des
 * @property integer $typ_kv_trans_tex_id
 * @property string $typ_kv_trans_des
 * @property integer $typ_kv_fuel_supply_tex_id
 * @property string $typ_kv_fuel_supply_des
 * @property integer $typ_valves
 */
class TofTypes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tof_types';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['typ_id', 'typ_mod_id'], 'required'],
            [['typ_id', 'typ_mod_id', 'typ_pcon_start', 'typ_pcon_end', 'typ_kw_from', 'typ_hp_from', 'typ_ccm', 'typ_cylinders', 'typ_doors', 'typ_tank', 'typ_kv_voltage_tex_id', 'typ_kv_abs_tex_id', 'typ_kv_asr_tex_id', 'typ_kv_engine_tex_id', 'typ_kv_brake_type_tex_id', 'typ_kv_brake_syst_tex_id', 'typ_kv_fuel_tex_id', 'typ_kv_catalyst_tex_id', 'typ_kv_body_tex_id', 'typ_kv_model_tex_id', 'typ_kv_axle_tex_id', 'typ_kv_drive_tex_id', 'typ_kv_trans_tex_id', 'typ_kv_fuel_supply_tex_id', 'typ_valves'], 'integer'],
            [['typ_litres', 'typ_max_weight'], 'number'],
            [['typ_cds', 'typ_mmt_cds', 'typ_kv_voltage_des', 'typ_kv_abs_des', 'typ_kv_asr_des', 'typ_kv_engine_des', 'typ_kv_brake_type_des', 'typ_kv_brake_syst_des', 'typ_kv_fuel_des', 'typ_kv_catalyst_des', 'typ_kv_body_des', 'typ_kv_model_des', 'typ_kv_axle_des', 'typ_kv_drive_des', 'typ_kv_trans_des', 'typ_kv_fuel_supply_des'], 'string', 'max' => 1200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'typ_id' => 'Typ ID',
            'typ_mod_id' => 'Typ Mod ID',
            'typ_cds' => 'Typ Cds',
            'typ_mmt_cds' => 'Typ Mmt Cds',
            'typ_pcon_start' => 'Typ Pcon Start',
            'typ_pcon_end' => 'Typ Pcon End',
            'typ_kw_from' => 'Typ Kw From',
            'typ_hp_from' => 'Typ Hp From',
            'typ_ccm' => 'Typ Ccm',
            'typ_litres' => 'Typ Litres',
            'typ_cylinders' => 'Typ Cylinders',
            'typ_doors' => 'Typ Doors',
            'typ_tank' => 'Typ Tank',
            'typ_kv_voltage_tex_id' => 'Typ Kv Voltage Tex ID',
            'typ_kv_voltage_des' => 'Typ Kv Voltage Des',
            'typ_kv_abs_tex_id' => 'Typ Kv Abs Tex ID',
            'typ_kv_abs_des' => 'Typ Kv Abs Des',
            'typ_kv_asr_tex_id' => 'Typ Kv Asr Tex ID',
            'typ_kv_asr_des' => 'Typ Kv Asr Des',
            'typ_kv_engine_tex_id' => 'Typ Kv Engine Tex ID',
            'typ_kv_engine_des' => 'Typ Kv Engine Des',
            'typ_kv_brake_type_tex_id' => 'Typ Kv Brake Type Tex ID',
            'typ_kv_brake_type_des' => 'Typ Kv Brake Type Des',
            'typ_kv_brake_syst_tex_id' => 'Typ Kv Brake Syst Tex ID',
            'typ_kv_brake_syst_des' => 'Typ Kv Brake Syst Des',
            'typ_kv_fuel_tex_id' => 'Typ Kv Fuel Tex ID',
            'typ_kv_fuel_des' => 'Typ Kv Fuel Des',
            'typ_kv_catalyst_tex_id' => 'Typ Kv Catalyst Tex ID',
            'typ_kv_catalyst_des' => 'Typ Kv Catalyst Des',
            'typ_kv_body_tex_id' => 'Typ Kv Body Tex ID',
            'typ_kv_body_des' => 'Typ Kv Body Des',
            'typ_max_weight' => 'Typ Max Weight',
            'typ_kv_model_tex_id' => 'Typ Kv Model Tex ID',
            'typ_kv_model_des' => 'Typ Kv Model Des',
            'typ_kv_axle_tex_id' => 'Typ Kv Axle Tex ID',
            'typ_kv_axle_des' => 'Typ Kv Axle Des',
            'typ_kv_drive_tex_id' => 'Typ Kv Drive Tex ID',
            'typ_kv_drive_des' => 'Typ Kv Drive Des',
            'typ_kv_trans_tex_id' => 'Typ Kv Trans Tex ID',
            'typ_kv_trans_des' => 'Typ Kv Trans Des',
            'typ_kv_fuel_supply_tex_id' => 'Typ Kv Fuel Supply Tex ID',
            'typ_kv_fuel_supply_des' => 'Typ Kv Fuel Supply Des',
            'typ_valves' => 'Typ Valves',
        ];
    }
}
