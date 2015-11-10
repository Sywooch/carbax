<?php
use yii\helpers\Html;

$this->title = 'Типы авто';
?>

<div class="auto_type-default-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>Название</th>
                <th>Ярлык</th>
            </tr>
        </thead>
        <tbody>
    <?php
    $k = 1;
        foreach($auto as $a){
            ?>
                <tr data-key="13">
                    <td><?=$k;?></td>
                    <td><?=$a->id;?></td>
                    <td><?=$a->name;?></td>
                    <td><img src="<?=$a->img_url;?>" alt=""></td>
                </tr>
        <? $k++;
        }
    ?>
                </tbody></table>
</div>
