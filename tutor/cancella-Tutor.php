<?php

    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='a'){
            header("location: ../login.php");
        }

    }else{
        header("location: ../login.php");
    }
    
    
    if($_GET){
        
        include("../connessione.php");
        $id=$_GET["id"];
        $result001= $database->query("select * from tutor where docid=$id;");
        $email=($result001->fetch_assoc())["docemail"];
        $sql= $database->query("delete from webuser where email='$email';");
        $sql= $database->query("delete from tutor where docemail='$email';");
        //print_r($email);
        header("location: index.html");
    }


?>