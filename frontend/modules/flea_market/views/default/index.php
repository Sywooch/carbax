<?php
use yii\widgets\Breadcrumbs;
$this->title = "Мои объявления";
$this->registerCssFile('/css/bootstrap_btn.min.css');
$this->params['breadcrumbs'][] = ['label' => 'Личный кабинет', 'url' => ['/office']];
$this->params['breadcrumbs'][] = $this->title;
?>


<section class="main-container">
    <div class="ddd">

        </div>

    <h1><?= $this->title ?></h1>
    <button onclick="location.href='/flea_market/default/add?type=zap'" type="button" class="btn btn-success addServiceBtn">Добавить объявление</button>
    <table class="addAllServices">
        <?php
        foreach ($market as $mark) {
            ?>
            <tr>
            <td>
                <a href="<?= \yii\helpers\Url::to(['/flea-market/view','id'=>$mark->id])?>"><b><?=$mark->name?></b></a>
            </td>
            <td>
                <?php
                    switch($mark->published) {
                        case 0:
                            echo "На модерации";
                            break;
                        case 1:
                            echo "Опубликовано";
                            break;
                        case 2:
                            echo "Заблокировано";
                            break;
                    }
                ?>
            </td>
            <td class="addAllServices__control">
                <a href="/flea_market/default/edit_product?id=<?=$mark->id?>&type=zap">редактировать </a>
                <a href="/flea_market/default/product_delite?id=<?=$mark->id?>" data-confirm="Вы действительно хотите удалить?">удалить</a>
            </td>
        </tr>
        <?php    }

        ?>

    </table>

</section>
