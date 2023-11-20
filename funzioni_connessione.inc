<?php

    function connetti($host,$user,$password,$database){
        try{

            $connessione = new mysqli($host,$user,$password,$database);
            return $connessione;
            
        }catch(Exception $e){
            header('Location: index.php');
            die($e->getMessage());
        }
    }

    function eseguiQuery($connessione,$query){
        try{
            $ris = $connessione->query($query);
            return $ris;
            
        }catch(Exception $e){
            die("<br /><div class=error>Errore: ".$e->getMessage().".</div>");     
        }

    }

    function chiudiConnessione($connessione){
        $connessione->close();
    }

    function generaTab($risultato){
        
        $flag=true;
        $out = '</br></br><div class="container-tabella">';
        $out.= '<table>';

        while($riga = $risultato->fetch_array(MYSQLI_ASSOC)){

            if($flag){
                $k = array_keys($riga);
                $out.= "<th>Delete</th><th>Modify</th>";

                foreach($k as $intestazione){
                    $intestazione=strtoupper($intestazione);
                    $out.="<th>".$intestazione."</th>";
                }

                $out.="</tr>";
                $flag = false;
            }

            $out.= "<tr>";
            if($riga['prestato'] == 'N')
                $out.="<td><a href=delete.php?isbn=".$riga['isbn'].">Delete</td>";
            else 
                $out.= '<td>&nbsp</td>';
            $url = http_build_query($riga,null,'&',PHP_QUERY_RFC3986);

            $out.="<td><a href=modify.php?".$url.">Modify</td>";
           
            foreach($riga as $v){
                $out.="<td>$v</td>";
            }
            $out.="</tr>";
        }
        $out.="</table></div>";
        return $out;
    }
    function inserisciVolume($connessione,$isbn,$titolo,$autore,$stato){

        $queryEseguita = eseguiQuery($connessione,'use Esercizio;');
        $query = "insert into volumi values($isbn,'$titolo','$autore',curdate(),'$stato')"; 
        $queryEseguita = eseguiQuery($connessione,$query);
        return $queryEseguita;
    }

    function modificaValori($isbn_vecchio,$isbn,$titolo,$autore,$data,$prestato){

        $query = "update volumi set 
                isbn=". "$isbn".
                ",titolo="."'$titolo'".
                ",autore="."'$autore'".
                ",data="."current_date".
                ",prestato="."'$prestato'
                where isbn='$isbn_vecchio'";

        $conn = connetti("localhost","root","","esercizio");

        //$queryEseguita = eseguiQuery($conn,$query);

        echo $query;
        
    }   

?>