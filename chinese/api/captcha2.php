<?php
/**
 * Step2: 生成 2 行 5 列的中文验证码选项
 */
require(__DIR__ . '/../init.php');

$fonts = $GLOBALS['fonts'];

if (empty($_SESSION['securimage_words_value']) ||
    empty($_SESSION['securimage_words_fonts'])
) {
    exit();
}

$words_value = $_SESSION['securimage_words_value'];
$words_fonts = $_SESSION['securimage_words_fonts'];

// 将 10 个文字渲染成 2 行 5 列的方格选项
$im = imagecreate(250, 100);
imagecolorallocate($im, 255, 255, 255);

$width = 49;
$height = 49;
foreach ($words_value as $key => $word) {
    $file_name = md5($word) . '_' . $words_fonts[$key] . '.png';
    $src_im = imagecreatefrompng(DATA_DIR . "/thumb/{$file_name}");
    imagecopy($im, $src_im, $key % 5 * 50, intval($key / 5) * 50, 0, 0, $width, $height);
}

header('Content-Type: image/png');
imagepng($im);

