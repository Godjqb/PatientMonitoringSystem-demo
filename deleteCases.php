<?php
/**
 * Created by PhpStorm.
 * User: godjqb
 * Date: 2018-01-21
 * Time: 16:48
 */

define('BASEDIR',__DIR__);
require_once BASEDIR.'/Common/Loader.php';
spl_autoload_register('\\Common\\Loader::autoload');

$resC = \Common\Factory::createCase()->deleteCases($_POST['bedNo']);
$resP = \Common\Factory::createPatient()->deletePatient($_POST['bedNo']);
//$res = \Common\Factory::createCase()->deleteCases('gs');
if ($resC['num'] && $resP['num']) {
    echo '病人出院 <br /> <a href="index.php">返回</a>';
}