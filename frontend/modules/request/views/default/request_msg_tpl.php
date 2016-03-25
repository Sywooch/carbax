<?php
use common\classes\Debug;
use common\models\db\AdditionalFields;
use common\models\db\AutoComBrands;
use common\models\db\AutoComModels;
use common\models\db\AwpBodyType;
use common\models\db\AwpTransmission;
use common\models\db\AwpTypeMotor;
use common\models\db\BcbBrands;
use common\models\db\BcbModels;
use common\models\db\CarMark;
use common\models\db\CarModel;

?>

<h3>
    На Ваш сервис <span><?= $name;?></span> пришла заявка:
</h3>

<?php
   // Debug::prn($requestId);
?>
<!-- Текст сообщения на заявку Шиномонтаж-->

<?php if($requestId == 1):?>
    <?php
    /**
     * Легковой транспорт
     */
        if($post['typeAuto'] == 1):?>
            <div><span>Тип автомобиля: </span> Легковой автомобиль</div>
            <div><span>Марка: </span><?= BcbBrands::find()->where(['id' => $_POST['requestMarkAuto']])->one()->name; ?></div>
            <div><span>Модель: </span><?= BcbModels::find()->where(['id' => $_POST['requestModelAuto']])->one()->name; ?></div>
            <div><span>Год выпуска: </span><?= $post['requestYear'] ?></div>
            <div><span>Диаметр диска: </span>
                <?php foreach($post['diskDiametr'] as $d){ ?>
                    <?= $d.' '; ?>
                <?php } ?>
            </div>
        <?php endif;?>


        <?php
    /**
     * Грузовой транспорт
     */
        if($post['typeAuto'] == 2):?>
            <div><span>Тип автомобиля: </span>Грузовой автомобиль</div>
            <div><span>Марка: </span><?= AutoComBrands::find()->where(['id' => $_POST['requestMarkAuto']])->one()->name ?></div>
            <div><span>Модель: </span><?= AutoComModels::find()->where(['id' => $_POST['requestModelAuto']])->one()->name ?></div>
            <div><span>Год выпуска: </span><?= $post['requestYear'] ?></div>
            <div><span>Диаметр диска: </span>
                <?php foreach($post['diskDiametr'] as $d){ ?>
                    <?= $d.' '; ?>
                <?php } ?>
            </div>
        <?php endif;?>

        <?php
    /**
     * Мото транспорт
     */
        if($post['typeAuto'] == 3):?>
            <div><span>Тип автомобиля: </span>Мото транспорт</div>
            <div><span>Марка: </span><?= CarMark::find()->where(['id_car_mark' => $_POST['requestMarkAuto']])->one()->name ?></div>
            <div><span>Модель: </span><?= CarModel::find()->where(['id_car_model' => $_POST['requestModelAuto']])->one()->name; ?></div>
            <div><span>Год выпуска: </span><?= $post['requestYear'] ?></div>
            <div><span>Диаметр диска: </span>
                <?php foreach($post['diskDiametr'] as $d){ ?>
                    <?= $d.' '; ?>
                <?php } ?>
            </div>
        <?php endif;?>
<?php endif;?>

<!--Текст сообщения на заявку Мойка-->

<?php if($requestId == 2):?>
    <?php
    /**
     * Легковой транспорт
     */
    if($post['typeAuto'] == 1):?>
            <div><span>Тип автомобиля: </span> Легковой автомобиль</div>
            <div><span>Марка: </span><?= BcbBrands::find()->where(['id' => $_POST['requestMarkAuto']])->one()->name; ?></div>
            <div><span>Модель: </span><?= BcbModels::find()->where(['id' => $_POST['requestModelAuto']])->one()->name; ?></div>
            <div><span>Год выпуска: </span><?= $post['requestYear'] ?></div>
            <div><span>Тип кузова: </span><?= AwpBodyType::find()->where(['id' => $_POST['bodyAuto']])->one()->name; ?></div>
        <?php endif;?>


        <?php
    /**
     * Грузовой транспорт
     */
    if($post['typeAuto'] == 2):?>
            <div><span>Тип автомобиля: </span>Грузовой автомобиль</div>
            <div><span>Марка: </span><?= AutoComBrands::find()->where(['id' => $_POST['requestMarkAuto']])->one()->name ?></div>
            <div><span>Модель: </span><?= AutoComModels::find()->where(['id' => $_POST['requestModelAuto']])->one()->name ?></div>
            <div><span>Год выпуска: </span><?= $post['requestYear'] ?></div>
            <div><span>Тип кузова: </span><?= AwpBodyType::find()->where(['id' => $_POST['bodyAuto']])->one()->name; ?></div>
        <?php endif;?>

        <?php
    /**
     * Мото транспорт
     */
    if($post['typeAuto'] == 3):?>
            <div><span>Тип автомобиля: </span>Мото транспорт</div>
            <div><span>Марка: </span><?= CarMark::find()->where(['id_car_mark' => $_POST['requestMarkAuto']])->one()->name ?></div>
            <div><span>Модель: </span><?= CarModel::find()->where(['id_car_model' => $_POST['requestModelAuto']])->one()->name; ?></div>
            <div><span>Год выпуска: </span><?= $post['requestYear'] ?></div>
            <div><span>Тип кузова: </span><?= AwpBodyType::find()->where(['id' => $_POST['bodyAuto']])->one()->name; ?></div>
        <?php endif;?>
