<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <link rel="stylesheet" href="main.css">
 <title></title>
 </head>
 <body>
<form action="#" method="post">
<label for="empl_id">Избери служител: </label> <select name="empl_name" required> <option selected disabled>---Избери---</option>
<?php
include "config.php";
$sql = mysqli_query($dbConn, "SELECT * FROM Employee");
while($p = mysqli_fetch_array($sql))
echo '<option value="'. $p['empl_id'] .'">'.$p['empl_name'].'</option>';
?>
</select><br><br>
Редактирай служител: <br><br>
Име: <input type="text" name="name"/><br><br>
<label for="pos_id">Позиция: </label> <select name="pos_name" required> <option selected disabled>---Избери---</option>
<?php
include "config.php";
$sql = mysqli_query($dbConn, "SELECT * FROM Position");
while($p = mysqli_fetch_array($sql))
echo '<option value="'. $p['pos_id'] .'">'.$p['pos_name'].'</option>';
?>
</select><br><br>
Телефонен номер: <input type="text" name="number"/><br><br>

<input type="submit" name="submit" value="Редактирай"/><br><br>
</pre>
</form>
<?php
include "config.php";

if (isset($_POST["submit"]))
 {
 if (isset($_POST['empl_name'])){
 $empl_id = $_POST['empl_name'];}
 $name = $_POST['name'];
 if (isset($_POST['pos_name'])){
 $pos_id = $_POST['pos_name'];}
 $number = $_POST['number'];
 
 $sql = "UPDATE Employee
         SET empl_name='$name',
		 pos_id='$pos_id',
		 empl_number='$number'
         WHERE empl_id='$empl_id'";
 mysqli_query($dbConn,$sql);
 $result = mysqli_query($dbConn,"SELECT e.empl_name, p.pos_name, e.empl_number 
                                 FROM Employee e
								 JOIN Position p
								 ON e.pos_id=p.pos_id
								 ORDER BY e.pos_id");
 echo "Служители в музикалния магазин:";
 echo "<ol>";
 while($row = mysqli_fetch_array($result)){
 echo "<li>".$row['empl_name'].", ".$row['pos_name'].", ".$row['empl_number']."</li>"; }
 echo "</ol>";
 }
 
?>
</body>
</html>