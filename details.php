<?php
require_once 'db.php';
$id = intval($_POST['id']);
$sql = "SELECT * from cities where country_id='".$id."'";
$result = $conn->query($sql);
echo "<select class=\"cities\" onchange = \"getinfo()\">";
foreach($result as $row)
    {
        echo "<option value =". $row["id"].">".$row["name"]."</option>";
    }
    echo "</select>";
?>
