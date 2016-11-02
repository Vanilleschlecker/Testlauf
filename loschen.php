<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projekt";

// Create connection

$mysqli = new mysqli($servername, $username, $password, $dbname, 3306);
if($mysqli->connect_errno)
{
echo 'Datenbankverbindung fehlerhaft!';
exit;
}

$id = $_GET['customer'];

$sql = $mysqli->query("DELETE FROM information WHERE id = '".$id."'");

  if($mysqli->query($sql) == TRUE)
  {
    echo 1;
  }
  else {
    echo 0;
  }

 ?>
