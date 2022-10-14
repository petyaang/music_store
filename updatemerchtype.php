<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <link rel="stylesheet" href="main.css">
 <title></title>
 </head>
 <body>
<form action="#" method="post">
<label for="merchtype_id">Избери вид стока: </label> <select name="merchtype_name" required> <option selected disabled>---Избери---</option>
<?php
include "config.php";
$sql = mysqli_query($dbConn, "SELECT * FROM Merchandise_types");
while($p = mysqli_fetch_array($sql))
echo '<option value="'. $p['merchtype_id'] .'">'.$p['merchtype_name'].'</option>';
?>
</select><br><br>
Редактирай вид стока:<input type="text" name="merchtype"/><br><br>
<input type="submit" name="submit" value="Редактирай"/><br><br>
</pre>
</form>
<?php
include "config.php";

if (isset($_POST["submit"]))
 {
 if (isset($_POST['merchtype_name'])){
 $merchtype_id = $_POST['merchtype_name'];}
 $merchtype = $_POST['merchtype'];
 
 $sql = "UPDATE Merchandise_types
         SET merchtype_name='$merchtype'
         WHERE merchtype_id='$merchtype_id'";
 mysqli_query($dbConn,$sql);
 $result = mysqli_query($dbConn,"SELECT merchtype_name FROM Merchandise_types");
 echo "Видове стоки в музикалния магазин:";
 echo "<ol>";
 while($row = mysqli_fetch_array($result)){
 echo "<li>".$row['merchtype_name']."</li>"; }
 echo "</ol>";
 }

?>
</body>
</html>