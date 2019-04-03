<?php
require_once(BASE_DIR . '/../library/securimage-3.6.7/securimage.php');

/**
 * Class SecurimageChinese
 *
 * 适配中文验证码，对父类进行适当的重写和扩展
 */
class SecurimageChinese extends Securimage
{
    const SI_CAPTCHA_CHINESE = 3;
    public $words;

    public function createCode()
    {
        switch($this->captcha_type) {
            case self::SI_CAPTCHA_CHINESE:
                $this->code = false;

                // 读取字库并随机选取 10 个中文字
                $words = file_get_contents($this->wordlist_file);
                $words = explode(',', $words);
                shuffle($words);
                $words = array_slice($words, 0, 10);
                $this->words = $words;

                // 从这 10 个字中选取 4 个字作为验证码的答案
                $keys = array_keys($words);
                shuffle($keys);

                $code = array_slice($keys, 0, $this->code_length);
                $code_display = [];
                foreach ($code as $v) {
                    $code_display[] = $words[$v];
                }

                $this->code = implode('', $code);
                $this->code_display = implode(' ', $code_display);

                $this->saveData();
                break;
            default:
                parent::createCode();
        }
    }

    public function getWords()
    {
        return $this->words;
    }
}
