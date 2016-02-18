<?php
use common\models\db\AutoComBrands;
use common\models\db\AutoComModels;
use common\models\db\AwpBodyType;
use common\models\db\AwpDrive;
use common\models\db\AwpTransmission;
use common\models\db\AwpTypeMotor;
use common\models\db\BcbBrands;
use common\models\db\BcbModels;
use common\models\db\BrendYear;
use common\models\db\CargoautoYear;
use common\models\db\CarMark;
use common\models\db\CarModel;
use common\models\db\CarType;
use common\models\db\GeobaseCity;
use common\models\db\TofSearchTree;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

if (isset($_GET['search'])) {
    $sel['region'] = $_GET['region'];
    $sel['prod_type'] = $_GET['prod_type'];
    $sel['typeAuto'] = $_GET['typeAuto'];
    $sel['search'] = $_GET['search'];
} else {
    $sel['region'] = 0;
    $sel['prod_type'] = 0;
    $sel['typeAuto'] = 0;
    $sel['search'] = '';
}

/*if (isset($_GET['searchName'])) {
    $sel['searchName'] = true;
} else {
    $sel['searchName'] = false;
}

if (isset($_GET['newProduct'])) {
    $sel['newProduct'] = true;
} else {
    $sel['newProduct'] = false;
}
if (isset($_GET['by'])) {
    $sel['by'] = true;
} else {
    $sel['by'] = false;
}*/
?>
<!--<section class="filter" style="padding-bottom: 0px">
    <div class="contain">
        <?php /*if ($title): */?>
            <h2 class="blockTitle-left">Поиск - барахолка</h2>
        <?php /*endif; */?>

        <form action="/flea_market/default/search">
            <?/* /*= Html::hiddenInput('categ', $_GET['categ']); */ ?>
            <div class="filter__searchline">
                <?/*= Html::dropDownList('prod_type', $sel['prod_type'], ['2' => 'Транспорт', '1' => 'Запчасти', '3' => 'Шины', '4' => 'Диски', '5' => 'Прочее'], ['prompt' => 'Что ищите?', 'class' => 'prodTypeSearch']) */?>
                <?php /*if(empty($_GET['region'])): */?>
                    <input value="<?/*= $sel['search'] */?>" type="text" name="search" class="filter__searchline--search" placeholder="Поиск по объявлениям">
                <?php /*else: */?>
                    <input value="<?/*= $sel['search'] */?>" type="text" name="search" class="filter__searchline--search" placeholder="Поиск по объявлениям" style="    width: 195px;">
                <?php /*endif;*/?>

                <?/*= Html::dropDownList('region', $sel['region'], ArrayHelper::map($region, 'id', 'name'), ['prompt' => 'Регион', 'class' => 'regionSearch']) */?>
                <span class="citySearch">
                    <?php
/*                    if (!empty($_GET['citySearch']) || !empty($_GET['region'])) {
                        $city = GeobaseCity::find()->where(['region_id' => $_GET['region']])->all();
                        echo Html::dropDownList(
                            'citySearch',
                            $_GET['citySearch'],
                            ArrayHelper::map($city, 'id', 'name'),
                            ['prompt' => 'Город', 'class' => 'citySearch',]
                        );
                    }
                    */?>
                </span>


                <?/* /*=Html::dropDownList('typeAuto',$sel['typeAuto'], ['1'=>'Легковой автомобиль','2'=>'Грузовой автомобиль','3'=> 'Мото техника'], ['prompt'=>'Выберите тип автомобиля','class'=>'typeAutoSearch'])*/ ?>

                <input type="submit" class="filter__searchline--but" value="Найти">
                <input type="button" class="filter__searchline--but" value="На карте">
            </div>
            <?/*= Html::checkbox('searchName', $sel['searchName'], ['label' => 'Искать только в заголовках']); */?>
            <?/*= Html::checkbox('newProduct', $sel['newProduct'], ['label' => 'Новые']); */?>
            <?/*= Html::checkbox('by', $sel['by'], ['label' => 'Б/У']); */?>

            <div class="paramsSearch">
                <?php
/*                //транспорт
                if ($_GET['prod_type'] == 1) {
                    //
                    echo Html::dropDownList('typeAuto', $_GET['typeAuto'], ['1' => 'Легковой автомобиль', '2' => 'Грузовой автомобиль', '3' => 'Мото техника'], ['prompt' => 'Выберите тип автомобиля', 'class' => 'typeAutoSearch']);
                    if (!empty($_GET['typeAuto'])) {
                        $cat = TofSearchTree::find()->where(['str_id_parent' => '10001'])->all();
                        echo Html::dropDownList('categ', $_GET['categ'], ArrayHelper::map($cat, 'str_id', 'str_des'), ['prompt' => 'Тип запчасти', 'class' => 'categ']);
                    }
                }

                //Запчасти
                if ($_GET['prod_type'] == 2){
                echo Html::dropDownList('typeAuto', $_GET['typeAuto'], ['1' => 'Легковой автомобиль', '2' => 'Грузовой автомобиль', '3' => 'Мото техника'], ['prompt' => 'Выберите тип автомобиля', 'class' => 'typeAutoSearch']);
                    if (!empty($_GET['typeAuto'])){
                        if ($_GET['typeAuto'] == 1){
                            $brand = BcbBrands::find()->orderBy('name')->all();
                            $drive = AwpDrive::find()->all();
                            $body = AwpBodyType::find()->all();
                            $typeMotor = AwpTypeMotor::find()->all();
                            $trans = AwpTransmission::find()->all();
                            $model = BcbModels::find()->where(['brand_id'=>$_GET['brandSearch']])->orderBy('name')->all();

                            $year = [];
                            for ($i = 1950; $i <= 2016; $i++) {
                                $year[$i] = $i;
                            }

                            $sizeMotor = [];
                            for ($i = 1; $i <= 7; $i += 0.1) {
                                $sizeMotor[$i] = $i;
                            }

                            echo Html::dropDownList(
                                'brandSearch',
                                $_GET['brandSearch'],
                                ArrayHelper::map($brand, 'id', 'name'),
                                ['prompt' => 'Марка', 'class' => 'brandAutoSearch']
                            );
                            */?>
                            <span
                                class="modelSearch"><?php /*echo Html::dropDownList('modelAutoSearch', $_GET['modelAutoSearch'], ArrayHelper::map($model,'id','name'), ['prompt' => 'Модель', 'class' => 'modelAutoSearch']); */?></span>
                            <?php
