<?php
/**
 * Created by PhpStorm.
 * User: godjqb
 * Date: 2018-01-20
 * Time: 22:59
 */

namespace Common;


class Loader
{
    public static function autoload($class) {
        require_once BASEDIR.'/'.str_ireplace('\\', '/', $class).'.php';
//        echo BASEDIR.'/'.str_ireplace('\\','/',$class).'.php';
    }
}