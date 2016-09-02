<?php
/**
 * @var $model common\models\db\Reclame
 * @var $reclamZoneId common\models\db\ReclameZone
 * @var $region common\models\db\GeobaseRegion
 */

use common\classes\Debug;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = "Реклама CARBAX | CARBAX все автоуслуги Вашего города";
//$this->params['breadcrumbs'][] = ['label' => 'Реклама на Carbax'];
$this->params['breadcrumbs'][] = 'Реклама на Carbax';
?>

<section class="single_wrapper">
    <div class="contain">
        <!-- ___________________Левый сайдбар_______________________ -->
        <div class="add__sbar-l">
            <!--<ul class="reklamaMenu">
                <li><a class="active" href="#">Реклама на Carbax</a></li>

                <li><a href="#">Carbax VIP</a></li>
                <li><a href="#">Carbax Промо</a></li>
                <li><a href="#">Carbax Контекст</a></li>
            </ul>-->

            <?= \frontend\modules\reklama\widgets\ReklamaMenu::widget(); ?>

        </div>




        <!-- ___________________Левый сайдбар_______________________ -->
        <section class="main-container">
            <h1>Добовление ПРОМО РЕКЛАМЫ</h1>
            <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>
                <?= $form->field($model,'user_id')->hiddenInput(['value' => Yii::$app->user->id])->label(false); ?>

                <?= $form->field($model,'type_id')->hiddenInput(['value' => 2])->label(false); ?>

                <?= $form->field($model, 'name')->textInput()->label('Название рекламной компании (видно только Вам и администратору)'); ?>

                <?= $form->field($model, 'link')->textInput()->label('Ссылка (вместе с http ил https)'); ?>


                <h3>Выберите зону размещения</h3>
                <?= $form->field($model, 'reclame_zone_id')->radioList(\yii\helpers\ArrayHelper::map($reclamZoneId,'id','name'),
                    [
                    'item' => function($index, $label, $name, $checked, $value) {

                        $return = '<label class="modal-radio">';
                        $return .= '<input type="radio" name="' . $name . '" value="' . $value . '" class="reclameZone" >';
                       /* $return .= '<span></span>';*/
                        $return .= '<span class="radioSel">' . ucwords($label) . '</span>';
                        $return .= '</label>';

                        return $return;
                    }
                ])->label('Выберите позицию рекламы'); ?>

                <span class="zoneImg"></span>
                <span class="templateSelect"></span>

                <span class="reclameInfo">
                    <?= $form->field($model, 'title')->textInput()->label('Заголовок рекламы'); ?>

                    <?= $form->field($model, 'description')->textInput()->label('Описание'); ?>

                    <?/*= $form->field($model, 'images')->fileInput(['id' => 'addImgReclama']); */?>
                    <?= Html::fileInput('file',null,['id' => 'addImgReclama']);?>
                </span>

                <span class="templateView"></span>

            <div class="cleared"></div>

                <h3>Выберите регионы показов</h3>
                    <?= Html::radioList('regionSel', 1,
                        ['1'=> 'Вся Россия', '2' => 'Москва', '3' => 'Москва и Московская область', '4' => 'Указать регионы'],
                        [
                            'item' => function($index, $label, $name, $checked, $value) {

                                $ch = (!empty($checked)) ?  'checked=checked' : '';
                                $return = '<label class="modal-radio">';
                                $return .= '<input type="radio" ' . $ch . ' name="' . $name . '" value="' . $value . '" class="regionSel" >';
                                $return .= '<span class="radioSel">' . ucwords($label) . '</span>';
                                $return .= '</label>';

                                return $return;
                            }
                        ])?>
                    <div class="regSel">
                        <?= Html::dropDownList('regionSelId[]', '', \yii\helpers\ArrayHelper::map($region, 'id', 'name'),['multiple' => 'multiple','size'=>'10', 'class'=> 'form-control']) ?>
                            <span>Для выбора нескольких, при клике, нажмите клавиш CTRL на клавиатуре</span>
                    </div>

                <h3>Бюджет</h3>
                    <?= $form->field($model, 'type_budget')->radioList(['1' => 'Цена за клик', '2' => 'За показ'],
                      [  'item' => function($index, $label, $name, $checked, $value) {

                        $return = '<label class="modal-radio">';
                        $return .= '<input type="radio" name="' . $name . '" value="' . $value . '" class="typeBudget" >';
                        $return .= '<span class="radioSel">' . ucwords($label) . '</span>';
                        $return .= '</label>';

                        return $return;
                    }]
                        )->label('Выберите тип')
                    ?>
                    <?/*= Html::radioList('typeBudget[]', null, ['1' => 'Цена за клик', '2' => 'За показ'],
                        [
                            'item' => function($index, $label, $name, $checked, $value) {

                                $return = '<label class="modal-radio">';
                                $return .= '<input type="radio" name="' . $name . '" value="' . $value . '" class="typeBudget" >';
                                $return .= '<span class="radioSel">' . ucwords($label) . '</span>';
                                $return .= '</label>';

                                return $return;
                            }
                        ])*/?>
                        <span class="budget"></span>
                        <span class="inputPrice">
                            <?= $form->field($model, 'price')->textInput()->label('Введите сумму') ?><span>руб. </span>
                            <span class="overall"></span>
                            <?= $form->field($model, 'overall')->hiddenInput()->label(false) ?>
                        </span>

            <div class="form-group">
                <?= Html::submitButton('Оплатить и отправить на модерацию',['class' => 'btn btn-save']) ?>
            </div>


            <?php ActiveForm::end(); ?>
        </section>
    </div>
</section>