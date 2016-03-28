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
    На Ваш сервис <span><?= $name; ?></span> пришла заявка:
</h3>

<?php
// Debug::prn($requestId);
?>
<!-- Текст сообщения на заявку Шиномонтаж-->

<?php if ($requestId == 1): ?>
    <?php
    /**
     * Легковой транспорт
     */
    if ($post['typeAuto'] == 1):?>
        <div>
            <span class="request_msg_type">Тип автомобиля: </span>
            <span class="request_msg_autotype">Легковой автомобиль</span>
        </div>
        <div class="request_msg_feald">
            <div class="request_msg_feald--element">
<!--                <span>Марка: </span>-->
                <?= BcbBrands::find()->where(['id' => $_POST['requestMarkAuto']])->one()->name; ?>
            </div>
            <div class="request_msg_feald--element">
<!--                <span>Модель: </span>-->
                <?= BcbModels::find()->where(['id' => $_POST['requestModelAuto']])->one()->name; ?>
            </div>
            <div class="request_msg_feald--element">
<!--                <span>Год выпуска: </span>-->
                <?= $post['requestYear'] ?></div>
            <div class="request_msg_feald--disk">
<!--                <span>Диаметр диска: </span>-->
                <?php foreach ($post['diskDiametr'] as $d) { ?>
                    <?= $d . ' '; ?>
                <?php } ?>
            </div>
        </div>
    <?php endif; ?>


    <?php
    /**
     * Грузовой транспорт
     */
    if ($post['typeAuto'] == 2):?>
        <div>
            <span class="request_msg_type">Тип автомобиля: </span>
            <span class="request_msg_autotype">Грузовой автомобиль</span>
        </div>
        <div class="request_msg_feald">
            <div class="request_msg_feald--element">
<!--                <span>Марка: </span>-->
                <?= AutoComBrands::find()->where(['id' => $_POST['requestMarkAuto']])->one()->name ?>
            </div>
            <div class="request_msg_feald--element">
<!--                <span>Модель: </span>-->
                <?= AutoComModels::find()->where(['id' => $_POST['requestModelAuto']])->one()->name ?>
            </div>
            <div class="request_msg_feald--element">
<!--                <span>Год выпуска: </span>-->
                <?= $post['requestYear'] ?></div>
            <div class="request_msg_feald--disk">
<!--                <span>Диаметр диска: </span>-->
                <?php foreach ($post['diskDiametr'] as $d) { ?>
                    <?= $d . ' '; ?>
                <?php } ?>
            </div>
        </div>
    <?php endif; ?>

    <?php
    /**
     * Мото транспорт
     */
    if ($post['typeAuto'] == 3):?>
        <div>
            <span class="request_msg_type">Тип автомобиля: </span>
            <span class="request_msg_autotype">Мото транспорт</span>
        </div>
        <div class="request_msg_feald">
            <div class="request_msg_feald--element">
<!--                <span>Марка: </span>-->
                <?= CarMark::find()->where(['id_car_mark' => $_POST['requestMarkAuto']])->one()->name ?>
            </div>
            <div class="request_msg_feald--element">
<!--                <span>Модель: </span>-->
                <?= CarModel::find()->where(['id_car_model' => $_POST['requestModelAuto']])->one()->name; ?>
            </div>
            <div class="request_msg_feald--element">
<!--                <span>Год выпуска: </span>-->
                <?= $post['requestYear'] ?></div>
            <div class="request_msg_feald--disk">
<!--                <span>Диаметр диска: </span>-->
                <?php foreach ($post['diskDiametr'] as $d) { ?>
                    <?= $d . ' '; ?>
                <?php } ?>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>

<!--Текст сообщения на заявку Мойка-->

<?php if ($requestId == 2): ?>
    <?php
    /**
     * Легковой транспорт
     */
    if ($post['typeAuto'] == 1):?>
        <div>
            <span class="request_msg_type">Тип автомобиля: </span>
            <span class="request_msg_autotype">Легковой автомобиль</span>
        </div>
        <div class="request_msg_feald">
            <div class="request_msg_feald--element">
