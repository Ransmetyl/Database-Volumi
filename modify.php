<?php 
    require('funzioni_connessione.inc');

    $isbn = $_GET["isbn"];
    $titolo = $_GET["titolo"];
    $autore = $_GET["autore"];
    $data = $_GET["data_prestito"];
    $prestato = $_GET["prestato"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifica del libro</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
</head>
<body>
    <form action="<?=$_SERVER["PHP_SELF"]?>" method="POST">
    <fieldset id="fieldset">
    <legend align="center"><h1>MODIFICA</h1></legend>
        <form action= <?= $_SERVER["PHP_SELF"]?> method="post">
                <label for="isbn">ISBN:</label>
                <input type="number" name="isbn" id="isbn" min="1000" value="<?php echo $isbn?>" readonly></input>
                <br />
                <br />
                <label for="titolo">Titolo:</label>
                <input type="text" name="titolo" id="titolo" value="<?php echo $titolo?>"></input>
                <br />
                <br />
                <label for="autore">Autore:</label>
                <input type="text" name="autore" id="autore" value="<?php echo $autore?>"></input>
                <br />
                <br />
    </fieldset>
    &nbsp;

        <br />
        <label for="stato">Stato: </label>
            <select name="stato" id="stato">
                <option value="P"<?php if($prestato == 'P') echo "selected"?>>PRESTATO</option>
                <option value="N"<?php if($prestato == 'N') echo "selected"?>>NON PRESTATO</option>
            </select>
        <br />
        <br />
        <input type="submit" value="INDIETRO" name="indietro"></input>
        <input type="submit" value="MODIFICA" name="modifica"></input>
    </form>

    <?php 
    
        if(isset($_POST['indietro']))
            header('Location: index.php');

        if(isset($_POST['modifica'])){

            $isbn_vecchio = $isbn;

            if(isset($_POST['isbn']))
                $isbn = $_POST['isbn'];
            

            if(isset($_POST['titolo']))
                $titolo = $_POST['titolo'];

            if(isset($_POST['isbn']))
                $autore = $_POST['autore'];

            if(isset($_POST['stato']))
                $prestato = $_POST['stato'];
                

            modificaValori($isbn_vecchio,$isbn,$titolo,$autore,$data,$prestato); 
        
            //header('Location: index.php');
                
        }

    
    ?>


</body>
</html>