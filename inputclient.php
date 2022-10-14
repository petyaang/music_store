<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <link rel="stylesheet" href="main.css">
 <title></title>
 </head>
 <body>
<form action="#" method="post">
<pre><strong><font size=6>Данни за клиенти</font></strong><br><br>
Име: <input type="text" name="name"/><br>
Адрес: <input type="text" name="address"/><br>
Телефонен номер: <input type="text" name="phnumber"/><br>
  
<input type="submit" name="submit" value="Въведи"/> <a href="musicstore_input.php">Върни се обратно</a><br>
</pre>
</form>
<?php
 include "config.php";
 if (isset($_POST["submit"]))
 {
 $name = $_POST['name'];
 $address = $_POST['address'];
 $phnumber = $_POST['phnumber'];
 
 if (!empty($name)&&!empty($address)&&!empty($phnumber))
 {
 $sql="INSERT INTO Client (client_name, client_address, client_number) VALUES ('$name', '$address', '$phnumber')";
 $result = mysqli_query($dbConn,$sql);
 if (!$result)
 {
 die('Грешка!');
 }
 echo "Добавихте един запис. <br>";
 }
 else
 echo "Не сте въвели данни! <br>";
 
 $result = mysqli_query($dbConn, "SELECT * FROM Client");
 echo "<table border='2' align='center'>";
 echo "<tr><th>ID</th><th>Име</th><th>Адрес</th><th>Телефонен номер</th></tr>";
 while($row = mysqli_fetch_array($result)){
 echo "<tr><td>".$row['client_id']."</td><td>".$row['client_name']."</td><td>".$row['client_address']."</td><td>".$row['client_number']."</td></tr>"; }
 }
?>
</body>
</html>