<!--                <span>Марка: </span>-->
                <?= BcbBrands::find()->where(['id' => $_POST['requestMarkAuto']])->one()->name; ?>
            </div>
            <div class="request_msg_feald--element">
<!--                <span>Модель: </span>-->
                <?= BcbModels::find()->where(['id' => $_POST['requestModelAuto']])->one()->name; ?>
            </div>
            <div class="request_msg_feald--element">
<!--                <span>Год выпуска: </span>-->
                <?= $post['requestYear'] ?>
            </div>
            <div class="request_msg_feald--disk">
<!--                <span>Тип кузова: </span>-->
                <?= AwpBodyType::find()->where(['id' => $_POST['bodyAuto']])->one()->name; ?>
            </div>
        </div>
    <?php endif; ?>


    <?php
    /**
     * Грузовой транспорт
     */
    if ($post['typeAuto'] == 2):?>
        <div>
            <span class="request_msg_type">Тип автомобиля: </span>
            <span class="request_msg_autotype">Грузовой автомобиль</span>
        </div>
        <div class="request_msg_feald">
            <div class="request_msg_feald--element">
<!--                <span>Марка: </span>-->
                <?= AutoComBrands::find()->where(['id' => $_POST['requestMarkAuto']])->one()->name ?>
            </div>
            <div class="request_msg_feald--element">
<!--                <span>Модель: </span>-->
                <?= AutoComModels::find()->where(['id' => $_POST['requestModelAuto']])->one()->name ?>
            </div>
            <div class="request_msg_feald--element">
<!--                <span>Год выпуска: </span>-->
                <?= $post['requestYear'] ?>
            </div>
            <div class="request_msg_feald--disk">
<!--                <span>Тип кузова: </span>-->
                <?= AwpBodyType::find()->where(['id' => $_POST['bodyAuto']])->one()->name; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php
    /**
     * Мото транспорт
     */
    if ($post['typeAuto'] == 3):?>
        <div>
            <span class="request_msg_type">Тип автомобиля: </span>
            <span class="request_msg_autotype">Мото транспорт</span>
        </div>
        <div class="request_msg_feald">
            <div class="request_msg_feald--element">
<!--                <span>Марка: </span>-->
                <?= CarMark::find()->where(['id_car_mark' => $_POST['requestMarkAuto']])->one()->name ?>
            </div>
            <div class="request_msg_feald--element">
<!--                <span>Модель: </span>-->
                <?= CarModel::find()->where(['id_car_model' => $_POST['requestModelAuto']])->one()->name; ?>
            </div>
            <div class="request_msg_feald--element">
<!--                <span>Год выпуска: </span>-->
                <?= $post['requestYear'] ?></div>
            <div class="request_msg_feald--disk">
<!--                <span>Тип кузова: </span>-->
                <?= AwpBodyType::find()->where(['id' => $_POST['bodyAuto']])->one()->name; ?>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>


<!--Текст сообщения на заявку Эвакуатор-->
<?php if ($requestId == 5): ?>
    <?php
    /**
     * Легковой транспорт
     */
    if ($post['typeAuto'] == 1):?>
        <div>
            <span class="request_msg_type">Тип автомобиля: </span>
            <span class="request_msg_autotype">Легковой автомобиль</span>
        </div>
    <?php endif; ?>
    <?php
    /**
     * Грузовой транспорт
     */
    if ($post['typeAuto'] == 2):?>
        <div>
            <span class="request_msg_type">Тип автомобиля: </span>
            <span class="request_msg_autotype">Грузовой автомобиль</span>
        </div>
    <?php endif; ?>

    <?php
    /**
     * Мото транспорт
     */
    if ($post['typeAuto'] == 3):?>
        <div>
            <span class="request_msg_type">Тип автомобиля: </span>
            <span class="request_msg_autotype">Мото транспорт</span>
        </div>
    <?php endif; ?>
    <div>
        <span class="request_msg_type">Тип кузова: </span>
        <?= AwpBodyType::find()->where(['id' => $_POST['bodyAuto']])->one()->name; ?>
    </div>
