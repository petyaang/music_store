<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <link rel="stylesheet" href="main.css">
 <title></title>
 </head>
 <body>
<form action="#" method="post">
<pre><strong><font size=6>Данни за служители</font></strong><br><br>
Име: <input type="text" name="name"/><br>
<label for="pos_id">Позиция: </label> <select name="pos_name" required> <option selected disabled>---Избери---</option>
<?php
include "config.php";
$sql = mysqli_query($dbConn, "SELECT * FROM Position");
while($p = mysqli_fetch_array($sql))
echo '<option value="'. $p['pos_id'] .'">'.$p['pos_name'].'</option>';
?>
</select><br>
Телефонен номер: <input type="text" name="phnum"/><br>

<input type="submit" name="submit" value="Въведи"/> <a href="musicstore_input.php">Върни се обратно</a><br>
</pre>
</form>
<?php
 include "config.php";
 if (isset($_POST["submit"]))
 {
 $name = $_POST['name'];
 $phnum = $_POST['phnum'];
 if (isset($_POST['pos_name'])){
 $pos_id = $_POST['pos_name'];}
 
 if (!empty($name)&&!empty($phnum)&&!empty($pos_id))
 {
 $sql="INSERT INTO Employee (empl_name, pos_id, empl_number) VALUES ('$name', '$pos_id', '$phnum')";
 $result = mysqli_query($dbConn,$sql);
 if (!$result)
 {
 die('Грешка!');
 }
 echo "Добавихте един запис.";
 }
 else
 echo "Не сте въвели данни!";
 
 $result = mysqli_query($dbConn, "SELECT e.empl_id, e.empl_name, p.pos_name, e.empl_number
                                  FROM Employee e
								  JOIN Position p
								  ON e.pos_id=p.pos_id
								  ORDER BY empl_id");
 echo "<table border='2' align='center'>";
 echo "<tr><th>ID</th><th>Име на служителя</th><th>Позиция</th><th>Телефонен номер</th></tr>";
 while($row = mysqli_fetch_array($result)){
 echo "<tr><td>".$row['empl_id']."</td><td>".$row['empl_name']."</td><td>".$row['pos_name']."</td><td>".$row['empl_number']."</td></tr>"; }
 }
?>
</body>
</html>