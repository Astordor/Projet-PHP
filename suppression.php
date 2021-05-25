<!DOCTYPE html>
<html>

    <body>

        <!-- Head -->

        <?php include("head.php"); ?>

        <!-- Body -->

        <div id="body">            
            Suppression effectuée
            <?php
            $connect = mysqli_connect("localhost", "root", "", "test");
            if ($connect) {
                
            } else {
                echo"echec de connexion" . mysqli_connect_error() . "<br/>";
            }
            if (isset($_POST['case'])) {
                $cases = $_POST['case'];
            }
            $req = "delete from informations where mail=?";
            $res = mysqli_prepare($connect, $req);
            $var = mysqli_stmt_bind_param($res, 's', $mail);
            if (!empty($cases)) {
                $N = count($cases);

                foreach ($cases as $value) {
                    $mail = $value;
                    $var = mysqli_stmt_execute($res);
                    if ($var == false)
                        echo"echec de l'exécution de la requête.<br/>";
                }
                mysqli_stmt_close($res);
            }
            ?>
        </div>

        <!--Footer-->
        <a href="gestionsalaries.php">Retour à la page de gestion des salariés</a>
        <?php include("footeradmin.php");
        ?>

    </body>
</html>
