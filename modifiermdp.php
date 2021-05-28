<?php session_start(); ?>
<!DOCTYPE html>
<html>

    <body>

        <!-- Head -->

        <?php include("head.php"); ?>

        <!-- Body -->

        <div id="body">
            <form method="post" action="modifiermdp.php">
                Nouveau mot de passe :
                <input type="text" name="password" pattern="^[A-Z].{6,}[0-9]$"/></br></br>
                <input type="submit" value="Valider"/></br></br>
                <?php
                if (isset($_POST["password"])) {
                    $a = 1;
                    $connect = mysqli_connect("127.0.0.1", "root", "", "test");
                    $req = "SELECT * FROM informations";
                    $result = $connect->query($req);
                    $row = $result->fetch_assoc();
                    while ($row = $result->fetch_assoc()) {
                        if ($row['password'] == $_POST['password']) {
                            $a = 0;
                        }
                    }
                    if ($a == 1) {
                        $req = "update informations set password=? where mail =?";
                        $res = mysqli_prepare($connect, $req);
                        $var = mysqli_stmt_bind_param($res, 'ss', $password, $mail);
                        $password = $_POST['password'];
                        $mail = $_SESSION['login'];
                        $var = mysqli_stmt_execute($res);

                        if ($var == false) {
                            echo "echec de l'exécution de la requête.<br/>";
                        } else {
                            echo "Mot de passe modifié";
                            mysqli_stmt_close($res);
                        }
                    } else {
                        echo "Votre mot de passe n'est pas unique, veuillez en saisir un autre";
                    }
                }
                ?>
        </div>

        <!--Footer-->
        <?php include("footeruser.php");
        ?>

    </body>
</html>
