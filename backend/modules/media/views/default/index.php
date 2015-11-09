<?php
    $this->title = 'Медиа-менеджер';
?>
<div class="media-default-index">
   <!-- <button class="btn btn-primary" data-toggle="modal" data-target=".media_upload">Большая модаль</button>-->
    <?php
        $k = new \common\classes\Media();
        $k->print_contents_directory($content);
    ?>
</div>

