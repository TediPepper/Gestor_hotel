<?php

include "database.php";

if( isset($_POST["sigla"]) ) {
    $sql = $conn->prepare("DELETE FROM Hotel WHERE Sigla_Hotel = ?;");
    $sql->bind_param("s", $_POST["sigla"]);
    $sql->execute();

    echo mysqli_error($conn);
    header("Location: index.php");

}

if( isset($_POST["btdelete"])){
    $reserva_id = $_POST["Reserva_id"] ;
    $sql = $conn->prepare("DELETE FROM Reserva WHERE Reserva_id = ?;");
    $sql->bind_param("d", $reserva_id);
    $sql->execute();

    echo mysqli_error($conn);

    if(!mysqli_error($conn)){
        header("Location: reserva.php?message=true");
    }else{
        header("Location: reserva.php?messageerror=true");
    }

}

?>