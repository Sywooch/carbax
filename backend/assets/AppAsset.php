<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

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
        'js/assets/css/styles.css',
        'js/assets/css/style.css',
    ];
    public $js = [
        /*'js/media.js',
        'js/bootstrap.js',
        'http://code.jquery.com/jquery-1.6.3.min.js',
        'js/assets/js/jquery.knob.js',
        'js/assets/js/jquery.ui.widget.js',
        'js/assets/js/jquery.iframe-transport.js',
        'js/assets/js/jquery.fileupload.js',
        'js/assets/js/script.js',*/

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
