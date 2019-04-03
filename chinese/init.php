<?php
session_start();

define('BASE_DIR', __DIR__);
define('DATA_DIR', __DIR__ . '/data');
require(BASE_DIR . '/library/SecurimageChinese.php');

$GLOBALS['fonts'] = [
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