<?php
/**
 * Created by PhpStorm.
 * User: godjqb
 * Date: 2018-01-21
 * Time: 14:02
 */

?>

<html>
<head>
    <title>login</title>
</head>
<body>
<h1>护士登录</h1>
<form method = "post" action = "login.php">
    <label for = "user">用户名:</label>
    <input type = "text" id = "user" name = "user"/>
    <br />
    <label for="psw">密 &nbsp; 码:</label>
    <input type="password" id="psw" name="psw"/>
    <br />
    <input type="submit" name="submit" value="登录">
    <input type="button" value="注册" onclick="window.location.href='regist.html'">
</form>
</body>
</html>
