<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <link rel="stylesheet" href="main.css">
 <title></title>
 </head>
 <body>
<form action="#" method="post">
<label for="empl_id">Избери служител за изтриване: </label> <select name="empl_name" required> <option selected disabled>---Избери---</option>
<?php
include "config.php";
$sql = mysqli_query($dbConn, "SELECT * FROM Employee");
while($p = mysqli_fetch_array($sql))
echo '<option value="'. $p['empl_id'] .'">'.$p['empl_name'].'</option>';
?>
</select><br><br>
<input type="submit" name="submit" value="Изтрий"/><br><br>
</pre>
</form>
<?php
include "config.php";

if (isset($_POST["submit"]))
 {
 if (isset($_POST['empl_name'])){
 $empl_id = $_POST['empl_name'];}
 
 $sql = "DELETE FROM Employee WHERE empl_id='$empl_id'";
 $r=mysqli_query($dbConn,$sql);
 if (!$r)
 die('Грешка при изтриване на записа. <br>');
 echo "Записът е изтрит!<br><br>";
 
 $result = mysqli_query($dbConn,"SELECT e.empl_name, p.pos_name, e.empl_number
                                 FROM Employee e
								 JOIN Position p 
								 ON e.pos_id=p.pos_id
								 ORDER BY e.empl_id");
 echo "Служители в музикалния магазин:";
 echo "<ol>";
 while($row = mysqli_fetch_array($result)){
 echo "<li>".$row['empl_name'].", ".$row['pos_name'].", ".$row['empl_number']."</li>"; }
 echo "</ol>";
 }
?>
</body>
</html>