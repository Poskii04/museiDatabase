<?php
session_start();
?>
<html>

    <head>
        <style>
            table,td,tr,th{
                border-collapse: collapse;
                border: 1px solid black;
            }
        </style>
        <title>Lista musei e opere</title>
        <meta charset="utf-8">
    </head>

    <body>
        
        
        <?php
           
            if($_SESSION["logged"]!=true) // se ho tentato di entrare direttamente scrivendo il link della pagina, controllo questa variabile che viene settatta a true solo se faccio il login
            {
                header("location: http://localhost/POSCHINA/Musei_DataBase/Login.html"); // se trovo false ho tentato di accedere senza fare il login quindi torno alla pagina di login
            }
                
                echo "<center><h1>Benvenuto ".$_SESSION["username"]."</h1></center>"; // scrivo il nome dell'utente trovato
        /*connessione database */
            $username="root";
            $password="";
            $server="localhost";
            $database="opere";
                
            $conn=new mysqli($server,$username,$password,$database);
        
            $conn->set_charset("utf8mb4");
        
            if($conn->connect_errno > 0 )
            {
                die('Errore di connessione '.$conn->connect_error);
            }
                
            $qry="SELECT * FROM museo"; //Creao la query che mi permette di visualizzare tutti i musei
        
            $risultato=$conn->query($qry); // manda la query scritta nella variabile $qry e metti il risultato dentro la variabile
        
            echo "<center><table><th>CodM</th><th>Nome</th><th>Citta</th>";
        
            while($riga = $risultato->fetch_assoc()){
                echo "<tr><td>$riga[CodM]</td><td>$riga[Nome]</td><td>$riga[Citta]</td></tr>";
            }
        
            echo "</table></center>";
            echo "<hr>";
            
            $qry="SELECT * FROM opera"; // stessa cosa di sopra
            
            $risultato=$conn->query($qry);
            
            echo "<center><table><th>CodO</th><th>Titolo</th><th>DataCreazione</th><th>CodM</th>";
        
            while($riga = $risultato->fetch_assoc()){
                echo "<tr><td>$riga[CodO]</td><td>$riga[Titolo]</td><td>$riga[DataCreazione]</td><td>$riga[CodM]</td></tr>";
            }
            echo "</table></center>";
            
            session_destroy();
        ?>
        
    </body>


</html>