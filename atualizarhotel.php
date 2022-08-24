<?php
require "Database.php";

if(isset($_POST["sigla"]) && isset($_POST["designacao"]) && isset($_POST["sigla_principal"])){
    $sql = $conn->prepare("UPDATE hotel SET Sigla_Hotel=?, Designacao=? WHERE Sigla_Hotel=?");
    $sql->bind_param("sss", $_POST["sigla"],$_POST["designacao"], $_POST["sigla_principal"]);
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

<div class="content">

    <div class="container">
        <h2 class="mb-5">Actualizar Hotéis</h2>

        <div class="table-responsive">

            <table class="table custom-table">
                <thead>
                <tr>
                    <th scope="col">
                        <label class="control control--checkbox">
                            <input type="checkbox" class="js-check-all"/>
                            <div class="control__indicator"></div>
                        </label>
                    </th>
                    <th scope="col">Sigla</th>
                    <th scope="col">Designacao</th>
                </tr>
                </thead>
                <tbody>

                <?php
                /* DELETE e READ */

                /*Consultar a base dados com a query: */
                $sql = "SELECT * FROM Hotel";
                $result = mysqli_query($conn, $sql);

                /*Verifica se a query tinha algum resultado*/
                if (mysqli_num_rows($result) > 0) {

                    /* Percorrer cada resultado da query */
                    while ($row = mysqli_fetch_assoc($result)) {

                        ?>

                        <tr>
                            <th scope="row">
                                <label class="control control--checkbox">
                                    <input type="checkbox"/>
                                    <div class="control__indicator"></div>
                                </label>
                            </th>
                            <form method="post">
                                <td>
                                    <input type="text" name="sigla" placeholder="Sigla hotel" value="<?php echo $row['Sigla_Hotel']; ?>">
                                </td>
                                <td>
                                    <input type="text" name="designacao" placeholder="Designacao" value="<?php echo $row['Designacao']; ?>">
                                </td>
                                <td>
                                    <input type="hidden" name="sigla_principal" value="<?php echo $row['Sigla_Hotel']; ?>">
                                    <input type="submit" class="btn btn-primary" value="Atualizar">
                                </td>
                            </form>
                            <td>
                                <form action="deleteHotel.php" method="post">
                                    <input type="hidden" name="sigla" value="<?php echo $row['Sigla_Hotel']; ?>">
                                </form>
                            </td>


                        </tr>

                        <?php
                    }

                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
