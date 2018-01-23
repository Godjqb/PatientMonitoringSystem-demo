<?php
/**
 * Created by PhpStorm.
 * User: godjqb
 * Date: 2018-01-23
 * Time: 19:06
 */

define('BASEDIR',__DIR__);
require_once BASEDIR.'/Common/Loader.php';
spl_autoload_register('\\Common\\Loader::autoload');

$res = \Common\Factory::createPatient()->exportPatents();
if ($res) {
    $res = \Common\Factory::createPatient()->getResult();
    echo "<table border=\"1\"> <tr> <td>姓名</td> <td>病床号</td> <td>性别</td> <td>年龄</td> <td>入院时间</td> </tr>";
    for ($i=0; $i < $res['num']; $i++) {
        echo '<tr>';
        foreach ($res['result'][$i] as $key => $value) {
            if ($key == 'name' || $key == 'bedNo' || $key == 'sex' || $key == 'age' || $key == 'time') {
                echo "<td>$value</td>";
            }
        }
        echo '</tr>';
    }
    echo '<a href="index.php">返回</a>';
}