<?php endif;?>


<!--Текст сообщения на заявку Эвакуатор-->
<?php if($requestId == 5):?>
    <?php
    /**
     * Легковой транспорт
     */
    if($post['typeAuto'] == 1):?>
        <div><span>Тип автомобиля: </span> Легковой автомобиль</div>
    <?php endif;?>
    <?php
    /**
     * Грузовой транспорт
     */
    if($post['typeAuto'] == 2):?>
        <div><span>Тип автомобиля: </span>Грузовой автомобиль</div>
    <?php endif;?>

    <?php
    /**
     * Мото транспорт
     */
    if($post['typeAuto'] == 3):?>
        <div><span>Тип автомобиля: </span>Мото транспорт</div>
    <?php endif;?>
    <div><span>Тип кузова: </span><?= AwpBodyType::find()->where(['id' => $_POST['bodyAuto']])->one()->name; ?></div>
<?php endif; ?>


<!--Текст сообщения на заявку Шины-->
<?php if($requestId == 6):?>
    <?php
    /**
     * Легковой транспорт
     */
    if($post['typeAuto'] == 1):?>
        <div><span>Тип автомобиля: </span> Легковой автомобиль</div>
        <div><span>Марка: </span><?= BcbBrands::find()->where(['id' => $_POST['requestMarkAuto']])->one()->name; ?></div>
        <div><span>Модель: </span><?= BcbModels::find()->where(['id' => $_POST['requestModelAuto']])->one()->name; ?></div>
        <div><span>Год выпуска: </span><?= $post['requestYear'] ?></div>

    <?php endif;?>


    <?php
    /**
     * Грузовой транспорт
     */
    if($post['typeAuto'] == 2):?>
        <div><span>Тип автомобиля: </span>Грузовой автомобиль</div>
        <div><span>Марка: </span><?= AutoComBrands::find()->where(['id' => $_POST['requestMarkAuto']])->one()->name ?></div>
        <div><span>Модель: </span><?= AutoComModels::find()->where(['id' => $_POST['requestModelAuto']])->one()->name ?></div>
        <div><span>Год выпуска: </span><?= $post['requestYear'] ?></div>

    <?php endif;?>

    <?php
    /**
     * Мото транспорт
     */
    if($post['typeAuto'] == 3):?>
        <div><span>Тип автомобиля: </span>Мото транспорт</div>
        <div><span>Марка: </span><?= CarMark::find()->where(['id_car_mark' => $_POST['requestMarkAuto']])->one()->name ?></div>
        <div><span>Модель: </span><?= CarModel::find()->where(['id_car_model' => $_POST['requestModelAuto']])->one()->name; ?></div>
        <div><span>Год выпуска: </span><?= $post['requestYear'] ?></div>

    <?php endif;?>

    <h3>Дополнителые параметры</h3>
    <?php foreach($_POST['infoSplints'] as $is): ?>
        <div><?= $is; ?></div>
    <?php endforeach;?>
    <div><span>Ширина профиля: </span><?= $_POST['section_width']; ?></div>
    <div><span>Высота профиля: </span><?= $_POST['section_height']; ?></div>
    <div><span>Диаметр профиля: </span><?= $_POST['diameter']; ?></div>
    <div><span>Сезонность:</span>
        <?php foreach($_POST['seasonts'] as $s):?>
            <?= $s.' '; ?>
        <?php endforeach;?>
        (
        <?php foreach($_POST['shipi'] as $sh): ?>
            <?= $sh.' '; ?>
        <?php endforeach; ?>
        )
    </div>
