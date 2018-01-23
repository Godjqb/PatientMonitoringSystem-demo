<?php
/**
 * Created by PhpStorm.
 * Nurse: godjqb
 * Date: 2018-01-20
 * Time: 16:43
 */

namespace Common;


class Database {
    private $db_host = 'localhost';
    private $db_user = 'root';
    private $db_psw = 'godsql';
    private $db_database = 'pms';

    protected static $db;
    private $con, $result=array(), $resultNum;

    private function __construct() {
        $this->con=mysqli_connect($this->db_host, $this->db_user, $this->db_psw, $this->db_database);
        if ($this->con) {
            return $this->con;
        } else {
            return false;
        }
    }

    private function __clone() {}

    public static function getInstance() {
        if(self::$db) {
            return self::$db;
        } else {
            self::$db = new self();
            return self::$db;
        }
    }

    public function error() {
        return mysqli_error($this->con);
    }

    public function query($sql) {
        $res = mysqli_query($this->con,$sql);
        if($res) {
            return $res;
        } else {
            echo $this->error();
            return false;
        }
    }

    public function close() {
        if ($this->con) {
            if (mysqli_close($this->con)) {
                $this->con = null;
                return true;
            } else return false;
        } else return false;
    }

    public function select($tb, $row='*', $where = null, $orderBy = null) {
        $sql = 'SELECT '.$row.' FROM '.$tb;
        if (isset($where) && !empty($where)) {
            $sql.= ' WHERE '.$where;
        }
        if (isset($orderBy) && !empty($orderBy)) {
            $sql.= ' ORDER BY '.$orderBy;
        }
//        echo $sql;
        $res = $this->query($sql);
        if (!$res) {
            return $this->error();
        }
        $this->resultNum = $res->num_rows;
        for($i=0; $i<$this->resultNum; $i++){
            $value = $res->fetch_assoc();
            $key = array_keys($value);
            for($j=0; $j<count($key); $j++){
                $this->result[$i][$key[$j]] = $value[$key[$j]];
            }
        }
        return $this;
    }

    public function exportArr($arr) {
        for ($i=0; $i<count($arr); $i++) {
            foreach ($arr[$i] as $key => $value) {
                echo '['.$key.']=>'.$value.' ';
            }
            echo '<br />';
        }
    }

    public function insert($tb, $data) {
        $sql = 'INSERT '.$tb;
        $keys = implode(',', array_keys($data));
        if (!is_null($keys)) {
            $sql.= ' ('.$keys.')';
        }
        $values = array_values($data);
        for ($i=0; $i<count($values); $i++){
            if (is_string($values[$i])) {
                $values[$i] = '"'.$values[$i].'"';
            }
        }
        $values = implode(',',$values);
        $sql.= ' VALUES ('.$values.');';
//        echo $sql;
        if ($this->query($sql)) {
            return true;
        } else {
            echo $this->error();
            return false;
        }
    }

    public function update($tb, $new, $where) {
        $sql = 'UPDATE '.$tb.' SET ';
        foreach ($new as $key=>$value) {
            $sql.= $key.'='.$value.',';
        }
        $sql = trim($sql,',');
        $wherekeys = implode(',', array_keys($where));
        $wherevalues = implode(',', array_values($where));
        $sql.= ' WHERE ('.$wherekeys.')=('.$wherevalues.');';
        if ($this->query($sql)) {
            return true;
        } else {
            echo $this->error();
            return false;
        }
    }

    public function delete($tb, $where) {
        $sql = 'DELETE FROM '.$tb.' WHERE ';
        $wherekey = implode(',', array_keys($where));
        $wherevalue = implode(',', array_values($where));
        $sql.= '('.$wherekey.')=('.$wherevalue.');';
//        echo $sql;
        if ($this->query($sql)) {
            return true;
        } else {
            echo $this->error();
            return false;
        }
    }

    public function getResult(){
        return ['num'=>$this->resultNum,'result'=>$this->result];
    }

}