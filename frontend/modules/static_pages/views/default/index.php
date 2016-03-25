<?php
$this->title = $page->title;
$this->registerCssFile('/css/bootstrap_btn.min.css');

$this->params['breadcrumbs'][] = $this->title;

?>
<section class="main-container">
<div class="static_pages-default-index">
    <h1><?= $this->title ?></h1>
    <?= $page->text; ?>
</div>
</section>