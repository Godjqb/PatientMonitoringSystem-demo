<?php
/**
 * Created by PhpStorm.
 * User: godjqb
 * Date: 2018-01-23
 * Time: 18:17
 */

date_default_timezone_set('Asia/Shanghai');
define('BASEDIR',__DIR__);
require_once BASEDIR.'/Common/Loader.php';
spl_autoload_register('\\Common\\Loader::autoload');

if (isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['bedNo']) && !empty($_POST['bedNo'])
    && isset($_POST['sex']) && !empty($_POST['sex']) && isset($_POST['age']) && !empty($_POST['age'])) {
    $be = \Common\Factory::createPatient()->bedNoExists($_POST['bedNo']);
    if (!$be) {
        $res = \Common\Factory::createPatient()->addPatient($_POST['name'], $_POST['bedNo'], $_POST['sex'],$_POST['age']);
        if ($res) {
            echo '录入成功 <br /> <a href="index.php">返回</a>';
        }
    } else {
        echo '床位被占用';
    }
} else {
    echo '不能有输入为空';
}

?>