<?php endif;?>


<!--Текст сообщения на заявку Автосервис-->
<?php if($requestId == 7):?>
    <?php
    /**
     * Легковой транспорт
     */
    if($post['typeAuto'] == 1):?>
        <div><span>Тип автомобиля: </span> Легковой автомобиль</div>
    <?php endif;?>
    <?php
    /**
     * Грузовой транспорт
     */
    if($post['typeAuto'] == 2):?>
        <div><span>Тип автомобиля: </span>Грузовой автомобиль</div>
    <?php endif;?>

    <?php
    /**
     * Мото транспорт
     */
    if($post['typeAuto'] == 3):?>
        <div><span>Тип автомобиля: </span>Мото транспорт</div>
    <?php endif;?>
    <div><span>Пробег автомобиля: </span><?= $_POST['probeg']; ?></div>
    <div><span>Кпп: </span>
        <?php foreach($_POST['kpp'] as $kpp):?>
            <?= AwpTransmission::find()->where(['id' => $kpp])->one()->name; ?>
        <?php endforeach; ?>
    </div>
    <div><span>ДВС:</span>
        <?php foreach($_POST['dvs'] as $dvs):?>
            <?= AwpTypeMotor::find()->where(['id' => $dvs])->one()->name; ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<!-- Текст сообщения на заявку Тюнинг-->

<?php if($requestId == 8):?>
    <?php
    /**
     * Легковой транспорт
     */
    if($post['typeAuto'] == 1):?>
        <div><span>Тип автомобиля: </span> Легковой автомобиль</div>
        <div><span>Марка: </span><?= BcbBrands::find()->where(['id' => $_POST['requestMarkAuto']])->one()->name; ?></div>
        <div><span>Модель: </span><?= BcbModels::find()->where(['id' => $_POST['requestModelAuto']])->one()->name; ?></div>
        <div><span>Год выпуска: </span><?= $post['requestYear'] ?></div>
    <?php endif;?>
    <?php
    /**
     * Грузовой транспорт
     */
    if($post['typeAuto'] == 2):?>
        <div><span>Тип автомобиля: </span>Грузовой автомобиль</div>
        <div><span>Марка: </span><?= AutoComBrands::find()->where(['id' => $_POST['requestMarkAuto']])->one()->name ?></div>
        <div><span>Модель: </span><?= AutoComModels::find()->where(['id' => $_POST['requestModelAuto']])->one()->name ?></div>
        <div><span>Год выпуска: </span><?= $post['requestYear'] ?></div>
    <?php endif;?>
    <?php
    /**
     * Мото транспорт
     */
    if($post['typeAuto'] == 3):?>
        <div><span>Тип автомобиля: </span>Мото транспорт</div>
        <div><span>Марка: </span><?= CarMark::find()->where(['id_car_mark' => $_POST['requestMarkAuto']])->one()->name ?></div>
        <div><span>Модель: </span><?= CarModel::find()->where(['id_car_model' => $_POST['requestModelAuto']])->one()->name; ?></div>
        <div><span>Год выпуска: </span><?= $post['requestYear'] ?></div>
    <?php endif;?>
<?php endif;?>

<!-- Текст сообщения на заявку Запчасти-->