<?php endif; ?>


<!--Текст сообщения на заявку Шины-->
<?php if ($requestId == 6): ?>
    <?php
    /**
     * Легковой транспорт
     */
    if ($post['typeAuto'] == 1):?>
        <div>
            <span class="request_msg_type">Тип автомобиля: </span>
            <span class="request_msg_autotype">Легковой автомобиль</span>
        </div>
        <div class="request_msg_feald">
            <div class="request_msg_carbrand">
<!--                <span>Марка: </span>-->
                <?= BcbBrands::find()->where(['id' => $_POST['requestMarkAuto']])->one()->name; ?>
            </div>
            <div class="request_msg_carbrand">
<!--                <span>Модель: </span>-->
                <?= BcbModels::find()->where(['id' => $_POST['requestModelAuto']])->one()->name; ?>
            </div>
            <div class="request_msg_carbrand">
<!--                <span>Год выпуска: </span>-->
                <?= $post['requestYear'] ?>
            </div>
        </div>
    <?php endif; ?>


    <?php
    /**
     * Грузовой транспорт
     */
    if ($post['typeAuto'] == 2):?>
        <div>
            <span class="request_msg_type">Тип автомобиля: </span>
            <span class="request_msg_autotype">Грузовой автомобиль</span>
        </div>
        <div class="request_msg_feald">
            <div class="request_msg_carbrand">
                <!--            <span>Марка: </span>-->
                <?= AutoComBrands::find()->where(['id' => $_POST['requestMarkAuto']])->one()->name ?>
            </div>
            <div class="request_msg_carbrand">
                <!--            <span>Модель: </span>-->
                <?= AutoComModels::find()->where(['id' => $_POST['requestModelAuto']])->one()->name ?>
            </div>
            <div class="request_msg_carbrand">
                <!--            <span>Год выпуска: </span>-->
                <?= $post['requestYear'] ?>
            </div>
        </div>
    <?php endif; ?>

    <?php
    /**
     * Мото транспорт
     */
    if ($post['typeAuto'] == 3):?>
        <div>
            <span class="request_msg_type">Тип автомобиля: </span>
            <span class="request_msg_autotype">Мото транспорт</span>
        </div>
        <div class="request_msg_feald">
            <div class="request_msg_carbrand">
<!--                <span>Марка: </span>-->
                <?= CarMark::find()->where(['id_car_mark' => $_POST['requestMarkAuto']])->one()->name ?>
            </div>
            <div class="request_msg_carbrand">
<!--                <span>Модель: </span>-->
                <?= CarModel::find()->where(['id_car_model' => $_POST['requestModelAuto']])->one()->name; ?>
            </div>
            <div class="request_msg_carbrand">
<!--                <span>Год выпуска: </span>-->
                <?= $post['requestYear'] ?>
            </div>
        </div>
    <?php endif; ?>

    <h3>Дополнителые параметры</h3>
    <?php foreach ($_POST['infoSplints'] as $is): ?>
        <div><?= $is; ?></div>
    <?php endforeach; ?>
    <div>
        <span class="request_msg_type">Ширина профиля: </span>
        <?= $_POST['section_width']; ?></div>
    <div>
        <span class="request_msg_type">Высота профиля: </span>
        <?= $_POST['section_height']; ?>
    </div>
    <div>
        <span class="request_msg_type">Диаметр профиля: </span>
        <?= $_POST['diameter']; ?>
    </div>
    <div>
        <span class="request_msg_type">Сезонность:</span>
        <?php foreach ($_POST['seasonts'] as $s): ?>
            <?= $s . ' '; ?>
        <?php endforeach; ?>
        (
        <?php foreach ($_POST['shipi'] as $sh): ?>
            <?= $sh . ' '; ?>
        <?php endforeach; ?>
        )
    </div>
