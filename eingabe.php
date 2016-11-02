<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projekt";

// Verbindung herstellen

$mysqli = new mysqli($servername, $username, $password, $dbname, 3306);
if($mysqli->connect_errno)
{
echo 'Datenbankverbindung fehlerhaft!';
exit;
}

if(isset($_GET['logout']))
{
    $_SESSION['eingeloggt'] = false;
    header("location: ./affenformular.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
  <head>
    <script
    src="https://code.jquery.com/jquery-3.1.1.js"
    integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
    crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <link href="style.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Coiny|Syncopate" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link href="style.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>
  <body>
    <section class="container">
      <div class="row">
        <h1>Datenbank</h1>
        <div class="col-md-12">
          <form action="eingabe.php" method="post" enctype="multipart/form-data" id="myform">
            <p>Datum: <input id="date" type="date" required name="datum" placeholder="Datum" class="form-control"/></p>
            <p>Gegenstand: <select name="gegenstand" class="form-control" id="sel1">
              <option value="Fassade">Fassade</option>
              <option value="Fenster">Fenster</option>
              <option value="Tuere">Tür</option>
              <option value="Moebel">Möbel</option>
              <option value="Boden">Boden</option>
              <option value="Dach">Dach</option>
              <option value="sonstige">Sonstige</option>
            </select></p>
            <p>Stockwerk: <input type="number" required name="number" min="0" max="10" class="form-control"></p>
            <p>Kosten in Fr.: <input type="number" id="wert" required type="text" name="wert" placeholder="Wert" class="form-control"/></p>
            <p>Erledigt bis: <input id="erledigt" type="date" name="erledigtbis" placeholder="Erldigt" class="form-control"/></p>
            <p>Kurzer Beschreib: <textarea required placeholder="Beschreib" name="note" class="form-control note" rows="5" id="comment"></textarea></p>
            <button type="submit" name="absenden" value="absenden" class="form-control btn btn-primary">Absenden</Button>
            <br>
            <br>

          </form>
          <form action="datenbank.php">
            <input type="submit" value="Zur Datenbank" class="form-control btn btn-primary"/>
          </form>
          <?php
            if(@$_POST['absenden'])
            {
              $date = @$_POST['datum'];
              $gegenstand = @$_POST['gegenstand'];
              $stockwerk = @$_POST['number'];
              $kosten = @$_POST['wert'];
              $erledigt = @$_POST['erledigtbis'];
              $beschreib = @$_POST['note'];

              if(strtotime($erledigt) < strtotime($date))
              {
                echo 'FEHLERMELDUNG: Das Erledigt-Datum muss kleiner sein, wie das Eingabedatum';
              } else {

                $mysqli->query("INSERT INTO information (datum, stockwerk, gegenstand, wert, erledigtbis, kurzbeschreib) VALUES ('".$date."', '".$stockwerk."', '".$gegenstand."', '".$kosten."', '".$erledigt."', '".$beschreib."')");
              }

            }
           ?>
        </div>
      </div>
  </section>
  </body>



</html>
