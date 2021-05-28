<?php session_start(); ?>
<!DOCTYPE html>
<html>

    <body>

        <!-- Head -->

        <?php include("head.php"); ?>

        <!-- Body -->

        <div id="body">            
            <form method="post" action="ajoutersalarie.php">

                <p>
                    Nom* :
                    <input type="text" name="nom"/></br></br>
                    Prénom* :
                    <input type="text" name="prenom"/></br></br>
                    Adresse mail* :
                    <input type="email" name="mail"/></br></br>
                    Numéro de téléphone* :
                    <input type="text" name="telephone"/></br></br>
                    Fonction* :
                    <select name="fonction">
                        <option value="Enseignant">Enseignant</option>
                        <option value="Personnel administratif">Personnel administratif</option>
                    </select>
                    </br></br>Type de contrat* :
                    <select name="contrat">
                        <option value="CDI">CDI</option>
                        <option value="CDD">CDD</option>
                    </select>
                    </br></br>Date d'embauche* :
                    <input type="date" name="date_embauche"/></br></br>
                    RTT restants* :
                    <input type="text" name="RTT"/></br></br>
                    Congés payés restants* :
                    <input type="text" name="CP"/></br></br>
                    Code postal :
                    <input type="text" name="code_postal"/></br></br>
                    Ville :
                    <input type="text" name="ville"/></br></br>
                    Rue :
                    <input type="text" name="rue"/></br></br>
                    Nationalité :
                    <input type="text" name="nationalite"/></br></br>
                    Sexe :
                    <input type="text" name="sexe"/></br></br>
                    Situation familiale :
                    <input type="text" name="situation_familiale"/></br></br>
                    Age :
                    <input type="text" name="age"/></br></br>

                    <input type="submit" value="Valider"/></br></br>
                </p>
        </div>
        <?php
        $connect = mysqli_connect("localhost", "root", "", "test");
        if ($connect) {
            
        } else {
            echo "echec de connexion" . mysqli_connect_error() . "<br/>";
        }
        if (isset($_POST["nom"])){
        $req = "insert into informations(nom,prenom,mail,telephone,fonction,contrat,date_embauche,RTT,CP,code_postal,ville,rue,nationalite,sexe,situation_familiale,age,password)values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $res = mysqli_prepare($connect, $req);
        $var = mysqli_stmt_bind_param($res,'sssssssssssssssss',$nom,$prenom,$mail,$telephone,$fonction,$contrat,$date_embauche,$RTT,$CP,$code_postal,$ville,$rue,$nationalite,$sexe,$situation_familiale,$age,$password);               
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $mail = $_POST["mail"];
        $telephone = $_POST["telephone"];
        $fonction = $_POST["fonction"];
        $contrat = $_POST["contrat"];
        $date_embauche = $_POST["date_embauche"];
        $RTT = $_POST["RTT"];
        $CP = $_POST["CP"];
        $code_postal = $_POST["code_postal"];
        $ville = $_POST["ville"];
        $rue = $_POST["rue"];
        $nationalite = $_POST["nationalite"];
        $sexe = $_POST["sexe"];
        $situation_familiale = $_POST["situation_familiale"];
        $age = $_POST["age"];
        $password = random_int(1000, 9999);
        $var = mysqli_stmt_execute($res);
        if ($var == false) {
            echo"echec de l'exécution de la requête.<br/>";
        } else {
            echo"Ajout effectué<br/>";
        }
        mysqli_stmt_close($res);
        }
        ?>


        <!-- Footer -->

        <?php include("footeradmin.php"); ?>

    </body>
</html>