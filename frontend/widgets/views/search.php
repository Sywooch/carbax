<?php
use common\models\db\AutoComBrands;
use common\models\db\BcbBrands;
use common\models\db\BrendYear;
use common\models\db\CargoautoYear;
use common\models\db\CarMark;
use common\models\db\CarType;
use common\models\db\GeobaseCity;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

if(isset($_GET['search'])){
    $sel['region'] = $_GET['region'];
    $sel['prod_type'] = $_GET['prod_type'];
    $sel['typeAuto'] = $_GET['typeAuto'];
    $sel['search'] = $_GET['search'];
}
else {
    $sel['region'] = 0;
    $sel['prod_type'] = 0;
    $sel['typeAuto'] = 0;
    $sel['search'] = '';
}

if(isset($_GET['searchName'])){
    $sel['searchName'] = true;
}
else{
    $sel['searchName'] = false;
}

if(isset($_GET['newProduct'])){
    $sel['newProduct'] = true;
}
else{
    $sel['newProduct'] = false;
}
if(isset($_GET['by'])){
    $sel['by'] = true;
}
else{
    $sel['by'] = false;
}
?>
<section class="filter" style="padding-bottom: 0px">
    <div class="contain">
        <?php if($title):?>
        <h2 class="blockTitle-left">Поиск - барахолка</h2>
        <?php endif; ?>

            <form action="/flea_market/default/search">
                <div class="filter__searchline">
                <?= Html::dropDownList('region',$sel['region'], ArrayHelper::map($region, 'id', 'name'), ['prompt'=>'Регион','class'=>'regionSearch'])?>
                <?= Html::hiddenInput('categ',$_GET['categ']); ?>
                <input value="<?=$sel['search']?>" type="text" name="search" class="filter__searchline--search" placeholder="Поиск по объявлениям">
                <?= Html::dropDownList('prod_type',$sel['prod_type'], ['2'=>'Транспорт','1'=>'Запчасти','3'=>'Шины','4'=>'Диски'], ['prompt'=>'Что ищите?','class'=>'prodTypeSearch']) ?>
                <?=Html::dropDownList('typeAuto',$sel['typeAuto'], ['1'=>'Легковой автомобиль','2'=>'Грузовой автомобиль','3'=> 'Мото техника'], ['prompt'=>'Выберите тип автомобиля','class'=>'typeAutoSearch'])?>

                <input type="submit" class="filter__searchline--but" value="Найти">
                <input type="button" class="filter__searchline--but" value="На карте">
                </div>
                <span class="SearchSelectBrand">
                    <?php
                        if($_GET['typeAuto'] == 1){
                            $brand = BcbBrands::find()->orderBy('name')->all();
                            echo Html::dropDownList(
                                'brandSearch',
                                $_GET['brandSearch'],
                                ArrayHelper::map($brand,'id','name'),
                                ['prompt' => 'Марка', 'class' => 'brandAutoSearch']
                            );
                        }
                        if($_GET['typeAuto'] == 2){
                            $brand = AutoComBrands::find()->orderBy('name')->all();
                            echo Html::dropDownList(
                                'brandSearch',
                                $_GET['brandSearch'],
                                ArrayHelper::map($brand,'id','name'),
                                ['prompt' => 'Марка', 'class' => 'brandAutoSearch']
                            );
                        }
                        if($_GET['typeAuto'] == 3){
                            $brand = CarType::find()->orderBy('name')->all();
                            echo Html::dropDownList(
                                'motoType',
                                $_GET['motoType'],
                                ArrayHelper::map($brand,'id_car_type','name'),
                                ['prompt' => 'Тип', 'class' => 'motoTypeSearch']
                            );
                        }
                    ?>
                </span>
                <span class="SearchSelectYear">
                   <?php
                        if(!empty($_GET['brandSearch']) && $_GET['typeAuto'] == 1){
                            $year = BrendYear::find()->where(['id_brand' => $_GET['brandSearch']])->one();
                            if ($year->max_y == 9999) {
                                $yearEnd = 2015;
                            } else {
                                $yearEnd = $year->max_y;
                            }
                            $yearAll = [];
                            for ($i = $year->min_y; $i <= $yearEnd; $i++) {
                                $yearAll[$i] = $i;
                            }
                            echo Html::dropDownList('yearSearch', $_GET['yearSearch'], $yearAll, ['prompt' => 'Год выпуска', 'class' => 'yearSearch',]);
                        }
                       if(!empty($_GET['brandSearch']) && $_GET['typeAuto'] == 2){
                           $year = CargoautoYear::find()->where(['id_brand' => $_GET['brandSearch']])->one();
                           $yearAll = [];
                           for ($i = $year->min_y; $i <= $year->max_y; $i++) {
                               $yearAll[$i] = $i;
                           }
                           echo Html::dropDownList('yearSearch', $_GET['yearSearch'], $yearAll, ['prompt' => 'Год выпуска', 'class' => 'yearSearch',]);
                       }
                       if($_GET['typeAuto'] == 3 && !empty($_GET['motoType'])){
                           $brandMoto = CarMark::find()->where(['id_car_type' => $_GET['motoType']])->orderBy('name')->all();
                           echo Html::dropDownList(
                               'brandMoto',
                               $_GET['brandMoto'],
                               ArrayHelper::map($brandMoto, 'id_car_mark', name),
                               ['prompt' => 'Выберите марку', 'class' => 'yearSearch']
                           );
                       }
                   ?>
                </span>
                <span class="citySearch">
                    <?php
                        if(!empty($_GET['citySearch']) || !empty($_GET['region'])){
                            $city = GeobaseCity::find()->where(['region_id'=>$_GET['region']])->all();
                            echo Html::dropDownList(
                                'citySearch',
                                $_GET['citySearch'],
                                ArrayHelper::map($city,'id','name'),
                                ['prompt' => 'Город', 'class' => 'citySearch', ]
                            );
                        }
                    ?>
                </span>
                <?= Html::checkbox('searchName',$sel['searchName'],['label'=>'Искать только в заголовках']);?>
                <?= Html::checkbox('newProduct',$sel['newProduct'],['label'=>'Новые']);?>
                <?= Html::checkbox('by',$sel['by'],['label'=>'Б/У']);?>

            </form>

    </div>
</section>