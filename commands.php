<?php
require_once 'db.php';
    $idcnt = intval($_POST['idcnt']);
    $idcit = intval($_POST['idcit']);
    $sql = "select * from countries where id = '".$idcnt."'";
    $result = $conn->query($sql);
    echo "Выбранная страна: ".$result->fetch()['name']."<br>";
    $sql = "select * from cities where id = '".$idcit."'";
    $result = $conn->query($sql);
    echo "Выбранный город: ".$result->fetch()['name']."<br>";
?>
