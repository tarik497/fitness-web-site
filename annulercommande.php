<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('location:404.php');
    exit;
}

if (isset($_GET['id_compliment_alimentaire'])) {
    $id_compliment_alimentaire = $_GET["id_compliment_alimentaire"];
    // Supprimer l'ID du produit du panier
    if (($key = array_search($id_compliment_alimentaire, $_SESSION['cart'])) !== false) {
        unset($_SESSION['cart'][$key]);
    }
    // Redirection vers la page du panier
    header('Location: panier.php');
    exit;
} else {
    // Si 'id' n'est pas défini dans la requête GET
    echo "Identifiant de la commande à annuler non spécifié.";
}
?>