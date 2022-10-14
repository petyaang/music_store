<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <link rel="stylesheet" href="main.css">
 <title></title>
 </head>
 <body>
<form action="#" method="post">
<label for="pos_id">Избери позиция: </label> <select name="pos_name" required> <option selected disabled>---Избери---</option>
<?php
include "config.php";
$sql = mysqli_query($dbConn, "SELECT * FROM Position");
while($p = mysqli_fetch_array($sql))
echo '<option value="'. $p['pos_id'] .'">'.$p['pos_name'].'</option>';
?>
</select><br><br>
Редактирай позиция:<input type="text" name="position"/><br><br>
<input type="submit" name="submit" value="Редактирай"/><br><br>
</pre>
</form>
<?php
include "config.php";

if (isset($_POST["submit"]))
 {
 if (isset($_POST['pos_name'])){
 $pos_id = $_POST['pos_name'];}
 $position = $_POST['position'];
 
 $sql = "UPDATE Position
         SET pos_name='$position'
         WHERE pos_id='$pos_id'";
 mysqli_query($dbConn,$sql);
 $result = mysqli_query($dbConn,"SELECT pos_name FROM Position");
 echo "Позиции в музикалния магазин:";
 echo "<ol>";
 while($row = mysqli_fetch_array($result)){
 echo "<li>".$row['pos_name']."</li>"; }
 echo "</ol>";
 }
 
?>
</body>
</html>