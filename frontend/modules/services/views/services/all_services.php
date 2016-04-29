<?php
/**
 * @var $address array
 * @var $services \frontend\modules\services\Services
 * @var $count
 * @var $description
 */

use frontend\modules\services\widgets\FilterServices;
use yii\widgets\LinkPager;

$this->registerJsFile('/js/filter.js',['yii\web\JqueryAsset']);
$this->title = $description .' | CARBAX все автоуслуги Вашего города';
$this->params['breadcrumbs'][] = 'Все автосервисы';

$this->registerMetaTag([
    'name' => 'description',
    'content' => $description,
]);

$this->registerMetaTag([
    'name' => 'keywords',
    'content' => $description ,
]);

?>

<section class="main-container">
    <?= FilterServices::widget(['address' => $address, 'count' => $count])?>

    <div class="deals__line allServicesView">

        <?php foreach($services as $service):
            ?>
            <a href="<?= \yii\helpers\Url::to(['/services/services/view_service','service_id' => $service->id])?>">
                <div class="deals__item">
                    <div class="deals__block">
                        <div class="deals__block-typeService"><img src="<?=$service['service_type']['icon']?>" alt=""></div>
                        <div class="deals__block-img">
                            <img src="/<?= $service['services_img']['images'] ?>" alt="<?= $service->name?>">
                            <div class="deals__block-desc nameService">
                                <p><?= $service->name?></p>
                            </div>
                        </div>

                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
<div class="cleared"></div>
    <?= LinkPager::widget(['pagination' => $pagination]) ?>

</section>
