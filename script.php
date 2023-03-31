<?php
require_once 'db.php';
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Страница для авторизованных пользователей</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
<script type="text/javascript">
function getinfo(){
    var idcnt = $('.countries').val();
    var idcit = $('.cities').val();
    $.ajax({
        type: "POST",
        url: "command.php",
        data: {idcnt:idcnt, idcit:idcit}
    }).done(function( data )
        {
            $("#res").html( data );
        });
}

function getdetails(){
    var id = $('.countries').val();
$.ajax({
        type: "POST",
        url: "details.php",
        data: {id:id}
    }).done(function( data )
        {
            $("#msg").html( data );
        });
    }
</script>
</head>
<body>

<select size='1' class="countries" onchange="getdetails()">
  <option value="0">--Выберите страну--</option>
  <?php
    $result = $conn->query("select * from countries;");
    foreach($result as $row)
    {
        echo "<option value =". $row["id"].">".$row["name"]."</option>";
    }
  ?>
</select>
<div id="msg"></div>
<div id="res"></div>
</body>
</html>