/*
                            echo Html::dropDownList('bodySearch', $_GET['bodySearch'], ArrayHelper::map($body, 'id', 'name'), ['prompt' => 'Тип кузова', 'class' => 'bodySearch']);

                            echo Html::dropDownList('transSearch', $_GET['transSearch'], ArrayHelper::map($trans, 'id', 'name'), ['prompt' => 'Коробка передач', 'class' => 'transSearch']);

                            echo Html::dropDownList('typeMotorSearch', $_GET['typeMotorSearch'], ArrayHelper::map($typeMotor, 'id', 'name'), ['prompt' => 'Тип двигателя', 'class' => 'typeMotorSearch']);

                            echo Html::dropDownList('driveSearch', $_GET['driveSearch'], ArrayHelper::map($drive, 'id', 'name'), ['prompt' => 'Привод', 'class' => 'driveSearch']);

                            */?>
                            <div class="DopparamsSearch">
                                <div class="infoDopSearch">
                                    <span>Год выпуска</span>
                                    <?/*= Html::label('От:'); */?>
                                    <?/*= Html::dropDownList('search_year_from', $_GET['search_year_from'], $year, ['class' => 'search_year_from', 'prompt' => 'От']); */?>

                                    <?/*= Html::label('До:'); */?>
                                    <?/*= Html::dropDownList('search_year_to', $_GET['search_year_to'], $year, ['class' => 'search_year_to', 'prompt' => 'До']); */?>
                                </div>
                                <div class="infoDopSearch">
                                    <span>Объем двигателя</span>
                                    <?/*= Html::label('От:'); */?>
                                    <?/*= Html::textInput('searchSizeMotor_from', $_GET['searchSizeMotor_from'], ['class' => 'searchSizeMotor_from']); */?>


                                    <?/*= Html::label('До:'); */?>
                                    <?/*= Html::textInput('searchSizeMotor_to', $_GET['searchSizeMotor_to'], ['class' => 'searchSizeMotor_to']); */?>
                                </div>
                                <div class="infoDopSearch">
                                    <span>Пробег</span>
                                    <?/*= Html::label('От:'); */?>
                                    <?/*= Html::textInput('searchRunFrom', $_GET['searchRunFrom'], ['class' => 'searchRunFrom']); */?>

                                    <?/*= Html::label('До:'); */?>
                                    <?/*= Html::textInput('searchRunTo', $_GET['searchRunTo'], ['class' => 'searchRunTo']); */?>
                                </div>
                                <div class="infoDopSearch">
                                    <span>Цена</span>
                                    <?/*= Html::label('От:'); */?>
                                    <?/*= Html::textInput('searchPriceFrom', $_GET['searchPriceFrom'], ['class' => 'searchPriceFrom']); */?>

                                    <?/*= Html::label('До:'); */?>
                                    <?/*= Html::textInput('searchPriceTo', $_GET['searchPriceTo'], ['class' => 'searchPriceTo']); */?>
                                </div>
                            </div>
                <?php
/*                        }

                        if($_GET['typeAuto'] == 2){
                            $year = [];
                            for($i=1950;$i<=2016;$i++){
                                $year[$i] = $i;
                            }
                            $brand = AutoComBrands::find()->orderBy('name')->all();
                            $model = AutoComModels::find()->where(['brand_id'=>$_GET['brandSearch']])->orderBy('name')->all();

                            echo Html::dropDownList(
                                'brandSearch',
                                $_GET['brandSearch'],
                                ArrayHelper::map($brand,'id','name'),
                                ['prompt' => 'Марка', 'class' => 'brandAutoSearch']
                            );
                            */?>
                            <span class="modelSearch"><?php /*echo Html::dropDownList('modelAutoSearch',$_GET['modelAutoSearch'],ArrayHelper::map($model,'id','name'),['prompt'=>'Модель','class'=>'modelAutoSearch']);*/?></span>

                            <div class="DopparamsSearch">
                                 <div class="infoDopSearch">
                                        <span>Год выпуска</span>
                                        <?/*= Html::label('От:'); */?>
                                        <?/*= Html::dropDownList('search_year_from',$_GET['search_year_from'],$year,['class'=>'search_year_from','prompt'=>'От']); */?>

                                        <?/*= Html::label('До:'); */?>
                                        <?/*= Html::dropDownList('search_year_to',$_GET['search_year_to'],$year,['class'=>'search_year_to','prompt'=>'До']); */?>
                                 </div>
                                <div class="infoDopSearch">
                                        <span>Объем двигателя</span>
                                        <?/*= Html::label('От:'); */?>
                                        <?/*= Html::textInput('searchSizeMotor_from',$_GET['searchSizeMotor_from'],['class'=>'searchSizeMotor_from']); */?>

                                        <?/*= Html::label('До:'); */?>
                                        <?/*= Html::textInput('searchSizeMotor_to',$_GET['searchSizeMotor_to'],['class'=>'searchSizeMotor_to']); */?>
                                </div>
                                <div class="infoDopSearch">
                                        <span>Пробег</span>
                                        <?/*= Html::label('От:'); */?>
                                        <?/*= Html::textInput('searchRunFrom',$_GET['searchRunFrom'],['class'=>'searchRunFrom']); */?>

                                        <?/*= Html::label('До:'); */?>
                                        <?/*= Html::textInput('searchRunTo',$_GET['searchRunTo'],['class'=>'searchRunTo']); */?>
                                </div>
                                <div class="infoDopSearch">
                                        <span>Цена</span>
                                        <?/*= Html::label('От:'); */?>
                                        <?/*= Html::textInput('searchPriceFrom',$_GET['searchPriceFrom'],['class'=>'searchPriceFrom']); */?>

                                        <?/*= Html::label('До:'); */?>
                                        <?/*= Html::textInput('searchPriceTo',$_GET['searchPriceTo'],['class'=>'searchPriceTo']); */?>
                                </div>
                            </div>
                        <?php
