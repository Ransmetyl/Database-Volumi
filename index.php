<!--

    Comandi da fare all'interno del dbms:

        Crea database:
        >create database Esercizio;

        Entra nel database:
        >use Esercizio;

        Crea tabella:

        >create table volumi(

            isbn int primary key,
            titolo varchar(50) not null,
            autore varchar(50) not null,
            data_prestito date,
            prestato char(1);   
        
        );

        Inserimento:
        >insert into volumi values(1234,"l'informatica mi piace","Mongelli","2023-11-08","N");

        Per la data:
        >select curdate();  solo la data
        >select now(); data + orario
        >select curtime(); solo orario;

        Stampa dei volumi:
        >select * from volumi;
        
 -->

<style>

    body{
        font-family: arial;
        text-align: center;
    }

    input[type=submit]{
        padding: 10px;
        font-size: 15px;
    }

    .container-elementi{
        width: 20%;
        padding-top: 10px;
        border: 3px solid green;
        margin: 0 auto;
    }
    
</style>

 <!DOCTYPE html>
 <html lang="it">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserimento Libri</title>
 </head>
 <body>
    <h1>INSERIMENTO LIBRI</h1>
    <form action=
        <?= $_SERVER["PHP_SELF"]?>
    method="post">
        <div class="container-elementi">
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
        </div>
        <br />
        <input type="submit" value="INSERISCI LIBRO" name="inserisci"></input>
        <input type="submit" value="STAMPA DATABASE" name="stampa"></input>
    </form>

    <?php 
        
        require("funzioni_connessione.inc");

        

        if(isset($_POST["inserisici"])){

            if(isset($_POST["isbn"]) && !isEmpty($_POST["isbn"])){
                if(isset($_POST["titolo"]) && !isEmpty($_POST["titolo"])){
                    if(isset($_POST["autore"]) && !isEmpty($_POST["autore"])){
                    
                        $isbn = $_POST["isbn"];
                        $titolo = $_POST["titolo"];
                        $autore = $_POST["autore"];

                        $connessione = connetti('localhost','root','','Volumi');
                        $queryEseguita = eseguiQuery($connessione,)

                    }
                }
            }
        }

        if(isset($_POST["stampa"])){
            
            $connessione = connetti('localhost','root','','Volumi');
            $queryEseguita = eseguiQuery($connessione,'use Volumi;');
            $queryEseguita = eseguiQuery($connessione,'select * from Volumi');
            echo $queryEseguita;
            $connessione->chiudiConnessione();
        }
    
    ?>


 </body>
 </html>