<?php endif; ?>


<!--Текст сообщения на заявку Автосервис-->
<?php if ($requestId == 7): ?>
    <?php
    /**
     * Легковой транспорт
     */
    if ($post['typeAuto'] == 1):?>
        <div>
            <span class="request_msg_type">Тип автомобиля: </span>
            <span class="request_msg_autotype">Легковой автомобиль</span>
        </div>
    <?php endif; ?>
    <?php
    /**
     * Грузовой транспорт
     */
    if ($post['typeAuto'] == 2):?>
        <div>
            <span class="request_msg_type">Тип автомобиля: </span>
            <span class="request_msg_autotype">Грузовой автомобиль</span>
        </div>
    <?php endif; ?>

    <?php
    /**
     * Мото транспорт
     */
    if ($post['typeAuto'] == 3):?>
        <div>
            <span class="request_msg_type">Тип автомобиля: </span>
            <span class="request_msg_autotype">Мото транспорт</span>
        </div>
    <?php endif; ?>
    <div>
        <span>Пробег автомобиля: </span><?= $_POST['probeg']; ?>
    </div>
    <div>
        <span class="request_msg_checkelement">КПП:</span>
        <span class="request_msg_checked"></span>
        <?php foreach ($_POST['kpp'] as $kpp): ?>
            <?= AwpTransmission::find()->where(['id' => $kpp])->one()->name; ?>
        <?php endforeach; ?>
    </div>
    <div>
        <span class="request_msg_checkelement">ДВС:</span>
        <span class="request_msg_checked"></span>
        <?php foreach ($_POST['dvs'] as $dvs): ?>
            <?= AwpTypeMotor::find()->where(['id' => $dvs])->one()->name; ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<!-- Текст сообщения на заявку Тюнинг-->

<?php if ($requestId == 8): ?>
    <?php
    /**
     * Легковой транспорт
     */
    if ($post['typeAuto'] == 1):?>
        <div>
            <span class="request_msg_type">Тип автомобиля: </span>
            <span class="request_msg_autotype">Легковой автомобиль</span>
        </div>
        <div class="request_msg_feald">
            <div class="request_msg_carbrand">
                <!--            <span>Марка: </span>-->
                <?= BcbBrands::find()->where(['id' => $_POST['requestMarkAuto']])->one()->name; ?>
            </div>
            <div class="request_msg_carbrand">
                <!--            <span>Модель: </span>-->
                <?= BcbModels::find()->where(['id' => $_POST['requestModelAuto']])->one()->name; ?>
            </div>
            <div class="request_msg_carbrand">
                <!--            <span>Год выпуска: </span>-->
                <?= $post['requestYear'] ?>
            </div>
        </div>
    <?php endif; ?>
    <?php
    /**
     * Грузовой транспорт
     */
    if ($post['typeAuto'] == 2):?>
        <div>
            <span class="request_msg_type">Тип автомобиля: </span>
            <span class="request_msg_autotype">Грузовой автомобиль</span>
        </div>
        <div class="request_msg_feald">
            <div class="request_msg_carbrand">
<!--                <span>Марка: </span>-->
                <?= AutoComBrands::find()->where(['id' => $_POST['requestMarkAuto']])->one()->name ?>
            </div>
            <div class="request_msg_carbrand">
<!--                <span>Модель: </span>-->
                <?= AutoComModels::find()->where(['id' => $_POST['requestModelAuto']])->one()->name ?>
            </div>
            <div class="request_msg_carbrand">
<!--            <span>Год выпуска: </span>-->
                <?= $post['requestYear'] ?>
            </div>
        </div>
    <?php endif; ?>
    <?php
    /**
     * Мото транспорт
     */
    if ($post['typeAuto'] == 3):?>
        <div>
            <span class="request_msg_type">Тип автомобиля: </span>
            <span class="request_msg_autotype"> Мото транспорт</span>
        </div>
        <div class="request_msg_feald">
            <div class="request_msg_carbrand">
