<?php
    session_start(); //starto la sessione, cosi facendo posso usare la variabile $_SESSION per portarmi appresso valori da pagina a pagina, in ogni pagina devo usare questa riga di codice per poter usare la varibile sopra citata
?>
<html>
<head></head>
<body>
<?php
    
    
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

    $user=$_POST['user']; //prendo username e password che sono stati passati tramite la richiesta post
    $pass=$_POST['pass'];

    $qry="SELECT Username, Password FROM utente WHERE Username='".$user."' AND Password='".$pass."'"; //scrivo la stringa che contiene la query
    
    var_dump($qry); //visualizza il contenuto della variabile passata come parametro
    
    $result=$conn->query($qry); //mando la query e metto il risultato in $result
    
    if($rows=$result->fetch_assoc()) //Prendo la prima riga dal risultato se ne trovo una allora il l'utente esiste nel database e quindi posso far entrare l'utente nella pagina
    {
        $_SESSION["logged"]=true;   //setto a true questa variabile che indica il fatto che ho fatto il login
        $_SESSION["username"]=$rows["Username"]; // passo anche lo username visto che lo metterò nella pagina di banvenuto
        header("location: http://localhost/POSCHINA/Musei_Database/database.php");// redirect alla pagina desiderata. Dato che la sessione rimane viva mi porto i dati da quella pagina a questa
    }
    else
    {
        header("location: http://localhost/POSCHINA/Musei_DataBase/Login.html");
    }

    

?>
    </body>
</html>