<?php
try {
    $conn = new PDO("mysql:host=localhost;dbname=users", "root", "12345");
    // установка режима вывода ошибок
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
     echo "Connection failed: " . $e->getMessage();
}
?>
