<?php
use common\classes\Debug;
use yii\helpers\Url;
//Debug::prn($userId);



if(empty($userId)):?>
    <p class="offers_content">
        <span>Задайте вопрос или оставьте комментарий</span><br/>
        <span>Чтобы оставлять комментарии, Вам нужно подтвердить e-mail.<br/>
                            Письмо с ссылкой подтверждения должно прийти сразу после регистрации <a href="<?= Url::to('/register'); ?>">на
                                    указанный Вами e-mail.</a></span></p>
<?php else: ?>

    <div class="addReviewsFormWr">
        <div class="reatingWr">
            <h3>Поставте оценку</h3>
            <input id="input-1-xs"  data-min="0" data-max="5" data-step="1" class="rating rating-loading" data-show-clear="false" data-show-caption="false" data-size="xs">
            <input type="hidden" id="reatingValue" data-spirit="<?= $spirit; ?>" data-id-spirit="<?= $id;?>" >

        </div>
        <h3>Ваш отзыв</h3>
        <div class="commentText">
            <textarea name="commentText" class="addContent__description" id="commentText" style="width: 100%;"></textarea>
        </div>
        <input type="submit" value="Добавить" class="btn btn-save" id="addReviews">
    </div>
<?php endif;
