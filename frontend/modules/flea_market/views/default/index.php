<?php
$this->title = "Мои запчасти";
$this->registerCssFile('/css/bootstrap_btn.min.css');
?>
<section class="main-container">
    <?php
    if (isset($info)) {
        ?>
        <div id="serviceInfo"><?= $info; ?></div>
    <?php
    }
    ?>
    <button onclick="location.href='/flea_market/default/add'" type="button" class="btn btn-success addServiceBtn">Добавить запчасть</button>
    <table class="addAllServices">
        <?php
        foreach ($market as $mark) {
            ?>
            <tr>
            <td>
                <a href="/flea_market/default/view_product?id=<?=$mark->id?>"><b><?=$mark->name?></b></a>
            </td>
            <td class="addAllServices__control">
                <a href="#">редактировать </a>/
                <a href="#" data-confirm="Вы действительно хотите удалить?">удалить</a>
            </td>
        </tr>
        <?php    }

        ?>

    </table>
</section>
