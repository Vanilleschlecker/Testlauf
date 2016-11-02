<?php
session_start();

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
$sql = $mysqli->query("SELECT * FROM information WHERE id = '".$id."' ");

    while($row = $sql->fetch_object())
    {

        echo "<td>".$row->datum."</td>";
        echo "<td>".$row->stockwerk."</td>";
        echo "<td>".$row->gegenstand."</td>";
        echo "<td>".$row->wert."</td>";
        echo "<td>".$row->erledigtbis."</td>";
        echo "<td>".$row->kurzbeschreib."</td>";
        echo "<td>".$row->id."</td>";
        echo "<td><button type='button' class='btn btn-primary btn-default' data-toggle='modal' data-target='#Modal".$row->id."'>Bearbeiten</button>";
        echo "<td><Button class='btn btn-primary' type='button' onclick='deleteCustomer(\"".$row->id."\");'><i class='fa fa-trash' aria-hidden='true'/></button></td>";

      ?>

      <!-- Modal -->
      <div class="modal fade" id="Modal<?php echo $row->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Eintrag bearbeiten</h4>
                  </div>
                  <div class="modal-body">

                      <div class="input-group">
                          <span class="input-group-addon" id="basic-addon1">Datum</span>
                          <input type="date" class="form-control" id="datum" placeholder="Problembeschreibung" value="<?php echo $row->datum; ?>" aria-describedby="basic-addon1">

                      </div>

                      <br>
                      <div class="input-group">
                          <span class="input-group-addon" id="basic-addon1">Gegenstand</span>
                          <input type="text" class="form-control" id="gegenstand" placeholder="Problembeschreibung" value="<?php echo $row->gegenstand; ?>" aria-describedby="basic-addon1">
                      </div>
                      <br>
                      <div class="input-group">
                          <span class="input-group-addon" id="basic-addon1">Stockwerk</span>
                          <input type="number" class="form-control" id="stockwerk" placeholder="Problembeschreibung" value="<?php echo $row->stockwerk; ?>" aria-describedby="basic-addon1">
                      </div>
                      <br>
                      <div class="input-group">
                          <span class="input-group-addon" id="basic-addon1">Kosten</span>
                          <input type="number" class="form-control" id="wert" placeholder="Problembeschreibung" value="<?php echo $row->wert; ?>" aria-describedby="basic-addon1">
                      </div>
                      <br>
                      <div class="input-group">
                          <span class="input-group-addon" id="basic-addon1">Erledigt bis</span>
                          <input type="date" class="form-control" id="erledigtbis" placeholder="Problembeschreibung" value="<?php echo $row->erledigtbis; ?>" aria-describedby="basic-addon1">
                      </div>
                      <br>
                      <div class="input-group">
                          <span class="input-group-addon" id="basic-addon1">Kurzbeschreib</span>
                          <input type="text" class="form-control" id="kurzbeschreib" placeholder="Problembeschreibung" value="<?php echo $row->kurzbeschreib; ?>" aria-describedby="basic-addon1">
                      </div>
                      <br>


                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Fenter schliessen</button>
                      <button type='button' onClick='editData(<?php echo $row->id; ?>)' class='btn btn-primary'>Erstellen</button>
                  </div>
              </div>
          </div>
      </div>

      <?php
    }
