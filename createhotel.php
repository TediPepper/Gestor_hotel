<?php
/*Incluir um outro ficheiro no index */
require "database.php";

$message = false;
$messageError = false;
if( isset($_POST["sigla"]) && isset($_POST["designacao"])){
    $sql = $conn->prepare("INSERT INTO Hotel (Sigla_Hotel,Designacao) VALUES(?,?);");
    $sql->bind_param("ss", $_POST["sigla"],$_POST["designacao"]);
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



<?php include "navbar.php"; ?>

    <?php
    if($message){
    ?>
    <div class="alert alert-success" role="alert">
        Submetido com sucesso
    </div>
    <?php
    }
    if($messageError){   ?>
    <div class="alert alert-danger" role="alert">
        Erro na submissao
    </div>
        <?php
    }
    ?>


    <div class="d-flex justify-content-center">
    <form method="post">
        <div class="form-group row">
            <label for="siglaHotel" class="col-sm-4 col-form-label">Sigla Hotel</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="siglaHotel" value="" name="sigla">
            </div>
                </div>
                <div class="form-group row">
                    <label for="designacao" class="col-sm-4 col-form-label">Designacao</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="designacao" name="designacao">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Create hotel</button>
            </form>
            </div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