/*                        }

                        if($_GET['typeAuto'] == 3){

                            $carType = CarType::find()->orderBy('name')->all();
                            $brandMoto = CarMark::find()->where(['id_car_type' => $_GET['motoType']])->orderBy('name')->all();
                            $model = CarModel::find()->where(['id_car_mark'=>$_GET['brandSearch']])->orderBy('name')->all();
                            echo Html::dropDownList('motoType',$_GET['motoType'],ArrayHelper::map($carType,'id_car_type','name'),['prompt'=>'Тип транспорта','class'=>'motoTypeSearch']);*/?>


                            <span class="motomodelSearch"><?php /*echo Html::dropDownList('brandSearch', $_GET['brandSearch'], ArrayHelper::map($brandMoto, 'id_car_mark', name), ['prompt' => 'Марка', 'class' => 'brandAutoSearch']); */?></span>

                            <span class="modelSearch"><?php /*echo Html::dropDownList('modelAutoSearch',$_GET['modelAutoSearch'],ArrayHelper::map($model,'id_car_model','name'),['prompt'=>'Модель','class'=>'modelAutoSearch']);*/?></span>

                            <div class="DopparamsSearch">
                                <div class="infoDopSearch">

                                    <span>Объем двигателя</span>
                                    <?/*= Html::label('От:'); */?>
                                    <?/*= Html::textInput('searchSizeMotor_from',$_GET['searchSizeMotor_from'],['class'=>'searchSizeMotor_from']); */?>

                                    <?/*= Html::label('До:'); */?>
                                    <?/*= Html::textInput('searchSizeMotor_to',$_GET['searchSizeMotor_to'],['class'=>'searchSizeMotor_to']); */?>
                                </div>
                                <div class="infoDopSearch">
                                    <span>Пробег</span>
                                    <?/*= Html::label('От:'); */?>
                                    <?/*= Html::textInput('searchRunFrom',$_GET['searchRunFrom'],['class'=>'searchRunFrom']); */?>

                                    <?/*= Html::label('До:'); */?>
                                    <?/*= Html::textInput('searchRunTo',$_GET['searchRunTo'],['class'=>'searchRunTo']); */?>
                                </div>
                                <div class="infoDopSearch">
                                    <span>Цена</span>
                                    <?/*= Html::label('От:'); */?>
                                    <?/*= Html::textInput('searchPriceFrom',$_GET['searchPriceFrom'],['class'=>'searchPriceFrom']); */?>

                                    <?/*= Html::label('До:'); */?>
                                    <?/*= Html::textInput('searchPriceTo',$_GET['searchPriceTo'],['class'=>'searchPriceTo']); */?>
                                </div>
                            </div>
                        <?php
