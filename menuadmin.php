<?php session_start();
if($_SESSION['login']!='directeur@esme.fr'){
    header("Location: accessdenied.php");
}
setcookie('login', 'Directeur', time() + 2*24*3600, null, null, false, true);?>
<!DOCTYPE html>
<html>

    <body>

        <!-- Head -->

        <?php include("head.php"); ?>

        <!-- Body -->

        <div class="element_menu">
            <h3>Interface directeur</h3>
            <ul>
                <li><a href="gestionsalaries.php">Gérer les salariés</a></li>
                <li><a href="gestionconges.php">Gérer les congés</a></li>
                <li><a href="deconnexion.php">Déconnexion</a></li>
            </ul>
        </div>

        <!-- Footer -->

        <?php include("footer.php"); ?>

    </body>
</html>
