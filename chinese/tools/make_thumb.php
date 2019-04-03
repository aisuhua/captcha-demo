<?php
/**
 * 预先生成单个文字对应所有字体格式的验证码图片
 * 存储在 thumb 以备使用
 */
require(__DIR__ . '/../init.php');

$fonts = $GLOBALS['fonts'];

$wordlist_file = DATA_DIR . '/words/words.txt';
$words = file_get_contents($wordlist_file);
$words = explode(',', $words);

foreach ($words as $word)
{
    foreach ($fonts as $font_key => $font)
    {
        $img = new SecurimageChinese([
            'no_session' => true,
            'no_exit' => true
        ]);
        $img->charset = $word;
        $img->ttf_file =  DATA_DIR . "/fonts/{$font}";
        $img->code_length = 1;
        $img->num_lines = rand(1, 3);
        $img->noise_level = 0;
        $img->image_height = 50;
        $img->image_width = 50;
        $img->perturbation = 0.8;
        $img->image_bg_color = new Securimage_Color("#DDDDDD");
        $img->text_color = new Securimage_Color("#000000");

        ob_start();

        $img->show();

        $content = ob_get_clean();
        $file_name = md5($word) . '_' . $font_key . '.png';
        file_put_contents(DATA_DIR . "/thumb/{$file_name}", $content);
    }
}