/*                        }
                    }
                }
                //шины
                if($_GET['prod_type'] == 3){
                    $diameter = [];
                    for($i=7;$i<=30;$i++){
                        $diameter[$i] = $i;
                    }

                    $section_width = [];
                    for($i=60;$i<=395;$i+=5){
                        $section_width[$i] = $i;
                    }

                    $section_height = [];
                    for($i=25;$i<=110;$i+=5){
                        $section_height[$i] = $i;
                    }

                    //Debug::prn($diameter);

                    echo Html::dropDownList('diameterSplintSearch',$_GET['diameterSplintSearch'],$diameter,['prompt'=>'Диаметр','class'=>'diameterSplintSearch']);



                    echo Html::dropDownList('seasonalitySearch',$_GET['seasonalitySearch'],['1'=>'Летние','2'=>'Зимние нешипованные','3'=>'Зимние шипованные','4'=>'Всесезонные'],['prompt'=>'Сезонность','class'=>'seasonalitySearch']);



                    echo Html::dropDownList('section_widthSearch',$_GET['section_widthSearch'],$section_width,['prompt'=>'Ширина профиля','class'=>'section_widthSearch']);


                    echo Html::dropDownList('section_heightSearch',$_GET['section_heightSearch'],$section_height,['prompt'=>'Высота профиля','class'=>'section_heightSearch']);
                }
                //Диски
                if($_GET['prod_type'] == 4){
                    $typeDisk = ['1'=>'Кованые','2'=>'Литые','3'=>'Штампованные','4'=>'Спицованные','5'=>'Сборные'];
                    $diameter = [];
                    for($i=7;$i<=30;$i+=1){
                        $diameter[$i] = $i;
                    }

                    $rim_width = [];
                    for($i=4;$i<=13;$i+=0.5){
                        $rim_width["$i"] = $i;
                    }

                    $number_holes = ['3'=>'3','4'=>'4','5'=>'5','6'=>'6','8'=>'8','9'=>'9','10'=>'10'];


                    $diameter_holes = [
                        '98' => '98',
                        '100' => '100',
                        '105' => '105',
                        '108' => '108',
                        '110' => '110',
                        '112' => '112',
                        '114.3' => '114.3',
                        '115' => '115',
                        '118' => '118',
                        '120' => '120',
                        '125' => '125',
                        '127' => '127',
                        '130' => '130',
                        '135' => '135',
                        '139' => '139',
                        '139.7' => '139.7',
                        '140' => '140',
                        '150' => '150',
                        '160' => '160',
                        '165' => '165',
                        '165.1' => '165.1',
                        '170' => '170',
                        '180' => '180',
                        '200' => '200',
                        '205' => '205',
                        '256' => '256'
                    ];


                    $sortie = [
                        '-65' => '-65',
                        '-50' => '-50',
                        '-44' => '-44',
                        '-40' => '-40',
                        '-36' => '-36',
                        '-35' => '-35',
                        '-32' => '-32',
                        '-30' => '-30',
                        '-28' => '-28',
                        '-25' => '-25',
                        '-24' => '-24',
                        '-22' => '-22',
                        '-20' => '-20',
                        '-16' => '-16',
                        '-15' => '-15',
                        '-14' => '-14',
                        '-13' => '-13',
                        '-12' => '-12',
                        '-10' => '-10',
                        '-8' => '-8',
                        '-7' => '-7',
                        '-6' => '-6',
                        '-5' => '-5',
                        '-2' => '-2',
                        '0' => '0',
                        '1' => '1',
                        '2' => '2',
                        '3' => '3',
                        '4' => '4',
                        '5' => '5',
                        '6' => '6',
                        '7' => '7',
                        '8' => '8',
                        '9' => '9',
                        '10' => '10',
                        '11' => '11',
                        '12' => '12',
                        '13' => '13',
                        '14' => '14',
                        '15' => '15',
                        '16' => '16',
                        '17' => '17',
                        '18' => '18',
                        '19' => '19',
                        '20' => '20',
                        '21' => '21',
                        '22' => '22',
                        '23' => '23.5',
                        '24' => '24',
                        '25' => '25',
                        '26' => '26',
                        '27' => '27',
                        '28' => '28',
                        '29' => '29',
                        '30' => '30',
                        '31' => '31',
                        '31.5' => '31.5',
                        '32' => '32',
                        '33' => '33',
                        '34' => '34',
                        '35' => '35',
                        '36' => '36',
                        '36.5' => '36.5',
                        '37' => '37',
                        '37.5' => '37.5',
                        '38' => '39',
                        '39.5' => '39.5',
                        '40' => '40',
                        '40.5' => '40.5',
                        '41' => '41',
                        '41.3' => '41.3',
                        '41.5' => '41.5',
                        '42' => '42',
                        '43' => '43',
                        '43.5' => '43.5',
                        '43.8' => '43.8',
                        '44' => '44',
                        '45' => '45',
                        '45.5' => '45.5',
                        '46' => '46',
                        '47' => '47',
                        '47.5' => '47.5',
                        '48' => '48',
                        '49' => '49',
                        '49.5' => '49.5',
                        '50' => '50',
                        '50.5' => '50.5',
                        '50.8' => '50.8',
                        '51' => '51',
                        '52' => '52',
                        '52.2' => '52.2',
                        '52.5' => '52.5',
                        '53' => '53',
                        '54' => '54',
                        '55' => '55',
                        '56' => '56',
                        '57' => '57',
                        '58' => '58',
                        '59' => '59',
                        '60' => '60',
                        '62' => '62',
                        '63' => '63',
                        '65' => '65',
                        '66' => '66',
                        '67' => '67',
                        '68' => '68',
                        '70' => '70',
                        '75' => '75',
                        '83' => '83',
                        '100' => '100',
                        '102' => '102',
                        '105' => '105',
                        '105.5' => '105.5',
                        '106' => '106',
                        '107' => '107',
                        '108' => '108',
                        '110' => '110',
                        '111' => '111',
                        '115' => '115',
                        '116' => '116',
                        '118' => '118',
                        '120' => '120',
                        '123' => '123',
                        '124' => '124',
                        '125' => '125',
                        '126' => '126',
                        '127' => '127',
                        '128' => '128',
                        '129' => '129',
                        '130' => '130',
                        '132' => '132',
                        '133' => '133',
                        '134' => '134',
                        '135' => '135',
                        '136' => '136',
                        '138' => '138',
                        '140' => '140',
                        '142' => '142',
                        '143' => '143',
                        '144' => '144',
                        '145' => '145',
                        '147' => '147',
                        '148' => '148',
                        '152' => '152',
                        '156' => '156',
                        '157' => '157',
                        '161' => '161',
                        '163' => '163',
                        '165' => '165',
                        '167' => '167',
                        '168' => '168',
                        '172' => '172',
                        '175' => '175',
                        '185' => '185',
                    ];




                    echo Html::dropDownList('typeDiskSearch',$_GET['typeDiskSearch'],$typeDisk,['prompt'=>'Тип диска','class'=>'typeDiskSearch']);


                    echo Html::dropDownList('typeDiameterDiskSearch',$_GET['typeDiameterDiskSearch'],$diameter,['prompt'=>'Диаметр','class'=>'typeDiameterDisk']);


                    echo Html::dropDownList('rim_widthSearch',$_GET['rim_widthSearch'],$rim_width,['prompt'=>'Ширина обода','class'=>'rim_widthSearch']);


                    echo Html::dropDownList('number_holesSearch',$_GET['number_holesSearch'],$number_holes, ['prompt'=>'Количество отверстий','class'=>'number_holesSearch']);


                    echo Html::dropDownList('diameter_holestSearch',$_GET['diameter_holestSearch'],$diameter_holes,['prompt'=>'Диаметр расположения отверстий','class'=>'diameter_holestSearch']);


                    echo Html::dropDownList('sortieSearch',$_GET['sortieSearch'],$sortie,['class'=>'sortieSearch','prompt'=>'Вылет (ET)']);
                }
                */?>


            </div>

        </form>

    </div>
