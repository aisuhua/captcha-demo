<?php
/**
 * 检查验证码是否正确
 */
require(__DIR__ . '/../init.php');

$securimage = new SecurimageChinese();
if ($securimage->check($_POST['captcha_code']) == false) {
    echo 0;
    exit;
}

echo 1;