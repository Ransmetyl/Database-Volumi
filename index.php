<?php 
    require("funzioni_connessione.inc");
?>
 <!DOCTYPE html>
 <html lang="it">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserimento Libri</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
 </head>
 <body>
    <fieldset id="fieldset">
    <legend align="center"><h1>INSERIMENTO LIBRI</h1></legend>
        <form action= <?= $_SERVER["PHP_SELF"]?> method="post">
                <label for="isbn">ISBN:</label>
                <input type="number" name="isbn" id="isbn" min="1000" value="1000"></input>
                <br />
                <br />
                <label for="titolo">Titolo:</label>
                <input type="text" name="titolo" id="titolo"></input>
                <br />
                <br />
                <label for="autore">Autore:</label>
                <input type="text" name="autore" id="autore"></input>
                <br />
                <br />
    </fieldset>
        <br />
        <label for="stato">Stato: </label>
            <select name="stato" id="stato">
                <option value="P">PRESTATO</option>
                <option value="N" selected>NON PRESTATO</option>
            </select>
        <br />
        <br />
        <input type="submit" value="INSERISCI LIBRO" name="inserisci"></input>
        <input type="submit" value="STAMPA DATABASE" name="stampa"></input>
    </form>

    <?php 
        
        if(isset($_POST["inserisci"])){

            if(isset($_POST["isbn"]) && !empty($_POST["isbn"])){
                if(isset($_POST["titolo"]) && !empty($_POST["titolo"])){
                    if(isset($_POST["autore"]) && !empty($_POST["autore"])){
                    
                        $isbn = $_POST["isbn"];
                        $titolo = $_POST["titolo"];
                        $autore = $_POST["autore"];
                        //$stato = $_POST["stato"];
                        $connessione = connetti('localhost','root','','Esercizio');
                        $queryEseguita = inserisciVolume($connessione,$isbn,$titolo,$autore,'N');

                        if($queryEseguita)
                            echo "<br /><div class=works>Query eseguita con successo.</div>";
                    }else
                        echo "<br /><div class=error>Errore: Inserire un autore.</div>";
                }else
                    echo "<br /><div class=error>Errore: Inserire un titolo.</div>";
            }else
                echo "<br /><div class=error>Errore: Inserire un ISBN.</div>";
        }

        if(isset($_POST["stampa"])){
            
            $connessione = connetti('localhost','root','','Esercizio');
            $queryEseguita = eseguiQuery($connessione,'use Esercizio;');
            $queryEseguita = eseguiQuery($connessione,'select * from volumi where prestato="'.$_POST["stato"].'"');
            echo generaTab($queryEseguita);
            chiudiConnessione($connessione);
        }
   

    ?>

    <div class="copyright"><p>© Pizzolato Michelangelo 5AII</p></div>
    <div class="nota"><p>Database utilizzato: Esercizio</br>Nome della tabella: volumi</p></div>
 </body>
 </html>