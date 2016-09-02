<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\classes\Custom_function;
use common\models\db\User;
use frontend\widgets\CityAutoComplete;
use frontend\widgets\NumberUnreadMessages;
use frontend\widgets\SelectRequestTypes;
use frontend\widgets\ShowFooter;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use common\classes\Debug;



AppAsset::register($this);
//$ip = Yii::$app->ipgeobase->getLocation(Custom_function::getRealIpAddr());
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name='yandex-verification' content='5d0717db3e178e2e' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-71827016-1', 'auto');
        ga('send', 'pageview');

    </script>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function() {
                try {
                    w.yaCounter34422170 = new Ya.Metrika({
                        id:34422170,
                        clickmap:true,
                        trackLinks:true,
                        accurateTrackBounce:true,
                        webvisor:true
                    });
                } catch(e) { }
            });

            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () { n.parentNode.insertBefore(s, n); };
            s.type = "text/javascript";
            s.async = true;
            s.src = "https://mc.yandex.ru/metrika/watch.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else { f(); }
        })(document, window, "yandex_metrika_callbacks");
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/34422170" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
</head>
<body>



<?php $this->beginBody() ?>


<?= \frontend\widgets\ShowHeader::widget(); ?>



<!--<section class="filter">
    <div class="wrap">
        <div class="container_fluid">
            <?/*= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) */?>
            <?/*= Alert::widget() */?>
            <?/*= $content */?>
        </div>
    </div>

</section>-->

<!-- open .content-wrap -->
<main class="page-wrap">
<?= \frontend\widgets\ShowSidebar::widget(); ?>
    <section class="content">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
        <?= ShowFooter::widget(); ?>
    </section>
</main>
<!-- close .content-wrap -->





<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
