<?php
use common\classes\Debug;
use common\models\db\GeobaseCity;
use common\models\db\GeobaseRegion;
use common\models\db\Services;
use yii\helpers\Html;
use yii\helpers\Url;


$this->title = "Профиль " . $user['username'];
$this->params['breadcrumbs'][] = ['label' => 'Личный кабинет', 'url' => ['/office']];
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile('/css/bootstrap.min.css');
?>

<section class="main-container">
    <div class="profileWrap">
        <div class="headerProfile">
            <?php if(!empty($user['avatar'])): ?>
            <div class="profileAvatar">
                <?= Html::img('/'.$user['avatar'], ['width' => '200'])?>
                <?php if($user['id'] != Yii::$app->user->id): ?>
                    <a href="/message/default/send_message?from=<?=$_GET['id'];?>" class="btn btn-info btn-xs write_message">Написать сообщение</a>
                <?php endif; ?>
            </div>
            <?php endif; ?>
            <div class="infoProfile">
                <?php if(!empty($user['name'])): ?>
                <div class="profileName profileElement">
                    <?=$user['name']?> <?=$user['last_name']?>
                    <?= Html::a('Удалить профиль',Url::to(['/profile/default/delete']),['class' => 'delProfile']); ?>
                </div>
                <?php endif; ?>
                <div class="profileLogin profileElement">
                    Логин: <?=$user['username']?>
                </div>

                <div class="header_block">
                    <span>Бизнес</span>
                    <?php if($user['id'] == Yii::$app->user->id): ?>
                        <a href="<?= Url::to('/select_service');?>" class="addBussines">Добавить</a>
                    <?php endif;?>
                </div>
                <?php if(!empty($serviceType)):?>
                    <?php $i = 1;?>
                    <?php foreach($serviceType as $st):?>
                        <div class="userBis">
                            <span>Бизнес<?= $i; ?>:</span>
                            <span><?= $st->name; ?></span>
                        </div>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="userBis">У вас нет бизнеса</div>
                <?php endif;?>
                <div class="header_block">
                    <span>Контактная информация</span>
                    <?php if($user['id'] == Yii::$app->user->id): ?>
                        <?= Html::a('Редактировать', ['/profile/default/edit_contacts']); ?>
                    <?php endif;?>
                </div>
                <div class="profileEmail profileElement">
                    Email: <?=$user['email']?>
                </div>
                <?php if(!empty($user['skype'])): ?>
                    <div class="profileSkype profileElement">
                        Skype: <?=$user['skype']?>
                    </div>
                <?php endif; ?>
                <?php if(!empty($user['telephon'])): ?>
                    <div class="profileTelephon profileElement">
                        Телефон: <?=$user['telephon']?>
                    </div>
                <?php endif; ?>
                <?php if(!empty($user['icq'])): ?>
                    <div class="profileIcq profileElement">
                        ICQ: <?=$user['icq']?>
                    </div>
                <?php endif; ?>
                <?php if(!empty($user['link_vk'])): ?>
                    <div class="profileLink_vk profileElement">
                        ВК: <?=$user['link_vk']?>
                    </div>
                <?php endif; ?>

                <?php if($user['region_id'] != 0): ?>
                    <div class="profileRegion_id profileElement">
                        Регион: <?= GeobaseRegion::find()->where(['id'=>$user['region_id']])->one()->name?>
                    </div>
                <?php endif; ?>

                <?php if($user['city_id'] != 0): ?>
                    <div class="profileCity_id profileElement">
                        Город: <?= GeobaseCity::find()->where(['id'=>$user['city_id']])->one()->name?>
                    </div>
                <?php endif; ?>
            </div>

        <div class="cleared"></div>
        <?php if(!empty($autoGarage)): ?>
            <div class="header_block">
                <span>Мой гараж</span>
                <?php if($user['id'] == Yii::$app->user->id): ?>
                    <?= Html::a('Редактировать', ['/garage']); ?>
                <?php endif;?>
            </div>
            <?php foreach($autoGarage as $ag): ?>
                <div class="deals__item">
                    <div class="deals__block">
                        <div class="deals__block-img">
                            <?php if(!empty($ag->auto_widget[0]->photo)): ?>
                                <img src="/<?= $ag->auto_widget[0]->photo; ?>" alt="">
                            <?php else: ?>
                                <img src="/media/img/no_img.jpg" alt="">
                            <?php endif; ?>
                        </div>
                        <div class="deals__block-desc">
                            <p><?= $ag['title']; ?></p>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <span>В гараже нет машин</span>
        <?php endif; ?>
        <div class="cleared"></div>

        <?php// Debug::prn($serviceType);?>

        <?php if(!empty($serviceType)): ?>
            <?php foreach($serviceType as $st): ?>
                <div class="header_block">
                    <span><?= $st->name; ?></span>
                    <?php if($user['id'] == Yii::$app->user->id): ?>
                        <?= Html::a('Редактировать', ['/services/services/my_services','service_id'=>$st->id]); ?>
                    <?php endif;?>
                </div>
                <?php
                    $service = Services::find()
                        ->leftJoin('`services_img`','`services_img`.`id` = `services_img`.`services_id`')
                        ->where(['`services`.`user_id`'=>$user['id'], 'service_type_id'=>$st->id])
                        ->with('services_img')
                        ->all();
//Debug::prn($service);
                foreach ($service as $s) :?>
                    <a href="/services/services/view_service?service_id=<?= $s->id; ?>">
                        <div class="deals__item">
                            <div class="deals__block">
                                <div class="deals__block-img">
                                    <?php if(isset($s['photo'])):?>
                                        <img src="/<?= \yii\helpers\Url::base().$s['services_img']->images ?>" alt="">
                                    <?php else: ?>
                                        <img src="/media/img/no_img.jpg" alt="">
                                    <?php endif; ?>
                                </div>
                                <div class="deals__block-desc">
                                    <p><?= $s['name']; ?></p>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php
                    endforeach;
                ?>


            <?php endforeach; ?>
        <?php endif ?>



    </div>
    <?php /*if($user['id'] != Yii::$app->user->id): */?><!--
        <a href="/message/default/send_message?from=<?/*=$_GET['id'];*/?>" class="btn btn-info btn-xs">Написать сообщение</a>
    --><?php /*endif; */?>
    </div>
</section>