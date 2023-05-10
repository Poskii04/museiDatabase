<?php
    $username="root"; /*admin*/
    $password="";
    $server="localhost";
    $database="museiopere";
        
    $conn=new mysqli($server,$username,$password,$database);

    $conn->set_charset("utf8mb4");

    if($conn->connect_errno > 0 )
    {
        die('Errore di connessione '.$conn->connect_error);
    }

    /* prendo i valori */
    $user=$_POST['user']; //prendo username e password che sono stati passati tramite la richiesta post
    $pass=$_POST['pass'];
    $name=$_POST['nm'];
    $lsname=$_POST['lnm'];

    /*chiedo username dei database */
    $qry="SELECT username FROM utenti WHERE Username='".$user."'";
    $result=$conn->query($qry); //mando la query e metto il risultato in $result

    if($rows=$result->fetch_assoc()) //Prendo la prima riga dal risultato se ne trovo una allora il l'utente esiste nel database e quindi posso far entrare l'utente nella pagina
    {
        $_SESSION["reg"]="username gia' in uso";   //setto a true questa variabile che indica il fatto che ho fatto il login
        header("location: http://localhost/POSCHINA/Musei_Database/register.html");// redirect alla pagina desiderata. Dato che la sessione rimane viva mi porto i dati da quella pagina a questa
    } else{
        $qry= "INSERT INTO utenti values ('".$user."','".$pass."' , '".$name."', '".$lsname."');";
        header("location: http://localhost/POSCHINA/Musei_Database/Login.html");
    }
?>