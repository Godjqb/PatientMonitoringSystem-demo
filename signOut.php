<?php
/**
 * Created by PhpStorm.
 * User: godjqb
 * Date: 2018-01-21
 * Time: 17:54
 */

session_start();
$_SESSION['id'] = null;
$_SESSION['name'] = null;

header('Location:index.php');