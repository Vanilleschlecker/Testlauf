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
$id = $_GET['id'];
$gege = $_GET['gege'];
$st = $_GET['st'];
$we = $_GET['we'];
$er = $_GET['er'];
$ku = $_GET['ku'];
$da = $_GET['da'];

$sql = "UPDATE information SET datum = '".$da."', stockwerk = '".$st."', gegenstand = '".$gege."', wert = '".$we."', erledigtbis = '".$we."', kurzbeschreib = '".$ku."' WHERE id = '".$id."' ";
  if($mysqli->query($sql) == TRUE)
  {
    echo 1;
  }
  else {
    echo 0;
  }

 ?>
