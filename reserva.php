<?php
require "database.php";

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
if(isset($_GET['message'])){
    ?>
    <div class="alert alert-success" role="alert">
        Eliminado com sucesso
    </div>
    <?php
}
if(isset($_GET['messageError'])){   ?>
    <div class="alert alert-danger" role="alert">
        Erro na Eliminação
    </div>
    <?php
}
?>

<div class="content">

    <div class="container">
        <h2 class="mb-5">Reservas</h2>

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
                    <th scope="col">Numero Reserva</th>
                    <th scope="col">Numero Cliente</th>
                    <th scope="col">Data Entrada</th>
                    <th scope="col">Data Saída</th>
                </tr>
                </thead>
                <tbody>

                <?php
                /* DELETE e READ */

                /*Consultar a base dados com a query: */
                $sql = "SELECT * FROM Reserva";
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
                            <td>
                                <input type="text" name="reserva" placeholder="reserva id" value="<?php echo $row['Reserva_id']; ?>">
                            </td>
                            <td>
                                <input type="text" name="cliente" placeholder="cliente id" value="<?php echo $row['Cliente_id']; ?> ">
                            </td>
                            <td>
                                <input type="text" name="dia entrada" placeholder="dia entrada" value=" <?php echo $row['Dia_Entrada']; ?>">
                            </td>
                            <td>
                                <input type="text" name="dia saida" placeholder="dia entrada saida" value=" <?php echo $row['Dia_Saida']; ?> ">
                            </td>
                            <td>
                                <form action="deleteHotel.php" method="post">
                                    <input type="hidden" name="Reserva_id" value="<?php echo $row['Reserva_id']; ?>">
                                    <input type="submit" name ="btdelete" class="btn btn-danger" value="delete">
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

