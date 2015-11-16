<?php
/* @var $this yii\web\View */
?>
<h1>offers/index</h1>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>
<?php
    var_dump(Yii::$app->ipgeobase->getLocation('144.206.192.6'));
?>