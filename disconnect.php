<?php
// Au début
session_start();

// Supprime la variable de session correspondant au user connecté
unset($_SESSION['userID']);

header('Location: index.php');