<?php
/**
 * Created by PhpStorm.
 * User: godjqb
 * Date: 2018-01-21
 * Time: 17:16
 */

define('BASEDIR',__DIR__);
require_once BASEDIR.'/Common/Loader.php';
spl_autoload_register('\\Common\\Loader::autoload');
session_start();

if (isset($_POST['user']) && !empty($_POST['user']) && isset($_POST['psw']) && !empty($_POST['psw']) && isset($_POST['tel'])
    && !empty($_POST['tel']) && isset($_POST['repsw']) && !empty($_POST['repsw']) && isset($_POST['name']) && !empty($_POST['name'])) {
    if ($_POST['psw'] == $_POST['repsw']) {
        $ue = \Common\Factory::createNurse()->usernameExists($_POST['user']);
        if (!$ue) {
            $res = \Common\Factory::createNurse()->regUser($_POST['name'], $_POST['user'], $_POST['psw'],$_POST['tel']);
            if ($res) {
                $res = \Common\Factory::createNurse()->signIn($_POST['user'], $_POST['psw']);
                if ($res) {
                    header('Location:index.php');
                }
            }
        } else {
            echo '用户名已存在';
        }
    } else {
        echo '两次密码必须相同';
    }


} else {
    echo '不能有输入为空';
}

?>
