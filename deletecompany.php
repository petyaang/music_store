<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <link rel="stylesheet" href="main.css">
 <title></title>
 </head>
 <body>
<form action="#" method="post">
<label for="company_id">Избери музикална компания за изтриване: </label> <select name="company_name" required> <option selected disabled>---Избери---</option>
<?php
include "config.php";
$sql = mysqli_query($dbConn, "SELECT * FROM Company");
while($p = mysqli_fetch_array($sql))
echo '<option value="'. $p['company_id'] .'">'.$p['company_name'].'</option>';
?>
</select><br><br>
<input type="submit" name="submit" value="Изтрий"/><br><br>
</pre>
</form>
<?php
include "config.php";

if (isset($_POST["submit"]))
 {
 if (isset($_POST['company_name'])){
 $company_id = $_POST['company_name'];}
 
 $sql = "DELETE FROM Company WHERE company_id='$company_id'";
 $r=mysqli_query($dbConn,$sql);
 if (!$r)
 die('Грешка при изтриване на записа. <br>');
 echo "Записът е изтрит!<br><br>";
 
 $result = mysqli_query($dbConn,"SELECT company_name FROM Company");
 echo "Музикални компании в музикалния магазин:";
 echo "<ol>";
 while($row = mysqli_fetch_array($result)){
 echo "<li>".$row['company_name']."</li>"; }
 echo "</ol>";
 }
 
?>
</body>
</html>