<!--                <span>Марка: </span>-->
                <?= CarMark::find()->where(['id_car_mark' => $_POST['requestMarkAuto']])->one()->name ?>
            </div>
            <div class="request_msg_carbrand">
<!--                <span>Модель: </span>-->
                <?= CarModel::find()->where(['id_car_model' => $_POST['requestModelAuto']])->one()->name; ?>
            </div>
            <div class="request_msg_carbrand">
<!--                <span>Год выпуска: </span>-->
                <?= $post['requestYear'] ?>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>

<!-- Текст сообщения на заявку Запчасти-->

<?php if ($requestId == 9 || $requestId == 3): ?>
    <?php
    /**
     * Легковой транспорт
     */
    if ($post['typeAuto'] == 1):?>
        <div>
            <span class="request_msg_type">Тип автомобиля: </span>
            <span class="request_msg_autotype"> Легковой автомобиль</span>
        </div>
        <div class="request_msg_feald">
            <div class="request_msg_carbrand">
                <!--            <span>Марка: </span>-->
                <?= BcbBrands::find()->where(['id' => $_POST['requestMarkAuto']])->one()->name; ?>
            </div>
            <div class="request_msg_carbrand">
                <!--            <span>Модель: </span>-->
                <?= BcbModels::find()->where(['id' => $_POST['requestModelAuto']])->one()->name; ?>
            </div>
            <div class="request_msg_carbrand">
                <!--            <span>Год выпуска: </span>-->
                <?= $post['requestYear'] ?>
            </div>
        </div>
    <?php endif; ?>
    <?php
    /**
     * Грузовой транспорт
     */
    if ($post['typeAuto'] == 2):?>
        <div>
            <span class="request_msg_type">Тип автомобиля: </span>
            <span class="request_msg_autotype">Грузовой автомобиль</span>
        </div>
        <div class="request_msg_feald">
            <div class="request_msg_carbrand">
<!--                <span>Марка: </span>-->
                <?= AutoComBrands::find()->where(['id' => $_POST['requestMarkAuto']])->one()->name ?>
            </div>
            <div class="request_msg_carbrand">
<!--                <span>Модель: </span>-->
                <?= AutoComModels::find()->where(['id' => $_POST['requestModelAuto']])->one()->name ?>
            </div>
            <div class="request_msg_carbrand">
<!--                <span>Год выпуска: </span>-->
                <?= $post['requestYear'] ?>
            </div>
        </div>
    <?php endif; ?>
    <?php
    /**
     * Мото транспорт
     */
    if ($post['typeAuto'] == 3):?>
        <div>
            <span class="request_msg_type">Тип автомобиля: </span>
            <span class="request_msg_autotype">Мото транспорт</span>
        </div>
        <div class="request_msg_feald">
            <div class="request_msg_carbrand">
                <!--            <span>Марка: </span>-->
                <?= CarMark::find()->where(['id_car_mark' => $_POST['requestMarkAuto']])->one()->name ?>
            </div>
            <div class="request_msg_carbrand">
                <!--            <span>Модель: </span>-->
                <?= CarModel::find()->where(['id_car_model' => $_POST['requestModelAuto']])->one()->name; ?>
            </div>
            <div class="request_msg_carbrand">
                <!--            <span>Год выпуска: </span>-->
                <?= $post['requestYear'] ?>
            </div>
        </div>
    <?php endif; ?>
    <div>
        <span class="request_msg_checkelement">КПП:</span>
        <span class="request_msg_checked"></span>
        <?php foreach ($_POST['kpp'] as $kpp): ?>
            <?= AwpTransmission::find()->where(['id' => $kpp])->one()->name; ?>
        <?php endforeach; ?>
    </div>
    <div>
        <span class="request_msg_checkelement">ДВС:</span>
        <span class="request_msg_checked"></span>
        <?php foreach ($_POST['dvs'] as $dvs): ?>
            <?= AwpTypeMotor::find()->where(['id' => $dvs])->one()->name; ?>
        <?php endforeach; ?>
    </div>
    <div>
        <span class="request_msg_checkelement">VIN: </span>
        <div class="request_msg_vincode"><?= $post['vincodeauto'] ?></div>
    </div>
    <h3>Запчасти:</h3>
    <table class="table table-bordered">
        <tr>
            <th>Название</th>
            <th>Номер</th>
        </tr>
        <?php
        $zap = array_combine($_POST['name_zap'], $_POST['kod_zap']);


        foreach ($zap as $key => $value):
            ?>
            <tr>
                <td><?= $key ?></td>
                <td><?= $value; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

