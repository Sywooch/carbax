<?php
/**
 * @var $reclama common\models\db\Reclame
 */


use common\classes\Parser;

$this->title = "Реклама CARBAX | CARBAX все автоуслуги Вашего города";
//$this->params['breadcrumbs'][] = ['label' => 'Реклама на Carbax'];
$this->params['breadcrumbs'][] = 'Реклама на Carbax';

?>

<section class="single_wrapper">
    <div class="contain">
        <!-- ___________________Левый сайдбар_______________________ -->
        <div class="add__sbar-l">


            <?= \frontend\modules\reklama\widgets\ReklamaMenu::widget(); ?>

        </div>




        <!-- ___________________Левый сайдбар_______________________ -->
        <section class="main-container">
            <h2>Мои компании на промо CARBAX</h2>
            <?php
                foreach ($reclama as $item):  ?>

                    <div class="myPromoWr">
                        <div class="myPromoTemplate">


                            <?= Parser::parse($item['reclame_template']->tpl,['title' => $item->title,'descr'=>$item->description, 'img'=>'<img id="blah" src="/'.$item->images.'" />', 'info'=>''],false,false);?>
                        </div>


                        <div class="myPromoInfo">
                            <div class="myPromoTitle">
                                <?= $item->name; ?>
                            </div>
                                <?php
                                    if($item->type_budget == 1): ?>
                                        <div class="myPromoOverall">
                                            <span>Всего кликов: <?= $item->overall; ?></span>
                                        </div>
                                        <div class="myPromoUsed">
                                            <span>Использованно: <?= $item->used; ?></span>
                                        </div>
                                        <div class="myPromoUsed">
                                            <span>Осталось: <?= $item->overall - $item->used; ?></span>
                                        </div>
                                    <?php else: ?>
                                        <div class="myPromoOverall">
                                            <span>Всего показов: <?= $item->overall; ?></span>
                                        </div>
                                        <div class="myPromoUsed">
                                            <span>Использованно: <?= $item->used; ?></span>
                                        </div>
                                        <div class="myPromoUsed">
                                            <span>Осталось: <?= $item->overall - $item->used; ?></span>
                                        </div>
                                    <?php endif; ?>
                            <div class="myPromoBudget"><span>Бюджет: <?= $item->price?></span></div>
                        </div>
                        <div class="myPromoPanel">
                            <div class="offersRenewWr">
                                        <span class="offersRenew">
                                            <span class="offerRenewImg"></span>
                                        </span>
                                <span class="offersRenewBuy"><a href="#">Возобновить</a></span>
                            </div>
                            <a class="btn btn-del" href="#">Удалить</a>
                        </div>
                    </div>


            <?php endforeach; ?>
        </section>
    </div>
</section>