<?php if($requestId == 9 || $requestId == 3):?>
    <?php
    /**
     * Легковой транспорт
     */
    if($post['typeAuto'] == 1):?>
        <div><span>Тип автомобиля: </span> Легковой автомобиль</div>
        <div><span>Марка: </span><?= BcbBrands::find()->where(['id' => $_POST['requestMarkAuto']])->one()->name; ?></div>
        <div><span>Модель: </span><?= BcbModels::find()->where(['id' => $_POST['requestModelAuto']])->one()->name; ?></div>
        <div><span>Год выпуска: </span><?= $post['requestYear'] ?></div>
    <?php endif;?>
    <?php
    /**
     * Грузовой транспорт
     */
    if($post['typeAuto'] == 2):?>
        <div><span>Тип автомобиля: </span>Грузовой автомобиль</div>
        <div><span>Марка: </span><?= AutoComBrands::find()->where(['id' => $_POST['requestMarkAuto']])->one()->name ?></div>
        <div><span>Модель: </span><?= AutoComModels::find()->where(['id' => $_POST['requestModelAuto']])->one()->name ?></div>
        <div><span>Год выпуска: </span><?= $post['requestYear'] ?></div>
    <?php endif;?>
    <?php
    /**
     * Мото транспорт
     */
    if($post['typeAuto'] == 3):?>
        <div><span>Тип автомобиля: </span>Мото транспорт</div>
        <div><span>Марка: </span><?= CarMark::find()->where(['id_car_mark' => $_POST['requestMarkAuto']])->one()->name ?></div>
        <div><span>Модель: </span><?= CarModel::find()->where(['id_car_model' => $_POST['requestModelAuto']])->one()->name; ?></div>
        <div><span>Год выпуска: </span><?= $post['requestYear'] ?></div>
    <?php endif;?>
    <div><span>Кпп: </span>
        <?php foreach($_POST['kpp'] as $kpp):?>
            <?= AwpTransmission::find()->where(['id' => $kpp])->one()->name; ?>
        <?php endforeach; ?>
    </div>
    <div><span>ДВС:</span>
        <?php foreach($_POST['dvs'] as $dvs):?>
            <?= AwpTypeMotor::find()->where(['id' => $dvs])->one()->name; ?>
        <?php endforeach; ?>
    </div>
    <div><span>VIN: </span><?= $post['vincodeauto'] ?></div>
    <h3>Запчасти:</h3>
    <table class="table table-bordered">
        <tr>
            <th>Название</th>
            <th>Номер</th>
        </tr>
        <?php
            $zap = array_combine($_POST['name_zap'],$_POST['kod_zap']);


            foreach($zap as $key=>$value):
        ?>
                <tr><td><?=$key?></td><td><?= $value;?></td></tr>
        <?php endforeach;?>
</table>
<?php endif;?>

<!--Текст сообщения на заявку Диски-->
<?php if($requestId == 10):?>
    <?php
    /**
     * Легковой транспорт
     */
    if($post['typeAuto'] == 1):?>
        <div><span>Тип автомобиля: </span> Легковой автомобиль</div>
        <div><span>Марка: </span><?= BcbBrands::find()->where(['id' => $_POST['requestMarkAuto']])->one()->name; ?></div>
        <div><span>Модель: </span><?= BcbModels::find()->where(['id' => $_POST['requestModelAuto']])->one()->name; ?></div>
        <div><span>Год выпуска: </span><?= $post['requestYear'] ?></div>

    <?php endif;?>


    <?php
    /**
     * Грузовой транспорт
     */
    if($post['typeAuto'] == 2):?>
        <div><span>Тип автомобиля: </span>Грузовой автомобиль</div>
        <div><span>Марка: </span><?= AutoComBrands::find()->where(['id' => $_POST['requestMarkAuto']])->one()->name ?></div>
        <div><span>Модель: </span><?= AutoComModels::find()->where(['id' => $_POST['requestModelAuto']])->one()->name ?></div>
        <div><span>Год выпуска: </span><?= $post['requestYear'] ?></div>

    <?php endif;?>

    <?php
    /**
     * Мото транспорт
     */
    if($post['typeAuto'] == 3):?>
        <div><span>Тип автомобиля: </span>Мото транспорт</div>
        <div><span>Марка: </span><?= CarMark::find()->where(['id_car_mark' => $_POST['requestMarkAuto']])->one()->name ?></div>
        <div><span>Модель: </span><?= CarModel::find()->where(['id_car_model' => $_POST['requestModelAuto']])->one()->name; ?></div>
        <div><span>Год выпуска: </span><?= $post['requestYear'] ?></div>

    <?php endif;?>

    <h3>Дополнителые параметры</h3>
    <?php foreach($_POST['infoDisk'] as $is): ?>
        <div><?= $is; ?></div>
    <?php endforeach;?>
    <div><span>Ширина обода: </span><?= $_POST['rim_width']; ?></div>
    <div><span>Диаметр обода: </span><?= $_POST['diameter']; ?></div>
    <div><span>Количество крепежных отверстий: </span><?= $_POST['number_holes']; ?></div>
    <div><span>Диаметр расположения отверстий: </span><?= $_POST['diameter_holes']; ?></div>
    <div><span>Вылет (ET): </span><?= $_POST['sortie']; ?></div>

<?php endif;?>

