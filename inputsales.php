<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <link rel="stylesheet" href="main.css">
 <title></title>
 </head>
 <body>
<form action="#" method="post">
<pre><strong><font size=6>Продажби</font></strong><br><br>
<label for="client_id">Клиент: </label> <select name="client_name" required> <option selected disabled>---Избери---</option>
<?php
include "config.php";
$sql = mysqli_query($dbConn, "SELECT * FROM Client");
while($t = mysqli_fetch_array($sql))
echo '<option value="'. $t['client_id'] .'">'.$t['client_name'].'</option>';
?>
</select><br>
<label for="empl_id">Служител: </label> <select name="empl_name" required> <option selected disabled>---Избери---</option>
<?php
include "config.php";
$sql = mysqli_query($dbConn, "SELECT * FROM Employee");
while($t = mysqli_fetch_array($sql))
echo '<option value="'. $t['empl_id'] .'">'.$t['empl_name'].'</option>';
?>
</select><br>
Дата(yyyy-mm-dd): <input type="text" name="date"/><br>

<input type="submit" name="submit" value="Въведи"/> <a href="musicstore_input.php">Върни се обратно</a><br>
</pre>
</form>
<?php
 include "config.php";
 if (isset($_POST["submit"]))
 {
 if (isset($_POST['client_name'])){
 $client_id = $_POST['client_name'];}
 if (isset($_POST['empl_name'])){
 $empl_id = $_POST['empl_name'];}
 $date = $_POST['date'];

 if (!empty($client_id)&&!empty($empl_id)&&!empty($date))
 {
 $sql="INSERT INTO Sales (client_id, empl_id, sale_date) VALUES ('$client_id', '$empl_id', '$date')";
 $result = mysqli_query($dbConn,$sql);
 if (!$result)
 {
 die('Грешка!');
 }
 echo "Добавихте един запис.";
 }
 else
 echo "Не сте въвели данни!";
 
 $result = mysqli_query($dbConn, "SELECT s.sale_id, c.client_name, e.empl_name, s.sale_date
                                  FROM Sales s
								  JOIN Client c
								  ON s.client_id=c.client_id
								  JOIN Employee e
								  ON s.empl_id=e.empl_id
								  ORDER BY sale_id");
 echo "<table border='2' align='center'>";
 echo "<tr><th>ID</th><th>Клиент</th><th>Служител</th><th>Дата</th></tr>";
 while($row = mysqli_fetch_array($result)){
 echo "<tr><td>".$row['sale_id']."</td><td>".$row['client_name']."</td><td>".$row['empl_name']."</td><td>".$row['sale_date']."</td></tr>"; }
 }
?>
</body>
</html>