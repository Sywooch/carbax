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
        /*'css/bootstrap-reset.css',
        'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css',

        'css/site.css',*/


        /*'css/font-awesome.min.css',*/

        /*'css/fotorama.css',
        'css/jquery.datetimepicker.css',
        'css/style.css',
        'css/evgeniy-styles.css',
        'sass/new/new.css',
        'css/index.css',
        'css/star-rating.css',
        'css/theme-krajee-svg.css',
        'css/fancybox/helpers/jquery.fancybox.css',
        'css/fancybox/helpers/jquery.fancybox-buttons.css',
        'css/fancybox/helpers/jquery.fancybox-thumbs.css',*/
        /*'css/slimbox2.css',*/
        /*'/css/bootstrap_btn.min.css'*/

        /*'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css',*/
        'theme/carbax/css/libs.min.css',
        'theme/carbax/css/style.min.css',
    ];
    public $js = [
        'theme/carbax/js/jquery-2.1.3.min.js',

        /*'js/bootstrap.js',
        'js/bootstrap.min.js',
        'js/fotorama.js',
        'https://api-maps.yandex.ru/2.1/?lang=ru_RU',
        'js/jquery.datetimepicker.full.min.js',
        'js/jquery-ui.min.js',
        'js/datapic.js',*/
/*        'js/mg.js',*/
        /*'js/yandex-map.js',
        'js/maps.js',*/
        'js/jquery.columnizer.js',
        '/js/jquery.maskedinput.js',
        'js/script.js',
        'js/star-rating.js',
        /*'js/jquery.cookie.js',*/

       /* 'js/slimbox2.js',*/
    ];
    public $jsOptions = [ 'position' => \yii\web\View::POS_HEAD];
    public $depends = [
        /*'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',*/
    ];
}
