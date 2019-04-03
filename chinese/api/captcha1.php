<?php
/**
 * Step1: 生成 4 位的中文验证码答案
 */
require(__DIR__ . '/../init.php');

// 随机选取一种字体
$fonts = $GLOBALS['fonts'];
$font_key = array_rand($fonts);

$img = new SecurimageChinese([
    'no_exit' => true
]);

$img->captcha_type = SecurimageChinese::SI_CAPTCHA_CHINESE;
$img->wordlist_file = DATA_DIR . '/words/words.txt';
$img->ttf_file =  DATA_DIR . "/fonts/{$fonts[$font_key]}";
$img->code_length = 4;
$img->num_lines = 2;
$img->noise_level = 0;
$img->image_height = 46;
$img->image_width = 144;
$img->perturbation = 0.35;
$img->image_bg_color = new Securimage_Color("#FFFFFF");
$img->text_color = new Securimage_Color("#000000");

$img->show();

// ============================================= //
// 将 10 个中文字写入 session，以便生成验证码方格列表
$words = $img->getWords();
$_SESSION['securimage_words_value'] = $words;

// 为每个文字随机选取一种字体
$words_fonts = [];
foreach ($words as $key => $word) {
    $words_fonts[$key] = array_rand($fonts);
}
$_SESSION['securimage_words_fonts'] = $words_fonts;

// var_dump($_SESSION);
