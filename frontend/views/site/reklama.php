<?php
$this->title = "Реклама CARBAX | CARBAX все автоуслуги Вашего города";
//$this->params['breadcrumbs'][] = ['label' => 'Реклама на Carbax'];
$this->params['breadcrumbs'][] = 'Реклама на Carbax';
?>

<section class="single_wrapper">
    <div class="contain">
        <!-- ___________________Левый сайдбар_______________________ -->
        <div class="add__sbar-l">
            <ul class="reklamaMenu">
                <li><a class="active" href="#">Реклама на Carbax</a></li>

                <li><a href="<?= \yii\helpers\Url::to(['vip']) ?>">Carbax VIP</a></li>
                <li><a href="<?= \yii\helpers\Url::to(['promo']) ?>">Carbax Промо</a></li>
                <li><a href="<?= \yii\helpers\Url::to(['contekst']) ?>">Carbax Контекст</a></li>
            </ul>
        </div>
        <!-- ___________________Левый сайдбар_______________________ -->
        <section class="main-container">
            <div class="serviceSelectWrap">
                <h2>Реклама на Carbax</h2>

                <p class="reklamaText">Carbax для рекламодателя — один из наиболее эффективных инструментов продвижения в Рунете. Сочетание федерального охвата и активности пользователей, направленной на поиск товаров и услуг, позволяют донести рекламное сообщение до миллионов потенциальных покупателей вашего товара во всех категориях!</p>

                <span class="orange reklamaText">Продвигайте ваш бизнес, используя рекламные инструменты Carbax!</span>

                <div class="content">

                    <div class="reklamaWr">
                        <div class="reklamaImg">
                            <img src="/media/img/reklama/magaz.jpg" alt="">
                        </div>
                        <a href="<?= \yii\helpers\Url::to(['vip']) ?>">
                            <div class="reklamaTitle">
                                <p><span>Carbax VIP</span> — это эффективный способ быстро найти покупателей и увеличить продажи.</p>
                            </div>
                        </a>
                        <div class="reklamaDesc">
                            <p>Он подходит для любого формата бизнеса: как компаниям, так и частным предпринимателям.</p>
                        </div>
                    </div>

                    <div class="reklamaWr">
                        <div class="reklamaImg">
                            <img src="/media/img/reklama/promo.jpg" alt="">
                        </div>
                        <a href="<?= \yii\helpers\Url::to(['promo']) ?>">
                            <div class="reklamaTitle">
                                <p><span>Carbax Промо</span> — самостоятельное размещение рекламы.</p>
                            </div>
                        </a>
                        <div class="reklamaDesc">
                            <p>Находите правильных покупателей, увеличивайте продажи. Быстро, просто, эффективно.</p>
                        </div>
                    </div>

                    <div class="reklamaWr">
                        <div class="reklamaImg">
                            <img src="/media/img/reklama/kontext.jpg" alt="">
                        </div>
                        <a href="<?= \yii\helpers\Url::to(['contekst']) ?>">
                            <div class="reklamaTitle">
                                <p><span>Carbax Контекстн</span> — инструмент продвижения для интернет-магазинов.</p>
                            </div>
                        </a>
                        <div class="reklamaDesc">
                            <p>Привлекайте покупателей с Carbax на страницы своего интернет-магазина.</p>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
</section>