<?php
use mihaildev\elfinder\InputFile;
use mihaildev\elfinder\ElFinder;
use yii\web\JsExpression;
mihaildev\elfinder\Assets::noConflict($this);
$this->title = 'Медиа-менеджер';

?>
<div class="mediaFile">
<?php
    echo ElFinder::widget([
    'language'         => 'ru',
    'controller'       => 'elfinder', // вставляем название контроллера, по умолчанию равен elfinder
    'path' => 'image', // будет открыта папка из настроек контроллера с добавлением указанной под деритории
    'filter'           => 'image',    // фильтр файлов, можно задать массив фильтров https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes
    'frameOptions' => [
                'style'=>'height:500px;width: 100%;'
            ],
    'callbackFunction' => new JsExpression('function(file, id){}') // id - id виджета
]);
?>
</div>