</section>-->

<section class="search">
    <div class="contain">
        <div class="search__wrap">
            <div class="search--topline">
                <img src="/media/img/logo2.png" alt="">
                <h3 class="orange">Продажа авто и запчастей</h3>
            </div>
            <form action="/flea_market/search">
                <div class="filter__searchline">
                    <?= Html::dropDownList('prod_type', $_GET['prod_type'], ['2' => 'Транспорт', '1' => 'Запчасти', '3' => 'Шины', '4' => 'Диски', '5' => 'Прочее'], ['prompt' => 'Что ищите?', 'class' => 'prodTypeSearch']) ?>
                    <?php if(empty($_GET['region'])): ?>
                        <input value="<?= $sel['search'] ?>" type="text" name="search" class="filter__searchline--search" placeholder="Поиск по объявлениям">
                    <?php else: ?>
                        <input value="<?= $sel['search'] ?>" type="text" name="search" class="filter__searchline--search" placeholder="Поиск по объявлениям" style="    width: 105px;">
                    <?php endif;?>

                    <?= Html::dropDownList('region', $sel['region'], ArrayHelper::map($region, 'id', 'name'), ['prompt' => 'Регион', 'class' => 'regionSearch']) ?>
                    <span class="citySearch">
                        <?php
                        if (!empty($_GET['citySearch']) || !empty($_GET['region'])) {
                            $city = GeobaseCity::find()->where(['region_id' => $_GET['region']])->all();
                            echo Html::dropDownList(
                                'citySearch',
                                $_GET['citySearch'],
                                ArrayHelper::map($city, 'id', 'name'),
                                ['prompt' => 'Город', 'class' => 'citySearch',]
                            );
                        }
                        ?>
                    </span>


                    <input type="submit" class="filter__searchline--but" value="Найти">
                    <input type="button" class="filter__searchline--but" value="На карте">
                </div>

                <input type="checkbox" <?= (isset($_GET['searchName'])) ? 'checked' : ''?> id="searchName" name="searchName" />
                <label for="searchName"><span></span>Искать только в заголовках</label>

                <input type="checkbox" <?= (isset($_GET['newProduct'])) ? 'checked' : ''?> id="newProduct" name="newProduct" />
                <label for="newProduct"><span></span>Новые</label>

                <input type="checkbox" <?= (isset($_GET['by'])) ? 'checked' : ''?> id="by" name="by" />
                <label for="by"><span></span>Б/У</label>
                <div class="paramsSearch">
                    <?php
                    //транспорт
                    if ($_GET['prod_type'] == 1) {
                        //
                        echo Html::dropDownList('typeAuto', $_GET['typeAuto'], ['1' => 'Легковой автомобиль', '2' => 'Грузовой автомобиль', '3' => 'Мото техника'], ['prompt' => 'Выберите тип автомобиля', 'class' => 'typeAutoSearch']);
                        if (!empty($_GET['typeAuto'])) {
                            $cat = TofSearchTree::find()->where(['str_id_parent' => '10001'])->all();
                            echo Html::dropDownList('categ', $_GET['categ'], ArrayHelper::map($cat, 'str_id', 'str_des'), ['prompt' => 'Тип запчасти', 'class' => 'categ']);
                        }
                    }

                    //Запчасти
                    if ($_GET['prod_type'] == 2){
                        echo Html::dropDownList('typeAuto', $_GET['typeAuto'], ['1' => 'Легковой автомобиль', '2' => 'Грузовой автомобиль', '3' => 'Мото техника'], ['prompt' => 'Выберите тип автомобиля', 'class' => 'typeAutoSearch']);
                        if (!empty($_GET['typeAuto'])){
                            if ($_GET['typeAuto'] == 1){
                                $brand = BcbBrands::find()->orderBy('name')->all();
                                $drive = AwpDrive::find()->all();
                                $body = AwpBodyType::find()->all();
                                $typeMotor = AwpTypeMotor::find()->all();
                                $trans = AwpTransmission::find()->all();
                                $model = BcbModels::find()->where(['brand_id'=>$_GET['brandSearch']])->orderBy('name')->all();

                                $year = [];
                                for ($i = 1950; $i <= 2016; $i++) {
                                    $year[$i] = $i;
                                }

                                $sizeMotor = [];
                                for ($i = 1; $i <= 7; $i += 0.1) {
                                    $sizeMotor[$i] = $i;
                                }

                                echo Html::dropDownList(
                                    'brandSearch',
                                    $_GET['brandSearch'],
                                    ArrayHelper::map($brand, 'id', 'name'),
                                    ['prompt' => 'Марка', 'class' => 'brandAutoSearch']
                                );
                                ?>
                                <span
                                    class="modelSearch"><?php echo Html::dropDownList('modelAutoSearch', $_GET['modelAutoSearch'], ArrayHelper::map($model,'id','name'), ['prompt' => 'Модель', 'class' => 'modelAutoSearch']); ?></span>
                                <?php

                                echo Html::dropDownList('bodySearch', $_GET['bodySearch'], ArrayHelper::map($body, 'id', 'name'), ['prompt' => 'Тип кузова', 'class' => 'bodySearch']);

                                echo Html::dropDownList('transSearch', $_GET['transSearch'], ArrayHelper::map($trans, 'id', 'name'), ['prompt' => 'Коробка передач', 'class' => 'transSearch']);

                                echo Html::dropDownList('typeMotorSearch', $_GET['typeMotorSearch'], ArrayHelper::map($typeMotor, 'id', 'name'), ['prompt' => 'Тип двигателя', 'class' => 'typeMotorSearch']);

                                echo Html::dropDownList('driveSearch', $_GET['driveSearch'], ArrayHelper::map($drive, 'id', 'name'), ['prompt' => 'Привод', 'class' => 'driveSearch']);

                                ?>
                                <div class="DopparamsSearch">
                                    <div class="infoDopSearch">
                                        <span>Год выпуска</span>
                                        <?= Html::label('От:'); ?>
                                        <?= Html::dropDownList('search_year_from', $_GET['search_year_from'], $year, ['class' => 'search_year_from', 'prompt' => 'От']); ?>

                                        <?= Html::label('До:'); ?>
                                        <?= Html::dropDownList('search_year_to', $_GET['search_year_to'], $year, ['class' => 'search_year_to', 'prompt' => 'До']); ?>
                                    </div>
                                    <div class="infoDopSearch">
                                        <span>Объем двигателя</span>
                                        <?= Html::label('От:'); ?>
                                        <?= Html::textInput('searchSizeMotor_from', $_GET['searchSizeMotor_from'], ['class' => 'searchSizeMotor_from']); ?>


                                        <?= Html::label('До:'); ?>
                                        <?= Html::textInput('searchSizeMotor_to', $_GET['searchSizeMotor_to'], ['class' => 'searchSizeMotor_to']); ?>
                                    </div>
                                    <div class="infoDopSearch">
                                        <span>Пробег</span>
                                        <?= Html::label('От:'); ?>
                                        <?= Html::textInput('searchRunFrom', $_GET['searchRunFrom'], ['class' => 'searchRunFrom']); ?>

                                        <?= Html::label('До:'); ?>
                                        <?= Html::textInput('searchRunTo', $_GET['searchRunTo'], ['class' => 'searchRunTo']); ?>
                                    </div>
                                    <div class="infoDopSearch">
                                        <span>Цена</span>
                                        <?= Html::label('От:'); ?>
                                        <?= Html::textInput('searchPriceFrom', $_GET['searchPriceFrom'], ['class' => 'searchPriceFrom']); ?>

                                        <?= Html::label('До:'); ?>
                                        <?= Html::textInput('searchPriceTo', $_GET['searchPriceTo'], ['class' => 'searchPriceTo']); ?>
                                    </div>
                                </div>
                                <?php
                            }

                            if($_GET['typeAuto'] == 2){
                                $year = [];
                                for($i=1950;$i<=2016;$i++){
                                    $year[$i] = $i;
                                }
                                $brand = AutoComBrands::find()->orderBy('name')->all();
                                $model = AutoComModels::find()->where(['brand_id'=>$_GET['brandSearch']])->orderBy('name')->all();

                                echo Html::dropDownList(
                                    'brandSearch',
                                    $_GET['brandSearch'],
                                    ArrayHelper::map($brand,'id','name'),
                                    ['prompt' => 'Марка', 'class' => 'brandAutoSearch']
                                );
                                ?>
                                <span class="modelSearch"><?php echo Html::dropDownList('modelAutoSearch',$_GET['modelAutoSearch'],ArrayHelper::map($model,'id','name'),['prompt'=>'Модель','class'=>'modelAutoSearch']);?></span>

                                <div class="DopparamsSearch">
                                    <div class="infoDopSearch">
                                        <span>Год выпуска</span>
                                        <?= Html::label('От:'); ?>
                                        <?= Html::dropDownList('search_year_from',$_GET['search_year_from'],$year,['class'=>'search_year_from','prompt'=>'От']); ?>

                                        <?= Html::label('До:'); ?>
                                        <?= Html::dropDownList('search_year_to',$_GET['search_year_to'],$year,['class'=>'search_year_to','prompt'=>'До']); ?>
                                    </div>
                                    <div class="infoDopSearch">
                                        <span>Объем двигателя</span>
                                        <?= Html::label('От:'); ?>
                                        <?= Html::textInput('searchSizeMotor_from',$_GET['searchSizeMotor_from'],['class'=>'searchSizeMotor_from']); ?>

                                        <?= Html::label('До:'); ?>
                                        <?= Html::textInput('searchSizeMotor_to',$_GET['searchSizeMotor_to'],['class'=>'searchSizeMotor_to']); ?>
                                    </div>
                                    <div class="infoDopSearch">
                                        <span>Пробег</span>
                                        <?= Html::label('От:'); ?>
                                        <?= Html::textInput('searchRunFrom',$_GET['searchRunFrom'],['class'=>'searchRunFrom']); ?>

                                        <?= Html::label('До:'); ?>
                                        <?= Html::textInput('searchRunTo',$_GET['searchRunTo'],['class'=>'searchRunTo']); ?>
                                    </div>
                                    <div class="infoDopSearch">
                                        <span>Цена</span>
                                        <?= Html::label('От:'); ?>
                                        <?= Html::textInput('searchPriceFrom',$_GET['searchPriceFrom'],['class'=>'searchPriceFrom']); ?>

                                        <?= Html::label('До:'); ?>
                                        <?= Html::textInput('searchPriceTo',$_GET['searchPriceTo'],['class'=>'searchPriceTo']); ?>
                                    </div>
                                </div>
                                <?php
                            }

                            if($_GET['typeAuto'] == 3){

                                $carType = CarType::find()->orderBy('name')->all();
                                $brandMoto = CarMark::find()->where(['id_car_type' => $_GET['motoType']])->orderBy('name')->all();
                                $model = CarModel::find()->where(['id_car_mark'=>$_GET['brandSearch']])->orderBy('name')->all();
                                echo Html::dropDownList('motoType',$_GET['motoType'],ArrayHelper::map($carType,'id_car_type','name'),['prompt'=>'Тип транспорта','class'=>'motoTypeSearch']);?>


                                <span class="motomodelSearch"><?php echo Html::dropDownList('brandSearch', $_GET['brandSearch'], ArrayHelper::map($brandMoto, 'id_car_mark', name), ['prompt' => 'Марка', 'class' => 'brandAutoSearch']); ?></span>

                                <span class="modelSearch"><?php echo Html::dropDownList('modelAutoSearch',$_GET['modelAutoSearch'],ArrayHelper::map($model,'id_car_model','name'),['prompt'=>'Модель','class'=>'modelAutoSearch']);?></span>

                                <div class="DopparamsSearch">
                                    <div class="infoDopSearch">

                                        <span>Объем двигателя</span>
                                        <?= Html::label('От:'); ?>
                                        <?= Html::textInput('searchSizeMotor_from',$_GET['searchSizeMotor_from'],['class'=>'searchSizeMotor_from']); ?>

                                        <?= Html::label('До:'); ?>
                                        <?= Html::textInput('searchSizeMotor_to',$_GET['searchSizeMotor_to'],['class'=>'searchSizeMotor_to']); ?>
                                    </div>
                                    <div class="infoDopSearch">
                                        <span>Пробег</span>
                                        <?= Html::label('От:'); ?>
                                        <?= Html::textInput('searchRunFrom',$_GET['searchRunFrom'],['class'=>'searchRunFrom']); ?>

                                        <?= Html::label('До:'); ?>
                                        <?= Html::textInput('searchRunTo',$_GET['searchRunTo'],['class'=>'searchRunTo']); ?>
                                    </div>
                                    <div class="infoDopSearch">
                                        <span>Цена</span>
                                        <?= Html::label('От:'); ?>
                                        <?= Html::textInput('searchPriceFrom',$_GET['searchPriceFrom'],['class'=>'searchPriceFrom']); ?>

                                        <?= Html::label('До:'); ?>
                                        <?= Html::textInput('searchPriceTo',$_GET['searchPriceTo'],['class'=>'searchPriceTo']); ?>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    }
                    //шины
                    if($_GET['prod_type'] == 3){
                        $diameter = [];
                        for($i=7;$i<=30;$i++){
                            $diameter[$i] = $i;
                        }

                        $section_width = [];
                        for($i=60;$i<=395;$i+=5){
                            $section_width[$i] = $i;
                        }

                        $section_height = [];
                        for($i=25;$i<=110;$i+=5){
                            $section_height[$i] = $i;
                        }

                        //Debug::prn($diameter);

                        echo Html::dropDownList('diameterSplintSearch',$_GET['diameterSplintSearch'],$diameter,['prompt'=>'Диаметр','class'=>'diameterSplintSearch']);



                        echo Html::dropDownList('seasonalitySearch',$_GET['seasonalitySearch'],['1'=>'Летние','2'=>'Зимние нешипованные','3'=>'Зимние шипованные','4'=>'Всесезонные'],['prompt'=>'Сезонность','class'=>'seasonalitySearch']);



                        echo Html::dropDownList('section_widthSearch',$_GET['section_widthSearch'],$section_width,['prompt'=>'Ширина профиля','class'=>'section_widthSearch']);


                        echo Html::dropDownList('section_heightSearch',$_GET['section_heightSearch'],$section_height,['prompt'=>'Высота профиля','class'=>'section_heightSearch']);
                    }
                    //Диски
                    if($_GET['prod_type'] == 4){
                        $typeDisk = ['1'=>'Кованые','2'=>'Литые','3'=>'Штампованные','4'=>'Спицованные','5'=>'Сборные'];
                        $diameter = [];
                        for($i=7;$i<=30;$i+=1){
                            $diameter[$i] = $i;
                        }

                        $rim_width = [];
                        for($i=4;$i<=13;$i+=0.5){
                            $rim_width["$i"] = $i;
                        }

                        $number_holes = ['3'=>'3','4'=>'4','5'=>'5','6'=>'6','8'=>'8','9'=>'9','10'=>'10'];


                        $diameter_holes = [
                            '98' => '98',
                            '100' => '100',
                            '105' => '105',
                            '108' => '108',
                            '110' => '110',
                            '112' => '112',
                            '114.3' => '114.3',
                            '115' => '115',
                            '118' => '118',
                            '120' => '120',
                            '125' => '125',
                            '127' => '127',
                            '130' => '130',
                            '135' => '135',
                            '139' => '139',
                            '139.7' => '139.7',
                            '140' => '140',
                            '150' => '150',
                            '160' => '160',
                            '165' => '165',
                            '165.1' => '165.1',
                            '170' => '170',
                            '180' => '180',
                            '200' => '200',
                            '205' => '205',
                            '256' => '256'
                        ];


                        $sortie = [
                            '-65' => '-65',
                            '-50' => '-50',
                            '-44' => '-44',
                            '-40' => '-40',
                            '-36' => '-36',
                            '-35' => '-35',
                            '-32' => '-32',
                            '-30' => '-30',
                            '-28' => '-28',
                            '-25' => '-25',
                            '-24' => '-24',
                            '-22' => '-22',
                            '-20' => '-20',
                            '-16' => '-16',
                            '-15' => '-15',
                            '-14' => '-14',
                            '-13' => '-13',
                            '-12' => '-12',
                            '-10' => '-10',
                            '-8' => '-8',
                            '-7' => '-7',
                            '-6' => '-6',
                            '-5' => '-5',
                            '-2' => '-2',
                            '0' => '0',
                            '1' => '1',
                            '2' => '2',
                            '3' => '3',
                            '4' => '4',
                            '5' => '5',
                            '6' => '6',
                            '7' => '7',
                            '8' => '8',
                            '9' => '9',
                            '10' => '10',
                            '11' => '11',
                            '12' => '12',
                            '13' => '13',
                            '14' => '14',
                            '15' => '15',
                            '16' => '16',
                            '17' => '17',
                            '18' => '18',
                            '19' => '19',
                            '20' => '20',
                            '21' => '21',
                            '22' => '22',
                            '23' => '23.5',
                            '24' => '24',
                            '25' => '25',
                            '26' => '26',
                            '27' => '27',
                            '28' => '28',
                            '29' => '29',
                            '30' => '30',
                            '31' => '31',
                            '31.5' => '31.5',
                            '32' => '32',
                            '33' => '33',
                            '34' => '34',
                            '35' => '35',
                            '36' => '36',
                            '36.5' => '36.5',
                            '37' => '37',
                            '37.5' => '37.5',
                            '38' => '39',
                            '39.5' => '39.5',
                            '40' => '40',
                            '40.5' => '40.5',
                            '41' => '41',
                            '41.3' => '41.3',
                            '41.5' => '41.5',
                            '42' => '42',
                            '43' => '43',
                            '43.5' => '43.5',
                            '43.8' => '43.8',
                            '44' => '44',
                            '45' => '45',
                            '45.5' => '45.5',
                            '46' => '46',
                            '47' => '47',
                            '47.5' => '47.5',
                            '48' => '48',
                            '49' => '49',
                            '49.5' => '49.5',
                            '50' => '50',
                            '50.5' => '50.5',
                            '50.8' => '50.8',
                            '51' => '51',
                            '52' => '52',
                            '52.2' => '52.2',
                            '52.5' => '52.5',
                            '53' => '53',
                            '54' => '54',
                            '55' => '55',
                            '56' => '56',
                            '57' => '57',
                            '58' => '58',
                            '59' => '59',
                            '60' => '60',
                            '62' => '62',
                            '63' => '63',
                            '65' => '65',
                            '66' => '66',
                            '67' => '67',
                            '68' => '68',
                            '70' => '70',
                            '75' => '75',
                            '83' => '83',
                            '100' => '100',
                            '102' => '102',
                            '105' => '105',
                            '105.5' => '105.5',
                            '106' => '106',
                            '107' => '107',
                            '108' => '108',
                            '110' => '110',
                            '111' => '111',
                            '115' => '115',
                            '116' => '116',
                            '118' => '118',
                            '120' => '120',
                            '123' => '123',
                            '124' => '124',
                            '125' => '125',
                            '126' => '126',
                            '127' => '127',
                            '128' => '128',
                            '129' => '129',
                            '130' => '130',
                            '132' => '132',
                            '133' => '133',
                            '134' => '134',
                            '135' => '135',
                            '136' => '136',
                            '138' => '138',
                            '140' => '140',
                            '142' => '142',
                            '143' => '143',
                            '144' => '144',
                            '145' => '145',
                            '147' => '147',
                            '148' => '148',
                            '152' => '152',
                            '156' => '156',
                            '157' => '157',
                            '161' => '161',
                            '163' => '163',
                            '165' => '165',
                            '167' => '167',
                            '168' => '168',
                            '172' => '172',
                            '175' => '175',
                            '185' => '185',
                        ];




                        echo Html::dropDownList('typeDiskSearch',$_GET['typeDiskSearch'],$typeDisk,['prompt'=>'Тип диска','class'=>'typeDiskSearch']);


                        echo Html::dropDownList('typeDiameterDiskSearch',$_GET['typeDiameterDiskSearch'],$diameter,['prompt'=>'Диаметр','class'=>'typeDiameterDisk']);


                        echo Html::dropDownList('rim_widthSearch',$_GET['rim_widthSearch'],$rim_width,['prompt'=>'Ширина обода','class'=>'rim_widthSearch']);


                        echo Html::dropDownList('number_holesSearch',$_GET['number_holesSearch'],$number_holes, ['prompt'=>'Количество отверстий','class'=>'number_holesSearch']);


                        echo Html::dropDownList('diameter_holestSearch',$_GET['diameter_holestSearch'],$diameter_holes,['prompt'=>'Диаметр расположения отверстий','class'=>'diameter_holestSearch']);


                        echo Html::dropDownList('sortieSearch',$_GET['sortieSearch'],$sortie,['class'=>'sortieSearch','prompt'=>'Вылет (ET)']);
                    }
                    ?>


                </div>

            </form>
        </div>
    </div>
</section>