<!--Текст сообщения на заявку Диски-->
<?php if ($requestId == 10): ?>
    <?php
    /**
     * Легковой транспорт
     */
    if ($post['typeAuto'] == 1):?>
        <div>
            <span class="request_msg_type">Тип автомобиля: </span>
            <span class="request_msg_autotype">Легковой автомобиль</span>
        </div>
        <div class="request_msg_feald">
            <div class="request_msg_carbrand">
                <!--                <span>Марка: </span>-->
                <?= BcbBrands::find()->where(['id' => $_POST['requestMarkAuto']])->one()->name; ?>
            </div>
            <div class="request_msg_carbrand">
                <!--                <span>Модель: </span>-->
                <?= BcbModels::find()->where(['id' => $_POST['requestModelAuto']])->one()->name; ?>
            </div>
            <div class="request_msg_carbrand">
                <!--                <span>Год выпуска: </span>-->
                <?= $post['requestYear'] ?>
            </div>
        </div>
    <?php endif; ?>


    <?php
    /**
     * Грузовой транспорт
     */
    if ($post['typeAuto'] == 2):?>
        <div>
            <span class="request_msg_type">Тип автомобиля: </span>
            <span class="request_msg_autotype">Грузовой автомобиль</span>
        </div>
        <div class="request_msg_feald">
            <div class="request_msg_carbrand">
                <!--            <span>Марка: </span>-->
                <?= AutoComBrands::find()->where(['id' => $_POST['requestMarkAuto']])->one()->name ?>
            </div>
            <div class="request_msg_carbrand">
                <!--            <span>Модель: </span>-->
                <?= AutoComModels::find()->where(['id' => $_POST['requestModelAuto']])->one()->name ?>
            </div>
            <div class="request_msg_carbrand">
                <!--            <span>Год выпуска: </span>-->
                <?= $post['requestYear'] ?>
            </div>
        </div>
    <?php endif; ?>

    <?php
    /**
     * Мото транспорт
     */
    if ($post['typeAuto'] == 3):?>
        <div>
            <span class="request_msg_type">Тип автомобиля: </span>
            <span class="request_msg_autotype">Мото транспорт</span>
        </div>
        <div class="request_msg_feald">
            <div class="request_msg_carbrand">
                <!--            <span>Марка: </span>-->
                <?= CarMark::find()->where(['id_car_mark' => $_POST['requestMarkAuto']])->one()->name ?>
            </div>
            <div class="request_msg_carbrand">
                <!--            <span>Модель: </span>-->
                <?= CarModel::find()->where(['id_car_model' => $_POST['requestModelAuto']])->one()->name; ?>
            </div>
            <div class="request_msg_carbrand">
                <!--            <span>Год выпуска: </span>-->
                <?= $post['requestYear'] ?>
            </div>
        </div>
    <?php endif; ?>

    <h3>Дополнителые параметры</h3>
    <?php foreach ($_POST['infoDisk'] as $is): ?>
        <div><?= $is; ?></div>
    <?php endforeach; ?>
    <div>
        <span class="request_msg_type">Ширина обода: </span>
        <span class="request_msg_autotype"><?= $_POST['rim_width']; ?></span>
    </div>
    <div>
        <span class="request_msg_type">Диаметр обода: </span>
        <span class="request_msg_autotype"><?= $_POST['diameter']; ?></span>
    </div>
    <div>
        <span class="request_msg_type">Количество крепежных отверстий: </span>
        <span class="request_msg_autotype"><?= $_POST['number_holes']; ?></span>
    </div>
    <div>
        <span class="request_msg_type">Диаметр расположения отверстий: </span>
        <span class="request_msg_autotype"><?= $_POST['diameter_holes']; ?></span>
    </div>
    <div>
        <span class="request_msg_type">Вылет (ET): </span>
        <span class="request_msg_autotype"><?= $_POST['sortie']; ?></span>
    </div>

