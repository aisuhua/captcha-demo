<?php
/**
 * 选中一个验证码
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

// 文件对应的图片名称
$file_name = md5($words_value[$_GET['key']]) . '_' . $words_fonts[$_GET['key']] . '.png';

header('Content-Type: image/png');
echo file_get_contents(DATA_DIR . "/thumb/{$file_name}");
