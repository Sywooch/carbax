<?php
/* @var $this yii\web\View */
use frontend\modules\mainpage\widgets\MainPageMap;
use frontend\modules\news\widgets\NewsWidgetFront;
use frontend\modules\offers\widgets\OffersWidgetFront;
use frontend\widgets\FleaMarketMostViewed;
use frontend\widgets\FleaMarketNewProduct;
use frontend\widgets\FleaMarketSearch;
use frontend\widgets\SelectRequestTypes;
use yii\helpers\Url;

$this->title = "CARBAX все автоуслуги Вашего города | Автопортал";
$this->registerMetaTag([
    'name' => 'description',
    'content' => $seo->meta_description,
]);

$this->registerMetaTag([
    'name' => 'keywords',
    'content' => $seo->meta_keywords,
]);

$this->registerMetaTag([
    'name' => 'og:title',
    'content' => "CARBAX все автоуслуги Вашего города | Автопортал",
]);

$this->registerMetaTag([
    'name' => 'og:type',
    'content' => "article",
]);

$this->registerMetaTag([
    'name' => 'og:image',
    'content' => 'http://carbax.ru/media/img/LogoBlack.png',
]);

$this->registerMetaTag([
    'name' => 'og:url',
    'content' => 'carbax.ru',
]);

$this->registerMetaTag([
    'name' => 'DC.title',
    'content' => 'CARBAX все автоуслуги Вашего города | Автопортал',
]);

$this->registerMetaTag([
    'name' => 'DC.creator',
    'content' => 'Александр Викторович',
]);

$this->registerMetaTag([
    'name' => 'DC.creator.name',
    'content' => 'Александр Викторович',
]);

$this->registerMetaTag([
    'name' => 'DC.subject',
    'content' => $seo->meta_keywords,
]);

$this->registerMetaTag([
    'name' => 'DC.description',
    'content' => $seo->meta_description,
]);

$this->registerMetaTag([
    'name' => 'DC.language',
    'content' => 'ru-RU',
]);

/*\common\classes\Debug::prn($_SERVER);*/
?>

<!--<section class="initial-screen">
    <div class="contain">

        <div class="initial-screen--center">
            <div class="initial-screen--logo">
                <a href="#" class="show_video" data-target="#video"><img src="/media/img/carbax-logo.png" alt=""></a>
                <h4>Все автоуслуги Вашего <span class="orange">города</span></h4>
            </div>
            <a href="#" class="initial-screen--apply first__but--but">Подать заявку</a>
            <?/*= SelectRequestTypes::widget(['classNav'=>'first-nav','classUl'=>'first-nav__list']); */?>
        </div>
    </div>
</section>-->

<!-- open .content-wrapper -->
<div class="content__wrap">
    <!-- open .home-search -->
    <section class="home-search">
        <!-- open .container -->
        <div class="container">
            <h1><strong>CARBAX</strong>   —  это крупнейшее сообщество автовладельцев. Реальные отзывы, опыт эксплуатации, решение проблем.</h1>
            <!-- open .home-search__form -->
            <form action="#" class="home-search__form">
                <input type="text" class="home-search__form_field" placeholder="Поиск машин, отзывов, запчастей"/>
                <button type="search" class="home-search__form_btn">Найти</button>
            </form>
            <!-- close .home-search__form -->
            <small>Например: беспилотные машины google, покупка электромобиля или где в смарте аккумулятор</small>
        </div>
        <!-- close .container -->
    </section>
    <!-- close .home-search -->
    <!-- open .home-categories -->
    <section class="home-categories">
        <a href="#" class="home-categories__item home-categories__item_client ">
						<span class="home-categories__item_circle">
							<img src="/theme/carbax/img/client.png" alt="" />
						</span>
						<span class="home-categories__item_desc">
							<span class="home-categories__item_carbax">CARBAX.RU</span>
							<span class="home-categories__item_title">Для <br />клиента</span>
						</span>
        </a>
        <a href="#" class="home-categories__item home-categories__item_business">
						<span class="home-categories__item_circle">
							<img src="/theme/carbax/img/business.png" alt="" />
						</span>
						<span class="home-categories__item_desc">
							<span class="home-categories__item_carbax">CARBAX.RU</span>
							<span class="home-categories__item_title">Для <br />бизнесса</span>
						</span>
        </a>
    </section>
    <!-- close .home-categories -->

    <!-- open .home-menu -->
    <nav class="home-menu">
        <ul>
            <li><a href="#">Поиск автосервисов</a></li>
            <li><a href="#">Оставить заявку на ремонт</a></li>
            <li><a href="#">Carbax рынок</a></li>
            <li><a href="#">Спецпредложения</a></li>
            <li><a href="#">Новости</a></li>
        </ul>
    </nav>
    <!-- close .home-menu -->

    <?= \frontend\modules\services\widgets\ServicesWidgetFront::widget(); ?>


    <!-- open .home-toplist -->
    <section class="home-toplist">
        <!-- open .container -->
        <div class="container">
            <h2>Топ - рейтинга автосервисов</h2>
            <table class="home-toplist__table">
                <caption>Топ рефеларов</caption>
                <tbody>
                <tr>
                    <td><a href="#">ООО “Автошинка”</a></td>
                    <td>2,304</td>
                </tr>
                <tr>
                    <td><a href="#">ООО “Автошинка”</a></td>
                    <td>997</td>
                </tr>
                <tr>
                    <td><a href="#">ООО “Автошинка”</a></td>
                    <td>1,023</td>
                </tr>
                </tbody>
            </table>
            <table class="home-toplist__table">
                <caption>Топ по поиску</caption>
                <tbody>
                <tr>
                    <td>ООО “Автошинка”</td>
                    <td>2,304</td>
                </tr>
                <tr>
                    <td>ООО “Автошинка”</td>
                    <td>997</td>
                </tr>
                <tr>
                    <td>ООО “Автошинка”</td>
                    <td>1,023</td>
                </tr>
                </tbody>
            </table>
        </div>
        <!-- close .container -->
    </section>
    <!-- close .home-toplist -->

    <?= FleaMarketSearch::widget() ?>
    <?= \frontend\modules\flea_market\widgets\FleaMarketWidgetFront::widget(); ?>

    <?= OffersWidgetFront::widget(); ?>
    <?= NewsWidgetFront::widget(); ?>
</div>
<!-- close .content-wrapper -->


<?/*= MainPageMap::widget() */?><!--
<?/*= FleaMarketSearch::widget() */?>
<?/*= FleaMarketNewProduct::widget(); */?>
<?/*= FleaMarketMostViewed::widget(); */?>


<?/*= OffersWidgetFront::widget()*/?>
--><?/*= NewsWidgetFront::widget()*/?>


