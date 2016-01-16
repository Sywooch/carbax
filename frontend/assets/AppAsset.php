<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/font-awesome.min.css',
        'css/fotorama.css',
        'css/jquery.datetimepicker.css',
        'css/style.css',
        'css/evgeniy-styles.css',
        'sass/new/new.css',
        /*'/css/bootstrap_btn.min.css'*/
    ];
    public $js = [
        'js/bootstrap.js',
        'js/bootstrap.min.js',
        'js/fotorama.js',
        'https://api-maps.yandex.ru/2.1/?lang=ru_RU',
        'js/jquery.datetimepicker.full.min.js',
        'js/jquery-ui.min.js',
        'js/datapic.js',
/*        'js/mg.js',*/
        'js/yandex-map.js',
        'js/maps.js',
        'js/jquery.columnizer.js',
        '/js/jquery.maskedinput.js',
        'js/script.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
