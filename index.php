<?php
    include "database.php";


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
        <h2 class="mb-5">Hotéis</h2>

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
                $conn=$conn= $result = mysqli_query($conn, $sql);

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
                                <?php echo $row['Sigla_Hotel']; ?>
                            </td>
                            <td> <?php echo $row['Designacao']; ?> </td>
                            <td>
                                <form action="deleteHotel.php" method="post">
                                    <input type="hidden" name="sigla" value="<?php echo $row['Sigla_Hotel']; ?>">
                                    <input type="submit" class="btn btn-danger" value="delete">
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

?>
