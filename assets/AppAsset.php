<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/style.css',
        'css/responsive.css',
        'css/reset.css',
        'css/option2.css',
        'css/option3.css',
        'css/option4.css',
        'css/option5.css',
        'css/option6.css',
        'css/animate.css',
        'css/jquery-ui.css',
        'css/owl.carousel.css',
        'css/jquery.bxslider.css',
        'css/select2.min.css',
        'css/bootstrap.min.css',
    ];
    public $js = [
        'js/jquery.actual.min.js',
        'js/option4.js',
        'js/theme-script.js',
        'js/bootstrap.js',
        'js/npm.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
