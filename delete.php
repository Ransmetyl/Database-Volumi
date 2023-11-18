<?php require('funzioni_connessione.inc'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancellazione in corso...</title>
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
</head>
<body>
    <h1>Cancellazione</h1>
    <?php 

        $conn = connetti("localhost","root","","esercizio");
        $isbn = $_GET['isbn'];
        
        $query= "delete from volumi where prestato='N' and isbn=$isbn";

        $risQuery = eseguiQuery($conn,$query);

        if($risQuery)
            header('Location: index.php');
        else 
            echo "<p>Problema nell'eliminazione del libro...</p>";
    ?>  
</body>
</html>

