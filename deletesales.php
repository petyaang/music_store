<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <link rel="stylesheet" href="main.css">
 <title></title>
 </head>
 <body>
<form action="#" method="post">
<?php
include "config.php";
$result = mysqli_query($dbConn, "SELECT s.sale_id, c.client_name, e.empl_name, s.sale_date
                                 FROM Sales s
								 JOIN Client c  
								 ON s.client_id=c.client_id
								 JOIN Employee e 
								 ON s.empl_id=e.empl_id
								 ORDER BY s.sale_id");
 echo "<table border='2' align='center'>";
 echo "<tr><th>ID</th><th>Клиент</th><th>Служител</th><th>Дата на продажба</th></tr>";
 while($row = mysqli_fetch_array($result)){
 echo "<tr><td>".$row['sale_id']."</td><td>".$row['client_name']."</td><td>".$row['empl_name']."</td><td>".$row['sale_date']."</td></tr>"; }
?>
<label for="sale_id">Избери продажба за изтриване (от долупосочените): </label> <select name="sale_id" required> <option selected disabled>---Избери---</option>
<?php
include "config.php";
$sql = mysqli_query($dbConn, "SELECT * FROM Sales");
while($p = mysqli_fetch_array($sql))
echo '<option value="'. $p['sale_id'] .'">'.$p['sale_id'].'</option>';
?>
</select><br><br>
<input type="submit" name="submit" value="Изтрий"/><br><br>
</pre>
</form>
<?php
include "config.php";

if (isset($_POST["submit"]))
 {
 if (isset($_POST['sale_id'])){
 $sale_id = $_POST['sale_id'];}
 
 $sql = "DELETE FROM Sales WHERE sale_id='$sale_id'";
 $r=mysqli_query($dbConn,$sql);
 if (!$r)
 die('Грешка при изтриване на записа. <br>');
 echo "Записът е изтрит!<br><br>";
 
 $result = mysqli_query($dbConn,"SELECT c.client_name, e.empl_name, s.sale_date
                                 FROM Sales s
								 JOIN Client c  
								 ON s.client_id=c.client_id
								 JOIN Employee e 
								 ON s.empl_id=e.empl_id
								 ORDER BY s.sale_id");
 echo "Продажби в музикалния магазин:";
 echo "<ol>";
 while($row = mysqli_fetch_array($result)){
 echo "<li>".$row['client_name'].", ".$row['empl_name'].", ".$row['sale_date']."</li>"; }
 echo "</ol>";
 }
 
?>
</body>
</html>