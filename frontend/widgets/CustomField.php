<?php
/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 29.01.2016
 * Time: 9:43
 */

namespace frontend\widgets;

use common\classes\Parser;
use yii\base\Widget;
use yii\helpers\Html;

class CustomField extends Widget
{
    /**
     * @var string Имя формы
     */
    public $name = false;

    /**
     * @var string Тип input
     */
    public $type = false;

    /**
     * @var string Имя формы
     */
    public $labelName = false;

    /**
     * @var string Значение формы
     */
    public $value = false;

    /**
     * @var string Шаблон для вывода формы
     */
    public $template = false;

    /**
     * @var array Массив настроек для input
     */
    public $inputOption = false;

    /**
     * @var array Массив настроек для label
     */
    public $labelOption = false;


    public function run(){
        $label = '';
        if($this->labelName){
            $label = Html::label($this->labelName, $this->labelOption['for'], $this->labelOption);
        }
        if($this->type == 'textarea'){
            $input = Html::textarea($this->name, $this->value, $this->inputOption);
        }
        else {
            $input = Html::textInput($this->name, $this->value, $this->inputOption);
        }
        if($this->template){
            $html = Parser::parse($this->template, ['input'=>$input, 'label'=>$label], false, false);
        }
        else {
            $html = $label.$input;
        }
        return $html;
    }

}