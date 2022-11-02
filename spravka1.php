<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <link rel="stylesheet" href="main.css">
 <title></title>
 </head>
 <body>
<form action="#" method="post">
<pre><strong>Изведи продажби на служител</strong><br><br>
<label for="empl_id">Служител: </label> <select name="empl_name" required> <option selected disabled>---Избери---</option>
<?php
include "config.php";
$sql = mysqli_query($dbConn, "SELECT empl_id, empl_name FROM Employee");
while($p = mysqli_fetch_array($sql))
echo '<option value="'. $p['empl_id'] .'">'.$p['empl_name'].'</option>';
?>
</select><br>

<input type="submit" name="submit" value="Търси"/> <a href="spravki.php">Върни се обратно</a><br>
</pre>
</form>
<?php
 include "config.php";
 if (isset($_POST["submit"]))
 {
 if (isset($_POST['empl_name'])){
 $empl_id = $_POST['empl_name'];}
 
 $result = mysqli_query($dbConn, "SELECT s.sale_id, c.client_name, e.empl_name, s.sale_date
                                  FROM Sales s
								  JOIN Client c
								  ON s.client_id=c.client_id
								  JOIN Employee e
								  ON s.empl_id=e.empl_id
								  WHERE s.empl_id='$empl_id' 
								  ORDER BY sale_date");
 echo "<table border='2' align='center'>";
 echo "<tr><th>ID</th><th>Клиент</th><th>Служител</th><th>Дата</th></tr>";
 while($row = mysqli_fetch_array($result)){
 echo "<tr><td>".$row['sale_id']."</td><td>".$row['client_name']."</td><td>".$row['empl_name']."</td><td>".$row['sale_date']."</td></tr>"; }
 
 $result1 = mysqli_query($dbConn, "SELECT COUNT(sale_id) AS sales
                                  FROM Sales s
								  JOIN Employee e
								  ON s.empl_id=e.empl_id
								  WHERE s.empl_id='$empl_id'");
 while($row = mysqli_fetch_array($result1)){
 echo "Общ брoй продажби за този служител: ".$row['sales'];
 }
 }
?>
</body>
</html>