<!--Текст сообщения на заявку Автосалон-->
<?php if($requestId == 12):?>
    <?php
    /**
     * Легковой транспорт
     */
    if($post['typeAuto'] == 1):?>
        <div><span>Тип автомобиля: </span> Легковой автомобиль</div>
        <div><span>Марки авто: </span>
            <?php foreach($_POST['brand'] as $br): ?>
                <?= BcbBrands::find()->where(['id'=>$br])->one()->name.' '; ?>
            <?php endforeach;?>
        </div>

    <?php endif;?>
    <?php
    /**
     * Грузовой транспорт
     */
    if($post['typeAuto'] == 2):?>
        <div><span>Тип автомобиля: </span>Грузовой автомобиль</div>
        <div><span>Марки авто: </span>
            <?php foreach($_POST['brand'] as $br): ?>
                <?= AutoComBrands::find()->where(['id'=>$br])->one()->name.' '; ?>
            <?php endforeach;?>
        </div>
    <?php endif;?>

    <?php
    /**
     * Мото транспорт
     */
    if($post['typeAuto'] == 3):?>
        <div><span>Тип автомобиля: </span>Мото транспорт</div>
        <div><span>Марки авто: </span>
            <?php foreach($_POST['brand'] as $br): ?>
                <?= CarMark::find()->where(['id_car_mark'=>$br])->one()->name.' '; ?>
            <?php endforeach;?>
        </div>
    <?php endif;?>

<?php endif; ?>


<!-- Текст сообщения на заявку Страхование-->

<?php if($requestId == 13):?>
    <?php
    /**
     * Легковой транспорт
     */
    if($post['typeAuto'] == 1):?>
        <div><span>Тип автомобиля: </span> Легковой автомобиль</div>
        <div><span>Марка: </span><?= BcbBrands::find()->where(['id' => $_POST['requestMarkAuto']])->one()->name; ?></div>
        <div><span>Модель: </span><?= BcbModels::find()->where(['id' => $_POST['requestModelAuto']])->one()->name; ?></div>
        <div><span>Год выпуска: </span><?= $post['requestYear'] ?></div>
    <?php endif;?>


    <?php
    /**
     * Грузовой транспорт
     */
    if($post['typeAuto'] == 2):?>
        <div><span>Тип автомобиля: </span>Грузовой автомобиль</div>
        <div><span>Марка: </span><?= AutoComBrands::find()->where(['id' => $_POST['requestMarkAuto']])->one()->name ?></div>
        <div><span>Модель: </span><?= AutoComModels::find()->where(['id' => $_POST['requestModelAuto']])->one()->name ?></div>
        <div><span>Год выпуска: </span><?= $post['requestYear'] ?></div>
    <?php endif;?>

    <?php
    /**
     * Мото транспорт
     */
    if($post['typeAuto'] == 3):?>
        <div><span>Тип автомобиля: </span>Мото транспорт</div>
        <div><span>Марка: </span><?= CarMark::find()->where(['id_car_mark' => $_POST['requestMarkAuto']])->one()->name ?></div>
        <div><span>Модель: </span><?= CarModel::find()->where(['id_car_model' => $_POST['requestModelAuto']])->one()->name; ?></div>
        <div><span>Год выпуска: </span><?= $post['requestYear'] ?></div>
    <?php endif;?>

    <div><span>Дата начала эксплуатации:</span><?= $_POST['dateStart']; ?></div>
    <div><span>Количество лошадиных сил:</span><?= $_POST['kol_Cil']; ?></div>
    <div><span>Побег:</span><?= $_POST['probeg']; ?></div>
    <div><span>Страховая сумма:</span><?= $_POST['summaStrah']; ?></div>
    <div><span>Автомобиль куплен в кредит?</span><?= $_POST['kredit']; ?></div>
    <div><span>Коробка передач:</span><?= $_POST['kpp']; ?></div>



    <div><span>Охранная система:</span><?= $_POST['securitySystem']; ?></div>
    <div><span>Наличие системы автозапуска:</span><?= $_POST['autoloadSystem']; ?></div>
    <div><span>Иммобилайзер:</span><?= $_POST['imobilaizer']; ?></div>
    <div><span>Поисково-спутниковая система:</span><?= $_POST['poiskspytniksystem']; ?></div>
    <div><span>Механические противоугонные устройства:</span><?= $_POST['mexprotivygon']; ?></div>


<?php endif;?>



<h3>Дополнительные работы:</h3>
<?php foreach($selectFields as $fields):?>
    <div><?= AdditionalFields::findOne($fields)->name;?></div>
<?php endforeach; ?>

<h3>Комментарий</h3>
<div><?= $_POST['comm']; ?></div>


