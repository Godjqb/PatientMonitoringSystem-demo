<?php
/**
 * Created by PhpStorm.
 * User: godjqb
 * Date: 2018-01-20
 * Time: 23:35
 */

date_default_timezone_set('Asia/Shanghai');
define('BASEDIR',__DIR__);
require_once BASEDIR.'/Common/Loader.php';
spl_autoload_register('\\Common\\Loader::autoload');
session_start();

//header('Location:App/test.php');
//\Common\Factory::createDatabase()->insert('nurses',['name' => 'sam', 'username' => '123', 'password' => '123']);
//\Common\Factory::createNurse()->regUser('ash', 'ass', 'boom');
//$nurseA = \Common\Factory::createNurse()->signIn('ass', 'boom');
//$nurseA->getUserInfo($_SESSION['id']);
//if ($nurseA) {
//    echo 1;
//} else {
//  echo 0;
//}

//$caseA = \Common\Factory::createCase()->addCase('a',11,23,30);
//$caseA = \Common\Factory::createCase()->selectCases('a');
//$caseA->exportCases();

if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
    require_once BASEDIR.'/App/View/cases.php';
} else {
    require_once BASEDIR.'/App/View/login.php';
}

?>