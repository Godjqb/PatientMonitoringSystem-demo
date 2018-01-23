<?php
/**
 * Created by PhpStorm.
 * User: godjqb
 * Date: 2018-01-21
 * Time: 17:08
 */

define('BASEDIR',__DIR__);
require_once BASEDIR.'/Common/Loader.php';
spl_autoload_register('\\Common\\Loader::autoload');

$resP = \Common\Factory::createPatient()->selectPatent($_POST['bedNo']);
if ($resP['num']) {
    $name = $resP['result'][0]['name'];
    echo "<h2>$name 的病例表</h2>";
    $resC = \Common\Factory::createCase()->selectCases($_POST['bedNo'])->getResult();
    echo "<table border=\"1\"> <tr> <td>血压</td> <td>温度</td> <td>脉搏</td> <td>接收时间</td> </tr>";
    for ($i=1; $i < $resC['num']; $i++) {
        echo '<tr>';
        foreach ($resC['result'][$i] as $key => $value) {
            if ($key == 'bp' || $key == 'temp' || $key == 'pulse' || $key == 'time') {
                echo "<td>$value</td>";
            }
        }
        echo '</tr>';
    }
    echo '<a href="exportCases.html">返回</a>';
} else {
    echo '床位空闲';
}
