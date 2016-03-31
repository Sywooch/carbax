<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
$this->params['breadcrumbs'][] = $this->title;

?>
<!--<div class="site-error">

    <h1><?/*= Html::encode($this->title) */?></h1>

    <div class="alert alert-danger">
        <?/*= nl2br(Html::encode($message)) */?>
    </div>

    <p>
        The above error occurred while the Web server was processing your request.
    </p>
    <p>
        Please contact us if you think this is a server error. Thank you.
    </p>

</div>-->

<?php if(($exception->statusCode == '404') || ($exception == '404')) {  ?>
                <p class="text-center">
                        <?= Html::img('/media/img/ooops.png'); ?>
                </p>
                <p class="regInfo"><span class="regInfoOrange">Такой страницы</span> <span class="regInfoMail">не существует...</span></p>
                <p class="subErrorOffers">С наилучшими пожеланиями, администрация автопортала Carbax.ru</p>

<? } else { ?>

        <h1><?= Html::encode($this->title) ?></h1>

        <div class="alert alert-danger">
                <?= nl2br(Html::encode($message)) ?>
        </div>
        <p>
                The above error occurred while the Web server was processing your request.
        </p>
        <p>
                Please contact us if you think this is a server error. Thank you.
        </p>
<? } ?>
