<?php
define('BASE_DIR', __DIR__);
require(BASE_DIR . '/../library/securimage-3.6.7/securimage.php');

$img = new Securimage();

$img->image_bg_color = new Securimage_Color('#f60');
$img->text_color = new Securimage_Color('#06f');
$img->line_color = new Securimage_Color('#525252');

$img->perturbation = 0.85;
$img->num_lines = rand(1, 5);

$img->code_length = 4;

$img->image_width = 200;
$img->image_height = (int)($img->image_width * 0.35);

$img->charset = '1234567890';

$img->show();