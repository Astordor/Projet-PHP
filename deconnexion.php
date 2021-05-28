<?php
setcookie('login', '', time() + 2*24*3600, null, null, false, true);
header("Location: accueil.php");?>
