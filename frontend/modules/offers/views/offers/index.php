<?php

use common\classes\Debug;
use common\models\db\OffersAttend;
use common\models\db\OffersImages;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Спецпредложения';
$this->params['breadcrumbs'][] = ['label' => 'Личный кабинет', 'url' => ['/office']];
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile('/css/bootstrap.min.css');
?>


<section class="main-container">
    <div class="offers_page">
        <div class="offers__offers-list">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#offersActive" data-toggle="tab">Активные</a></li>
                <li><a href="#offersArhive" data-toggle="tab">Архивные</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade in active" id="offersActive">
                    <?php
                    //Debug::prn($models);
                    foreach ($models as $n): ?>
                        <?php if(strtotime(date('Y-m-d')) < strtotime($n->dt_end)):?>
                            <?php
                                $decisonY = OffersAttend::find()->where(['offers_id' => $n->id, 'decison' => '1'])->count();
                                $decisonN = OffersAttend::find()->where(['offers_id' => $n->id, 'decison' => '0'])->count();
                            ?>

                            <div class="offersInfpWr">
                                <div class="offersTitle">
                                    <a href="/offers/offers/view?id=<?=$n->id; ?>"><h3><?=$n->title;?></h3></a>
                                </div>
                                <div class="offers__block">
                                    <a href="/offers/offers/view?id=<?=$n->id; ?>">
                                        <img src="/<?= OffersImages::find()->where(['offers_id'=>$n->id])->one()->images; ?>" alt="">
                                    </a>
                                </div>

                                <div class="offersControl">
                                    <span class="offersStatusZag">Состояние: </span>
                                    <span class="offersStatusVal"><?= ($n->status == 1) ? 'Опубликовано' : 'Не опубликовано'; ?></span>
                                    <div class="cleared"></div>

                                    <div class="offersVipWr">
                                        <span class="offersVip">
                                            Статус VIP
                                        </span>
                                        <span class="offersVipBuy"><a href="<?= Url::to(['#']); ?>">Купить</a></span>
                                    </div>

                                    <a class="btn btn-del" href="<?= Url::to(['offers/delete', 'id' => $n->id]); ?>">Удалить</a>
                                </div>

                                <div class="decionOffersWr">
                                    <div class="offers_agreement">
                                        <div class="offers_agreement--count">
                                            <p class="decisonY"><?= $decisonY; ?></p>
                                        </div>
                                        <div class="offers_agreement--text">
                                            <p>Я приеду</p>
                                        </div>
                                    </div>

                                    <div class="offers_agreement--future">
                                        <div class="offers_agreement--count">
                                            <p class="decisonN"><?= $decisonN; ?></p>
                                        </div>
                                        <div class="offers_agreement--text">
                                            <p>Возможно приеду</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="cleared"></div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <div class="tab-pane fade" id="offersArhive">
                    <?php foreach ($models as $n): ?>
                        <?php if(strtotime(date('Y-m-d')) > strtotime($n->dt_end)):?>
                            <?php
                            $decisonY = OffersAttend::find()->where(['offers_id' => $n->id, 'decison' => '1'])->count();
                            $decisonN = OffersAttend::find()->where(['offers_id' => $n->id, 'decison' => '0'])->count();
                            ?>

                            <div class="offersInfpWr">
                                <div class="offersTitle">
                                    <a href="/offers/offers/view?id=<?=$n->id; ?>"><h3><?=$n->title;?></h3></a>
                                </div>
                                <div class="offers__block">
                                    <a href="/offers/offers/view?id=<?=$n->id; ?>">
                                        <img src="/<?= OffersImages::find()->where(['offers_id'=>$n->id])->one()->images; ?>" alt="">
                                    </a>
                                </div>

                                <div class="offersControl">
                                    <span class="offersStatusZag">Состояние: </span>
                                    <span class="offersStatusVal"><?= ($n->status == 1) ? 'Опубликовано' : 'Не опубликовано'; ?></span>
                                    <div class="cleared"></div>




                                    <div class="offersVipWr">
                                        <span class="offersVip">
                                            Статус VIP
                                        </span>
                                        <span class="offersVipBuy"><a href="<?= Url::to(['#']); ?>">Купить</a></span>
                                    </div>
                                    <div class="cleared"></div>
                                    <div class="offersRenewWr">
                                        <span class="offersRenew">
                                            <span class="offerRenewImg"></span>
                                        </span>
                                        <span class="offersRenewBuy"><a href="<?= Url::to(['/offers/offers/edit','id'=> $n->id]); ?>">Возобновить</a></span>
                                    </div>

                                    <a class="btn btn-del" href="<?= Url::to(['offers/delete', 'id' => $n->id]); ?>">Удалить</a>
                                </div>

                                <div class="decionOffersWr">
                                    <div class="offers_agreement">
                                        <div class="offers_agreement--count">
                                            <p class="decisonY"><?= $decisonY; ?></p>
                                        </div>
                                        <div class="offers_agreement--text">
                                            <p>Я приеду</p>
                                        </div>
                                    </div>

                                    <div class="offers_agreement--future">
                                        <div class="offers_agreement--count">
                                            <p class="decisonN"><?= $decisonN; ?></p>
                                        </div>
                                        <div class="offers_agreement--text">
                                            <p>Возможно приеду</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="cleared"></div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>










        <!--<div class="offersActive">Активные</div>
        <div class="offersArhive">Архивные</div>-->

            <!--<table class="table table-condensed">
                <tr>
                    <th>Изображение</th>
                    <th>Название</th>
                    <th></th>
                </tr>
            <?php /*foreach ($models as $n): */?>
                <tr>
                    <td> <div class="offers__block"><img src="<?/*= $n->img_url */?>" alt=""></div></td>
                    <td><a href="<?/*= Url::to(['offers/view', 'id' => $n->id]) */?>" class="offers__block-title"><?/*= $n->title */?></a></td>
                    <td><a class="btn btn-default btn-xs" href="<?/*= Url::to(['offers/edit', 'id' => $n->id]); */?>">Редактировать</a>
                        <a class="btn btn-danger btn-xs" href="<?/*= Url::to(['offers/delete', 'id' => $n->id]); */?>">Удалить</a></td>
                </tr>
            <?php /*endforeach; */?>
            </table>
     
        --><?php
/*        // display pagination*/
        //echo LinkPager::widget(['pagination' => $pages]); ?>
        </div>
    </div>
</section>