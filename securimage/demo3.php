<?php
define('BASE_DIR', __DIR__);
require(BASE_DIR . '/../library/securimage-3.6.7/securimage.php');

$fonts = [
    'fzstk.ttf', //方正舒体
    'fzytk.ttf', //方正姚体
    'simfang.ttf', //仿宋
    'simkai.ttf', //楷体GB2312
    'stcaiyun.ttf', //华文彩云
    'stkaiti.ttf', //华文楷体
    'stliti.ttf', //华文隶书
    'stxingka.ttf', //华文行楷
    'ukai.ttc', //AR PL UKai Cn
    'yahei.ttf', //YaHei Consolas Hybrid
    'zh.ttf' //方正正准黑简体
];

$key = array_rand($fonts);

$img = new Securimage();
$img->ttf_file =  BASE_DIR . "/fonts/{$fonts[$key]}";
$img->captcha_type = Securimage::SI_CAPTCHA_STRING;
$img->code_length = 1;
$img->noise_level = 0;
$img->num_lines = rand(0, 2);
$img->perturbation = 0.8;
$img->image_height = 88;
$img->image_width = 98;

$img->image_bg_color = new Securimage_Color("#FFFFFF");
$img->text_color     = new Securimage_Color("#000000");
$img->noise_color    = new Securimage_Color("#510000");

$img->charset = '中华人民共和国';

$img->show();