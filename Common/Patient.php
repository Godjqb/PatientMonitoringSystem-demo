<?php
/**
 * Created by PhpStorm.
 * User: godjqb
 * Date: 2018-01-23
 * Time: 17:05
 */

namespace Common;


class Patient
{
    protected static $patients;

    private $result;

    private function __construct() {}
    private function __clone() {}

    public static function getInstance() {
        if(self::$patients) {
            return self::$patients;
        } else {
            self::$patients = new self();
            return self::$patients;
        }
    }

    public function bedNoExists($bedNo) {
        $check = Factory::createDatabase()->select("patients", "id", "bedNo='.$bedNo.'")->getResult();
        if ($check['num'] == 1) {
            return true;
        } else return false;
    }

    public function addPatient($name, $bedNo, $sex, $age) {
        $date = new \DateTime();
        $time = $date->format('Y-m-d H:i:s');
        $data = array(
            'name' => $name,
            'bedNo' => $bedNo,
            'sex' => $sex,
            'age' => $age,
            'time' => $time
        );
        return Factory::createDatabase()->insert("patients", $data);
    }

    public function deletePatient($bedNo) {
        $where = ['bedNo' => "'$bedNo'"];
        return Factory::createDatabase()->delete("patients", $where);
    }

    public function exportPatents() {
        $this->result = Factory::createDatabase()->select('patients', '*')->getResult();
        return $this;
    }

    public function selectPatent($bedNo) {
        return Factory::createDatabase()->select('patients', '*', 'bedNo='.$bedNo.'')->getResult();
    }

    public function exportArr() {
        $res = $this->result['result'];

        for ($i=0; $i < count($res); $i++) {
            foreach ($res[$i] as $key => $value) {
                echo ' '.$key.':'.$value.' ';
            }
            echo '<br />';
        }
    }

    public function getResult() {
        return $this->result;
    }


}