<?php 
    // --- Connection a la base de donnée
    $mysqlConnection = new PDO(
        'mysql:host=127.0.0.1;dbname=commerce;charset=utf8',
        'root',
        ''
    );

?>