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
    var_dump($res);
    if ($res['num']) {
        $res = \Common\Factory::createCase()->addCase($_POST['bedNo'], $_POST['bp'], $_POST['temp'], $_POST['pulse']);
        if ($res) {
            echo '添加成功 <br /> <a href="index.php">返回</a>';
        }
    } else {
        echo '此床位空闲';
    }
} else {
    echo '不能有输入为空';
}


