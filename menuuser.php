<?php session_start(); ?>
<!DOCTYPE html>
<html>

    <body>

        <!-- Head -->

        <?php include("head.php"); ?>

        <!-- Body -->

        <div class="element_menu">
            <h3>Interface utilisateur</h3>
            <ul>
                <li><a href="gestionprofil.php">Consulter mon profil</a></li>
                <li><a href="postercommentaire.php">Poster un commentaire</a></li>
                <li><a href="conges.php">Faire une demande de congé</a></li>
                <li><a href="historiqueconge.php">Consulter mes congés</a></li>
                <li><a href="modifiermdp.php">Modifier mon mot de passe</a></li>
            </ul>
        </div>

        <!-- Footer -->

        <?php include("footer.php"); ?>

    </body>
</html>
