<?php
define('BASE_DIR', __DIR__);
require(BASE_DIR . '/../library/securimage-3.6.7/securimage.php');

$img = new Securimage();
$img->ttf_file = BASE_DIR . '/fonts/yahei.ttf';
$img->num_lines = rand(1, 3);
$img->noise_level = 0;
$img->image_height = 50;
$img->image_width = 50;
$img->perturbation = 0.8;
$img->charset = '我';
$img->code_length = 1;
$img->image_bg_color = new Securimage_Color("#DDDDDD");
$img->text_color = new Securimage_Color("#000000");
$img->noise_color = new Securimage_Color("#000000");
//$img->line_color = new Securimage_Color("#000000");
$img->show();