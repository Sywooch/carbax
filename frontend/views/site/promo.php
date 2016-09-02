<?php
$this->title = 'Промо CARBAX';

//$this->registerCssFile('/css/reklama/normalize.css');
$this->registerCssFile('/css/reklama/commercial.min.css');
?>

<section class="promo__head">
    <div class="container">
        <div class="promo_ad">
            <a href="<?= \yii\helpers\Url::to(['reklama']) ?>">&lt; Реклама на Carbax</a>
            <h2>Carbax <span>Промо</span></h2>
            <div class="promo_ad_border">
                <h3>Находите правильных покупателей, увеличивайте продажи!</h3>
                <h3> Быстро, просто, эффективно.</h3>
                <p>СРМ - от 29 рублей за 1000 показов <br>СРС - от 1 рубля за клик</p>
            </div>

        </div>
    </div>
</section>
<section class="promo__advantages">
    <div class="container">
        <div class="promo__advantages_item">
            <div class="promo__advantages_item_thumb">
                <img src="/media/img/reklama/promo_check.png">
            </div>
            <div class="promo__advantages_item_text">
                <h3>Создайте компанию</h3>
            </div>
        </div>
        <div class="promo__advantages_item">
            <div class="promo__advantages_item_thumb">
                <img src="/media/img/reklama/promo_people.png">
            </div>
            <div class="promo__advantages_item_text">
                <h3>Выберите свою аудиторию</h3>
            </div>
        </div>
        <div class="promo__advantages_item">
            <div class="promo__advantages_item_thumb">
                <img src="/media/img/reklama/promo_plan.png">
            </div>
            <div class="promo__advantages_item_text">
                <h3>Запустите рекламу и увеличивайте продажи</h3>
            </div>
        </div>
        <a href="<?= \yii\helpers\Url::to(['/my-reklama/add-promo']); ?>" class="knopka">Запустить рекламную кампанию</a>
    </div>
</section>
<section class="promo__tab">
    <div class="container">
        <input type="radio" name="nav" id="one" checked="checked"/>
        <label for="one">Создание компании</label>

        <input type="radio" name="nav" id="two"/>
        <label for="two">Фораты</label>

        <input type="radio" name="nav" id="three"/>
        <label for="three">Таргетинг</label>

        <input type="radio" name="nav" id="four"/>
        <label for="four">Стоимость</label>

        <input type="radio" name="nav" id="five"/>
        <label for="five">FAQ</label>

        <article class="content one">
            <h3>Для создания рекламной кампании вам необходимо зарегистрироваться на CARBAX или воспользоваться уже существующим аккаунтом. Создание и управление кампаниями производится через интерфейс Сarbax Промо в Личном кабинете.</h3>
            <div class="promo__tab_item">
                <div class="promo__tab_item_pic">
                    <img src="/media/img/reklama/tab_key.png">
                </div>
                <div class="promo__tab_item_cont">
                    <p>1. Зайдите в свой аккаунт</p>
                </div>
            </div>
            <div class="promo__tab_item">
                <div class="promo__tab_item_pic">
                    <img src="/media/img/reklama/tab_check.png">
                </div>
                <div class="promo__tab_item_cont">
                    <p>2. Создайте кампанию</p>
                </div>
            </div>
            <div class="promo__tab_item">
                <div class="promo__tab_item_pic">
                    <img src="/media/img/reklama/tab_people.png">
                </div>
                <div class="promo__tab_item_cont">
                    <p>3. Таргетируйте свою аудиторию</p>
                </div>
            </div>
            <div class="promo__tab_item">
                <div class="promo__tab_item_pic">
                    <img src="/media/img/reklama/tab_settings.png">
                </div>
                <div class="promo__tab_item_cont">
                    <p>4. Настройте бюджет</p>
                </div>
            </div>
            <div class="promo__tab_item">
                <div class="promo__tab_item_pic">
                    <img src="/media/img/reklama/tab_comp.png">
                </div>
                <div class="promo__tab_item_cont">
                    <p>5. Отслеживайте эффективность</p>
                </div>
            </div>
        </article>

        <article class="content two">
            <h3>Why do we use it?</h3>
        </article>

        <article class="content three">

            <h3>Why do we use it?</h3>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>

        </article>
        <article class="content four">
            <h3>Why do we use it?</h3>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
        </article>
        <article class="content five">
            <h3>Why do we use it?</h3>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
        </article>
    </div>
</section>
<section class="promo__company">
    <div class="container">
        <a href="<?= \yii\helpers\Url::to(['/my-reklama/add-promo']); ?>" class="knopka">Запустить рекламную кампанию</a>
        <p>Начните самостоятельное создание рекламной кампании прямо сейчас. <br>Определитесь с целями, решите, сколько вы готовы вложить в рекламу, и приступайте к работе с Carbax Промо.</p>
    </div>
</section>