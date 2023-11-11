<?php

    function connetti($host,$user,$password,$database){
        try{

            $connessione = new mysqli($host,$user,$password,$database);
            return $connessione;
            
        }catch(Exception $e){
            header(Location("index.php"));
            die($e->getMessage());
        }
    }

    function eseguiQuery($connessione,$query){
        try{
            $ris = $connessione->query($query);
            return $ris;
            
        }catch(Exception $e){
            die($e->getMessage());     
        }

    }

    function chiudiConnessione($connessione){
        $connessione->close();
    }

    function generaTab($risultato){
        
        $flag=true;
        $out = '<table>';

        while($riga = $risultato->fetch_array(MYSQLI_ASSOC)){

            if($flag){
                $k = array_keys($riga);
                $out.="<tr><th>".$k."</th></tr>";
                $flag = false;
            }

            $out.= "<tr>";

            foreach($riga as $v){
                $out.="<td>$v</td>";
            }
            $out.="</tr>";
        }

        return $out;
    }

?>