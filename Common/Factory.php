<?php
/**
 * Created by PhpStorm.
 * User: godjqb
 * Date: 2018-01-20
 * Time: 22:44
 */

namespace Common;


class Factory
{
    public static function createDatabase() {
        $db = Database::getInstance();
        return $db;
    }

    public static function createNurse() {
        $nurses = Nurse::getInstance();
        return $nurses;
    }

    public static function createCase() {
        $cases = Cases::getInstance();
        return $cases;
    }

    public static function createPatient() {
        $patients = Patient::getInstance();
        return $patients;
    }


}