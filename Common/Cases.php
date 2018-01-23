<?php
/**
 * Created by PhpStorm.
 * User: godjqb
 * Date: 2018-01-20
 * Time: 19:59
 */

namespace Common;

class Cases {
    protected static $cases;

//    private $id, $name, $bp, $temp, $pulse, $time;

    private $result;

    private function __construct() {}
    private function __clone() {}

    public static function getInstance() {
        if(self::$cases) {
            return self::$cases;
        } else {
            self::$cases = new self();
            return self::$cases;
        }
    }

    public function addCase($bedNo, $bp, $temp, $pulse) {
        $date = new \DateTime();
        $time = $date->format('Y-m-d H:i:s');
        $data = array(
            'bedNo' => $bedNo,
            'bp' => $bp,
            'temp' => $temp,
            'pulse' => $pulse,
            'time' => $time
        );
        return Factory::createDatabase()->insert("cases", $data);
    }

    public function deleteCases($bedNo) {
        $where = ['bedNo' => "'$bedNo'"];
        return Factory::createDatabase()->delete("cases", $where);
    }

    public function selectCases($bedNo) {
         $this->result = Factory::createDatabase()->select('cases', '*', 'bedNo='.$bedNo.'')->getResult();
         return $this;
    }

    public function exportCases() {
        $res = $this->result['result'];

        for ($i=0; $i<count($res); $i++) {
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