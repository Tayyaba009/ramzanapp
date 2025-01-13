<?php 
    include_once 'apis/MysqliDb.php';
    
    // Creating a new database connection
    $db = new MysqliDb(
        'database11.mysql.database.azure.com', // Host
        'ramzan',                   // Username
        'Ramzan123@',                       // Password
        'assignment4'                   // Database name
    );
    
    // Debugging the database connection object
    var_dump($db);
?>
