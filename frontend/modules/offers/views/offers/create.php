<?php

use common\classes\Debug;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\db\News */

$this->title = 'Создать спецпредложение';
$this->params['breadcrumbs'][] = ['label' => 'Личный кабинет', 'url' => ['/office']];
$this->params['breadcrumbs'][] = ['label' => 'Спецпредложения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if(empty($services)): ?>
    <?= $this->render('error_offers');?>
<?php else:?>
    <?= $this->render('_form', [
        'model' => $model,
        'services' => $services,
    ]) ?>
<?php endif;
