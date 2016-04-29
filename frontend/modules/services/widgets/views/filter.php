<?php
/**
 * @var $address array
 * @var $region
 * @var $city
 * @var $typeServ
 * @var $count
 */
use yii\helpers\ArrayHelper;
use yii\helpers\Html;



if(!empty($_GET['typeId'])){
    $typeId = explode(',', substr($_GET['typeId'], 0, -1));
}



?>
<div class="serviseFilterWr">
    <?= Html::dropDownList('filterServicesRegion', $address['region_id'], ArrayHelper::map($region, 'id', 'name'), ['prompt' => 'Выберите регион', 'class' => 'filterServicesRegion']) ?>
    <span class="FilterCity">
        <?= Html::dropDownList('filterServicesCity', $address['city_id'], ArrayHelper::map($city, 'id', 'name'), ['prompt' => 'Выберите город','class' => 'filterServicesCity']) ?>
    </span>

    <div class="filterTypeServices">
        <?php foreach ($typeServ as $item) :?>

            <?php
                $bool = '';
                if(isset($typeId)){
                    if(in_array($item->id, $typeId)){
                        $bool = 'checked';
                    }
                }
            ?>

            <input type="checkbox" value="<?= $item->id; ?>" <?= $bool; ?> id="check_<?= $item->id?>" class="checkTypeServ" name="check"/>
            <label for="check_<?= $item->id?>">
                <span class="color-swatch--pink"></span><?= $item->name; ?>
            </label>
            <?/*= Html::checkbox('filterType[]', $bool,['class' => 'checkTypeServ', 'value' => $item->id]) . $item->name; */?>
        <?php endforeach; ?>
    </div>

    <div class="resultFilter">
        <span>Найдено: </span> <span class="resultValueFilter"><?= $count ?></span> <span> сервисов</span> <a href="#" class="showResultFilter">Показать</a>
    </div>
</div>
