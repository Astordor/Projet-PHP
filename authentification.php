<!DOCTYPE html>
<html>

    <body>

        <!-- Head -->

        <?php include("head.php"); ?>  

        <!-- Body -->

        <div id="body">           
            <form method="post" action="authentification.php">

                <p>
                    Profil :
                    <select name="admin">
                        <option value=1>Directeur</option>
                        <option value=0>Salarié</option>
                    </select>    
                    </br></br>Login :
                    <input type="text" name="username"/></br></br>
                    Password :
                    <input type="password" name="password"/></br></br>
                    <input type="submit" value="Valider"/></br></br>
                </p>
                <?php
                if (isset($_POST['username']) and isset($_POST['password'])) {
                    if ($_POST['username'] == null or $_POST['password'] == null) {
                        echo "Les champs login et mot de passe sont requis";
                    } else {
                        $connect = mysqli_connect("localhost", "root", "", "test");
                        if ($connect) {
                            
                        } else {
                            echo "echec de connexion" . mysqli_connect_error() . "<br/>";
                        }
                        $req = "select mail, password, admin from informations where mail=?";
                        $res = mysqli_prepare($connect, $req);
                        $var = mysqli_stmt_bind_param($res, 's', $username);
                        $username = $_POST['username'];
                        $var = mysqli_stmt_execute($res);
                        if ($var == false) {
                            echo"echec de l'exécution de la requête.<br/>";
                        } else {
                            $var = mysqli_stmt_bind_result($res, $username, $password, $admin);
                            $var = mysqli_stmt_store_result($res);
                            $occurence = mysqli_stmt_num_rows($res);
                            $var = mysqli_stmt_bind_result($res, $username, $password, $admin);
                            if ($occurence == 0) {
                                echo "Aucun compte associé à ce login";
                            } else {
                                while (mysqli_stmt_fetch($res)) {
                                    if ($password == $_POST['password'] AND $admin == $_POST['admin']) {
                                        if ($_POST['admin'] == 1) {
                                            header("Location: menuadmin.php");
                                        }
                                        if ($_POST['admin'] == 0) {
                                            header("Location: menuuser.php");
                                        }
                                    } else {
                                        echo "Votre mot de passe est incorrect<br/><br/>";
                                    }
                                }
                            }
                            mysqli_stmt_close($res);
                        }
                    }
                }
                ?>

                <!-- Footer -->

                <?php include("footer.php"); ?>

                </body>
                </html>
