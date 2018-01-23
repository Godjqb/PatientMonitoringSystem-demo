<?php
/**
 * Created by PhpStorm.
 * User: godjqb
 * Date: 2018-01-21
 * Time: 15:44
 */

?>

<html>
<head>
    <title>cases</title>
</head>
<body>
<form method="post" action="signOut.php">
    <?php echo $_SESSION['name'] ?>
    <input type="submit" value="注销">
</form>
<h1>患者监护系统</h1>
<a href="addPatient.html">病人入院</a>
<br />
<a href="exportPatients.php">在院病人一览</a>
<br />
<a href="addCase.html">添加病例</a>
<br />
<a href="exportCases.html">查询病例</a>
<br />
<a href="deleteCases.html">病人出院</a>
<br />

</body>
</html>
