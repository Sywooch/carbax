<section class="ads">

    <div class="ads__wrap favoritesListAjax">

<?php if(!empty($services)):?>

            <?php
            foreach ($services as $prod): ?>
                <a href="services/services/view_service?service_id=<?=$prod->id;?>" class="ads__item">
				<span class="ads__item--img">
					<img src="/<?= $prod['services_img']->images; ?>" alt="">
                    <!--<span class="ads__item--rating">4,1</span>-->
				</span>
				<span class="ads__item--title">
					<p><?= $prod->name; ?></p>
				</span>
                </a>
            <?php endforeach; ?>
<?php else:?>
    В избранном нет сервисов
<?php endif; ?>

    </div>

</section>
