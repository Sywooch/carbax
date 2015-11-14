<?php
/**
 * Created by PhpStorm.
 * User: ќфис
 * Date: 12.11.2015
 * Time: 14:04
 */

namespace common\models\forms;


use yii\base\Model;

class OffersForm extends Model
{
    public $title;

    public function rules()
    {
        return [
            // username and password are both required
            [['title'], 'required'],
        ];
    }
}