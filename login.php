<?php
/**
 * Created by PhpStorm.
 * User: godjqb
 * Date: 2018-01-21
 * Time: 14:09
 */

date_default_timezone_set('Asia/Shanghai');
define('BASEDIR',__DIR__);
require_once BASEDIR.'/Common/Loader.php';
spl_autoload_register('\\Common\\Loader::autoload');
session_start();

if (isset($_POST['user']) && isset($_POST['psw']) && !empty($_POST['user']) && !empty($_POST['psw'])) {
    $user = $_POST['user'];
    $psw = $_POST['psw'];
    $res = \Common\Factory::createNurse()->signIn($user, $psw);
    if ($res) {
        header('Location:index.php');
    } else {
        echo '<br /><a href="index.php">返回</a>';
    }
} else {
    echo 'username and password can\'t be empty';
}