<?php endif; ?>

<!--Текст сообщения на заявку Автосалон-->
<?php if ($requestId == 12): ?>
    <?php
    /**
     * Легковой транспорт
     */
    if ($post['typeAuto'] == 1):?>
        <div>
            <span class="request_msg_type">Тип автомобиля: </span>
            <span class="request_msg_autotype">Легковой автомобиль</span>
        </div>
        <div class="request_msg_feald">
            <div class="request_msg_carbrand">
<!--                <span>Марки авто: </span>-->
                <?php foreach ($_POST['brand'] as $br): ?>
                    <?= BcbBrands::find()->where(['id' => $br])->one()->name . ' '; ?>
                <?php endforeach; ?>
            </div>
        </div>

    <?php endif; ?>
    <?php
    /**
     * Грузовой транспорт
     */
    if ($post['typeAuto'] == 2):?>
        <div>
            <span class="request_msg_type">Тип автомобиля: </span>
            <span class="request_msg_autotype">Грузовой автомобиль</span>
        </div>
        <div class="request_msg_feald">
            <div class="request_msg_carbrand">
                <!--            <span>Марки авто: </span>-->
                <?php foreach ($_POST['brand'] as $br): ?>
                    <?= AutoComBrands::find()->where(['id' => $br])->one()->name . ' '; ?>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php
    /**
     * Мото транспорт
     */
    if ($post['typeAuto'] == 3):?>
        <div>
            <span class="request_msg_type">Тип автомобиля: </span>
            <span class="request_msg_autotype">Мото транспорт</span>
        </div>
        <div class="request_msg_feald">
            <div class="request_msg_carbrand">
                <!--            <span>Марки авто: </span>-->
                <?php foreach ($_POST['brand'] as $br): ?>
                    <?= CarMark::find()->where(['id_car_mark' => $br])->one()->name . ' '; ?>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

<?php endif; ?>


<!-- Текст сообщения на заявку Страхование-->

