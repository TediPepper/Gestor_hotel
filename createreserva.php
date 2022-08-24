<?php


require "database.php";

$message = false;
$messageError = false;
if( isset($_POST["Reserva_id"]) && isset($_POST["Cliente_id"]) && isset($_POST["Dia_Entrada"]) && isset($_POST["Dia_Saida"])) {
    $sql = $conn->prepare("INSERT INTO RESERVA (Reserva_id, Cliente_id,Dia_Entrada ,Dia_Saida) VALUES(?,?,?,?);");
    $sql->bind_param("ssss", $_POST["Reserva_id"],$_POST["Cliente_id"],$_POST["Dia_Entrada"],$_POST["Dia_Saida"]);
    $sql->execute();

    if(!mysqli_error($conn)){
        $message = true;
    }else{
        $messageError = true;
    }

}


?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Gestor de hotel</title>
</head>
<body>



<?php include "navbar.php";
?>

<div class="d-flex justify-content-center">

    <form method="post">
        <div class="form-group row">
            <label for="Reserva_id" class="col-sm-4 col-form-label">numero de reserva</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="Reserva_id" value="" name="Reserva_id">
            </div>
        </div>
        <div class="form-group row">
            <label for="Cliente_id" class="col-sm-4 col-form-label">Numero Cliente</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="Cliente_id" name="Cliente_id">
            </div>
        </div>
        <div class="form-group row">
            <label for="Dia_Entrada" class="col-sm-4 col-form-label">Dia de entrada</label>
            <div class="col-sm-8">
                <input type="datetime-local" class="form-control" id="Dia_Entrada" name="Dia_Entrada">
            </div>
        </div>
        <div class="form-group row">
            <label for="Dia_Saida" class="col-sm-4 col-form-label">Dia de saida</label>
            <div class="col-sm-8">
                <input type="datetime-local" class="form-control" id="Dia_Saida" name="Dia_Saida">
            </div>
        </div>

        <button type="submit" class="btn btn-primary mb-2">Create reserva</button>
    </form>
</div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>

