<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use backend\widgets\MainAdminMenu;
use common\classes\Media;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?= MainAdminMenu::widget() ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<div class="modal fade media_upload" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="media-default-index">
                <?php
                $dir = new Media();
                $media = $dir->get_contents_directory();
                $dir->print_contents_directory($media);
                ?>

            </div>
            <div>
                <button class="btn btn-primary select_img">Выбрать</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal maedia__uploadFiles" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <p>Загрузите файлы</p>
            <form id="upload" method="post" action="/secure/media/default/upload_files" enctype="multipart/form-data">
                <div id="drop">
                    Перетяните файлы или

                    <a>Выберите</a>
                    <input type="file" name="upl" multiple />
                </div>

                <input type="hidden" name="media__path_upload" id="media__path_upload" value="images/"/>
                <ul>
                    <!-- загрузки будут показаны здесь -->
                </ul>

            </form>
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-sm-rename" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <p>Введите название папки</p>
            <input type="text" class="media__rename_folder" name="media__name_folder" id=""/>
            <button class="media__rename__folder">Переименовать</button>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