<?php if ($requestId == 13): ?>
    <?php
    /**
     * Легковой транспорт
     */
    if ($post['typeAuto'] == 1):?>
        <div>
            <span class="request_msg_type">Тип автомобиля: </span>
            <span class="request_msg_autotype">Легковой автомобиль</span>
        </div>
        <div class="request_msg_feald">
            <div class="request_msg_carbrand">
                <!--            <span>Марка: </span>-->
                <?= BcbBrands::find()->where(['id' => $_POST['requestMarkAuto']])->one()->name; ?></div>
            <div class="request_msg_carbrand">
                <!--            <span>Модель: </span>-->
                <?= BcbModels::find()->where(['id' => $_POST['requestModelAuto']])->one()->name; ?></div>
            <div class="request_msg_carbrand">
                <!--            <span>Год выпуска: </span>-->
                <?= $post['requestYear'] ?></div>
        </div>
    <?php endif; ?>


    <?php
    /**
     * Грузовой транспорт
     */
    if ($post['typeAuto'] == 2):?>
        <div>
            <span class="request_msg_type">Тип автомобиля: </span>
            <span class="request_msg_autotype">Грузовой автомобиль</span>
        </div>
        <div class="request_msg_feald">
            <div class="request_msg_carbrand">
                <!--            <span>Марка: </span>-->
                <?= AutoComBrands::find()->where(['id' => $_POST['requestMarkAuto']])->one()->name ?></div>
            <div class="request_msg_carbrand">
                <!--            <span>Модель: </span>-->
                <?= AutoComModels::find()->where(['id' => $_POST['requestModelAuto']])->one()->name ?></div>
            <div class="request_msg_carbrand">
                <!--            <span>Год выпуска: </span>-->
                <?= $post['requestYear'] ?></div>
        </div>
    <?php endif; ?>

    <?php
    /**
     * Мото транспорт
     */
    if ($post['typeAuto'] == 3):?>
        <div>
            <span class="request_msg_type">Тип автомобиля: </span>
            <span class="request_msg_autotype">Мото транспорт</span>
        </div>
        <div class="request_msg_feald">
            <div class="request_msg_carbrand">
                <!--            <span>Марка: </span>-->
                <?= CarMark::find()->where(['id_car_mark' => $_POST['requestMarkAuto']])->one()->name ?></div>
            <div class="request_msg_carbrand">
                <!--            <span>Модель: </span>-->
                <?= CarModel::find()->where(['id_car_model' => $_POST['requestModelAuto']])->one()->name; ?></div>
            <div class="request_msg_carbrand">
                <!--            <span>Год выпуска: </span>-->
                <?= $post['requestYear'] ?>
            </div>
        </div>
    <?php endif; ?>
    <div class="request_msg_feald">
        <div class="request_msg_feald--element">
<!--            <span>Дата начала эксплуатации:</span>-->
            <?= $_POST['dateStart']; ?>
        </div>
        <div class="request_msg_feald--element">
<!--            <span>Количество лошадиных сил:</span>-->
            <?= $_POST['kol_Cil']; ?>
        </div>
        <div class="request_msg_feald--element">
<!--            <span>Побег:</span>-->
            <?= $_POST['probeg']; ?>
        </div>
        <div class="request_msg_feald--disk">
<!--            <span>Страховая сумма:</span>-->
            <?= $_POST['summaStrah']; ?>
        </div>
    </div>
    <div>
        <span class="request_msg_checkelement">Автомобиль куплен в кредит?</span>
        <span class="request_msg_checked"></span>
        <?= $_POST['kredit']; ?>
    </div>
    <div>
        <span class="request_msg_checkelement">КПП:</span>
        <span class="request_msg_checked"></span>
        <?= $_POST['kpp']; ?>
    </div>
    <div>
        <span class="request_msg_checkelement">Охранная система:</span>
        <span class="request_msg_checked"></span>
        <?= $_POST['securitySystem']; ?></div>
    <div>
        <span class="request_msg_checkelement">Наличие системы автозапуска:</span>
        <span class="request_msg_checked"></span>
        <?= $_POST['autoloadSystem']; ?>
    </div>
    <div>
        <span class="request_msg_checkelement">Иммобилайзер:</span>
        <span class="request_msg_checked"></span>
        <?= $_POST['imobilaizer']; ?>
    </div>
    <div>
        <span class="request_msg_checkelement">Поисково-спутниковая система:</span>
        <span class="request_msg_checked"></span>
        <?= $_POST['poiskspytniksystem']; ?>
    </div>
    <div>
        <span class="request_msg_checkelement">Механические противоугонные устройства:</span>
        <span class="request_msg_checked"></span>
        <?= $_POST['mexprotivygon']; ?>
    </div>


<?php endif; ?>


<div class="request_msg_block">
    <h3>Дополнительные работы:</h3>
    <?php foreach ($selectFields as $fields): ?>
        <div class="request_msg_add">
            <span class="request_msg_checked"></span>
            <?= AdditionalFields::findOne($fields)->name; ?>
        </div>
    <?php endforeach; ?>
</div>

<div class="request_msg_block">
    <h3>Комментарий</h3>

    <div>
        <?= $_POST['comm']; ?>
    </div>
</div>

