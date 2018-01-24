<?php
/**
 * Created by PhpStorm.
 * User: godjqb
 * Date: 2018-01-21
 * Time: 16:28
 */

date_default_timezone_set('Asia/Shanghai');
define('BASEDIR',__DIR__);
require_once BASEDIR.'/Common/Loader.php';
spl_autoload_register('\\Common\\Loader::autoload');

if (isset($_POST['bedNo']) && !empty($_POST['bedNo']) && isset($_POST['bp']) && !empty($_POST['bp'])
    && isset($_POST['temp']) && !empty($_POST['temp']) && isset($_POST['pulse']) && !empty($_POST['pulse'])) {
    $res = \Common\Factory::createPatient()->selectPatent($_POST['bedNo']);
//    var_dump($res);
    if ($res['num']) {
        if ($_POST['bp'] < 60) {
            echo '警告:病人血压过低 <br />';
        } else if ($_POST['bp'] > 140) {
            echo '警告:病人血压过高 <br />';
        }
        if ($_POST['temp'] < 36) {
            echo '警告:病人体温过低 <br />';
        } else if ($_POST['bp'] > 37.4) {
            echo '警告:病人体温过高 <br />';
        }
        if ($_POST['pulse'] < 60) {
            echo '警告:病人心跳过慢 <br />';
        } else if ($_POST['pulse'] > 100) {
            echo '警告:病人心跳过高 <br />';
        }
        $res = \Common\Factory::createCase()->addCase($_POST['bedNo'], $_POST['bp'], $_POST['temp'], $_POST['pulse']);
        if ($res) {
            echo '病例添加成功 <br /> <a href="index.php">返回</a>';
        }
    } else {
        echo '此床位空闲';
    }
} else {
    echo '不能有输入为空';
}


