<?php
/**
 * Created by PhpStorm.
 * Nurse: godjqb
 * Date: 2018-01-20
 * Time: 19:14
 */

namespace Common;

class Nurse {
    protected static $nurses;

    private $id, $name, $username, $password, $tel;

    private function __construct() {}
    private function __clone() {}

    public static function getInstance() {
        if(self::$nurses) {
            return self::$nurses;
        } else {
            self::$nurses = new self();
            return self::$nurses;
        }
    }

    public function usernameExists($username) {
        $check = Factory::createDatabase()->select("nurses", "id", "username='.$username.'")->getResult();
        if ($check['num'] == 1) {
            return true;
        } else return false;
    }

    public function regUser($name, $username, $password, $tel) {
        $data = array(
            'name' => $name,
            'username' => $username,
            'password' => $password,
            'tel' => $tel
        );
        return Factory::createDatabase()->insert("nurses", $data);
    }

    public function signIn($username, $password) {
        $sign = Factory::createDatabase();
        $rel=$sign->select("nurses", "*", "username='$username'")->getResult();
        if ($rel['num']==1) {
//            echo $rel['result'][0]['id'];
            $this->id = $rel['result'][0]['id'];
            $this->name = $rel['result'][0]['name'];
            if ($password == $rel['result'][0]['password']) {
                $_SESSION['id'] = $this->id;
                $_SESSION['name'] = $this->name;
                return $this;
            } else {
                echo json_encode(['status'=>false, 'msg'=>'wrong password']);
                return false;
            }
        } else {
            echo json_encode(['status'=>false, 'msg'=>'wrong username']);
            return false;
        }
    }

    public function signOut() {
        $_SESSION['id'] = null;
        session_destroy();
        echo json_encode(['status'=>true, 'msg'=>'sign out success']);
        return true;
    }

    public function getUserInfo($id) {
        $sign = Factory::createDatabase()->select('nurses', '*', 'id="'.$id.'"')->getResult();
        if ($sign['num'] == 1) {
            $this->id = $id;
            $this->username = $sign['result'][0]['username'];
            $this->name = $sign['result'][0]['name'];
            $this->password = $sign['result'][0]['password'];
            $this->tel = $sign['result'][0]['tel'];
            return $this;
        } else {
            return false;
        }
    }

}