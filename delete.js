function deleteCustomer(id)
{
  console.log("OK");

  $.ajax({
    type: "GET",
    url: "loschen.php",
    data: {customer: id},
    dataType: "JSON",
    success: function(response){
      console.log(response);
      console.log("OKK");
      $('#ID' + id).fadeOut(800);
      ;
    }
  });
}

function editData(id)
{

  var datum = $("#datum").val();
  var gegenstand = $("#gegenstand").val();
  var stockwerk = $("#stockwerk").val();
  var wert = $("#wert").val();
  var erledigtbis = $("#erledigtbis").val();
  var kurzbeschreib = $("#kurzbeschreib").val();

    $.ajax({
      type: "GET",
      url: "edit.php",
      data: {da: datum, gege: gegenstand, st: stockwerk, we: wert, er: erledigtbis, ku: kurzbeschreib, id: id},
      dataType: "JSON",
      success: function(response){
        console.log(response);
        console.log("OKK");

        $('#Modal'+id).modal('hide');
        reloadTable(id);
        ;
      }
    });
}

function reloadTable(id)
{
  $("#ID" + id).load("reload.php?id=" + id);
}

function nextweek(id)
{
  console.log("OK");

  $.ajax({
    type: "GET",
    url: "nextweek.php",
    data: {customer: id},
    dataType: "JSON",
    success: function(response){
      console.log(response);
      console.log("OKK");
      $('tr#' + id).fadeOut(800);
      ;
    }
  });
}
