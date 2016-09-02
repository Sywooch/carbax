<?php
    if( Yii::$app->controller->action->id == 'add_promo'){
        $chek = 'checked';
        $classAdd = 'active';
    }

    if( Yii::$app->controller->action->id == 'my_promo'){
        $chek = 'checked';
        $classAddMy = 'active';
    }

?>

<section class="ac-container">
    <div>
        <input id="ac-1" name="accordion-1" type="checkbox" <?= $chek; ?>/>
        <label for="ac-1">Carbax Промо</label>
        <article class="ac-small">
            <ul>
                <li><a href="<?= \yii\helpers\Url::to(['/site/promo']); ?>">О Промо</a></li>
                <li><a class="<?= $classAdd; ?>" href="<?= \yii\helpers\Url::to(['/my-reklama/add-promo']); ?> ">Создать компанию</a></li>
                <li><a class="<?= $classAddMy; ?>" href="<?= \yii\helpers\Url::to(['/my-reklama/my-promo']); ?>">Мои компании</a></li>
                <li><a href="#">Статистика</a></li>
            </ul>
        </article>
    </div>
    <div>
        <input id="ac-2" name="accordion-1" type="checkbox" />
        <label for="ac-2">Carbax Контекст</label>
        <article class="ac-medium">
            <ul>
                <li><a href="<?= \yii\helpers\Url::to(['/site/contekst']); ?>">О Контексте</a></li>
                <li><a href="#">Создать компанию</a></li>
                <li><a href="#">Статистика</a></li>
            </ul>
        </article>
    </div>

</section>