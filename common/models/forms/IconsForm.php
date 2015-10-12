<?php

namespace common\models\forms;

use yii\base\Model;
use yii\web\UploadedFile;

/**
 * UploadForm is the model behind the upload form.
 */
class IconsForm extends Model
{
    /**
     * @var UploadedFile file attribute
     */
    public $icon_s;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['icon_s'], 'file'],
        ];
    }
}