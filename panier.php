<?php
session_start();  

include("config.php");

if(!isset($_SESSION['user'])){
   header('location:404.php ');
   exit;
}


if (isset($_GET['action']) && $_GET['action'] == 'add' && isset($_GET['id'])) {
    $id_compliment_alimentaire = $_GET['id'];
    // Vérifiez que le produit existe dans la base de données
    $result = mysqli_query($conn, "SELECT * FROM compliment_alimentaire WHERE id_compliment_alimentaire = '$id_compliment_alimentaire'");
    if (mysqli_num_rows($result) > 0) {
        // Ajoutez le produit au panier
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
        // Vérifiez si le produit est déjà dans le panier
        if (!in_array($id_compliment_alimentaire, $_SESSION['cart'])) {
            $_SESSION['cart'][] = $id_compliment_alimentaire;
        }
    }
    header("Location: panier.php");
    exit;
}



if (isset($_POST['quantite'])) {
    // Bouclez à travers chaque produit dans le formulaire soumis
    foreach ($_POST['quantite'] as $id_compliment_alimentaire => $quantite) {
        // Vérifiez que la quantité est un entier positif
        if (is_numeric($quantite) && (int)$quantite > 0) {
            // Stockez la quantité dans la session
            $_SESSION['quantite'][$id_compliment_alimentaire] = (int)$quantite;
        } else {
            // Si la quantité est invalide, traitez-la comme 1 ou gérez comme vous le souhaitez
            $_SESSION['quantite'][$id_compliment_alimentaire] = 1;
        }
    }

}





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitClub</title>

    <!-- Box Icons  -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- Styles  -->
    <link rel="shortcut icon" href="assets/img/img.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/js/bootstrap.js">
</head>

<body>
    <div class="sidebar close">
        <!-- ========== Logo ============  -->
        <a href="#" class="logo-box">
            <i class='bx bxl-xing'></i>
            <div class="logo-name">FitClub</div>
        </a>

        <!-- ========== List ============  -->
        <ul class="sidebar-list">
             <!-- -------- Non Dropdown List Item ------- -->
             <li>
                <div class="title">
                    <a href="index.php" class="link">
                        <i class='bx bx-grid-alt'></i>
                        <span class="name">Tableau de bord</span>
                    </a>
                    <!-- <i class='bx bxs-chevron-down'></i> -->
                </div>
                <div class="submenu">
                    <a href="index.php" class="link submenu-title">Tableau de bord</a>
                    <!-- submenu links here  -->
                </div>
            </li>

            <!-- -------- Dropdown List Item ------- -->
            <li class="dropdown">
                <div class="title">
                    <a href="programmes.php" class="link">
                        <i class='bx bx-collection'></i>
                        <span class="name">Programes</span>
                    </a>
                </div>
                <div class="submenu">
                    <a href="programmes.php" class="link submenu-title">Programes</a>
                </div>
            </li>

            <!-- -------- Dropdown List Item ------- -->
            <li class="dropdown">
                <div class="title">
                    <a href="nutrition.php" class="link">
                        <i class='bx bx-book-alt'></i>
                        <span class="name">Nutrition</span>
                    </a>
                </div>
                <div class="submenu">
                    <a href="nutrition.php" class="link submenu-title">Nutrition</a>
                </div>
            </li>

            <!-- -------- Non Dropdown List Item ------- -->
            <li class="dropdown">
                <div class="title">
                    <a href="exercices.php" class="link">
                        <i class='bx bx-book-alt'></i>
                        <span class="name">Exercices</span>
                    </a>
                </div>
                <div class="submenu">
                    <a href="exercices.php" class="link submenu-title">Exercices</a>
                </div>
            </li>


            <li class="dropdown">
                <div class="title">
                    <a href="compliment_alimentaire.php" class="link">
                        <i class='bx bx-collection'></i>
                        <span class="name">Complimet Alimentaire</span>
                    </a>
                </div>
                <div class="submenu">
                    <a href="compliment_alimentaire.php" class="link submenu-title">Complimet Alimentaire</a>
                </div>
            </li>

            <li class="dropdown">
                <div class="title">
                    <a href="panier.php" class="link">
                        <i class='bx bx-collection'></i>
                        <span class="name">Panier</span>
                    </a>
                </div>
                <div class="submenu">
                    <a href="panier.php" class="link submenu-title">Panier</a>
                </div>
            </li>

            <!-- -------- Non Dropdown List Item ------- -->
            <li>
                <div class="title">
                    <a href="encouragement.php" class="link">
                        <i class='bx bx-pie-chart-alt-2'></i>
                        <span class="name">Encouragement</span>
                    </a>
                    <!-- <i class='bx bxs-chevron-down'></i> -->
                </div>
                <div class="submenu">
                    <a href="encouragement.php" class="link submenu-title">Encouragement</a>
                    <!-- submenu links here  -->
                </div>
            </li>

            <!-- -------- Dropdown List Item ------- -->
            <li class="dropdown">
                <div class="title">
                    <a href="contact.php" class="link">
                        <i class='bx bx-envelope'></i>
                        <span class="name">Contact</span>
                    </a>
                </div>
                <div class="submenu">
                    <a href="contact.php" class="link submenu-title">Contact</a>
                    <!-- submenu links here  -->
                </div>
            </li>

            <!-- -------- Non Dropdown List Item ------- -->
            <li>
                <div class="title">
                    <a href="logout.php" class="link">
                        <i class='bx bx-compass'></i>
                        <span class="name">Deconnexion</span>
                    </a>
                    <!-- <i class='bx bxs-chevron-down'></i> -->
                </div>
                <div class="submenu">
                    <a href="logout.php" class="link submenu-title">Deconnexion</a>
                    <!-- submenu links here  -->
                </div>
            </li>
        </ul>
    </div>

    <!-- ============= Home Section =============== -->
    <section class="home">
        <div class="toggle-sidebar">
            <i class='bx bx-menu'></i>
            <div class="text">FitClub</div>
        </div>

        <main>
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Panier</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class='container'>
    <div class='row'>
        <?php
        // Vérifiez si le panier est vide
        if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
            // Si le panier n'est pas vide, affichez les produits
            foreach ($_SESSION['cart'] as $id_compliment_alimentaire) {
                $result = mysqli_query($conn, "SELECT * FROM compliment_alimentaire WHERE id_compliment_alimentaire = '$id_compliment_alimentaire'");
                while ($row = mysqli_fetch_assoc($result)) {
                    $quantite = $_SESSION['quantite'][$id_compliment_alimentaire] ?? 1;
                    
                    // Choisissez les classes Bootstrap pour définir le nombre de colonnes par ligne
                    // Par exemple, `col-md-6` pour deux produits par ligne ou `col-lg-4` pour trois produits par ligne
                    echo '<div class="col-md-6 col-lg-4 mb-4">';
                    
                    // Carte du produit
                    echo '<div class="card h-100">';
                    echo '<img src="' . $row['image'] . '" class="card-img-top" alt="Image">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row['compliment_alimentaire_name'] . '</h5>';
                    echo '<p class="card-text">Prix : ' . $row['prix'] . '</p>';
                    echo '<a href="annulercommande.php?id_compliment_alimentaire=' . $row['id_compliment_alimentaire'] . '" class="btn btn-danger">Annuler</a>';
                    echo '</div>';
                    echo '</div>';
                    
                    echo '</div>'; // Fin de la div col-md-6 ou col-lg-4
                }
            }
            // Affichez le bouton de confirmation s'il y a des produits dans le panier
            echo '<a href="confirmer_commande.php" class="btn btn-success mt-3">Confirmer</a>';
        } else {
            // Si le panier est vide, affichez un message approprié
            echo '<div class="col-12">';
            echo '<p>Votre panier est vide. Veuillez ajouter des produits au panier pour continuer.</p>';
            echo '</div>';
        }
        ?>
    </div>
</div>

    </div>
</main>
        <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    </section>
            

    <!-- Link JS -->
    <script src="assets/js/main.js"></script>
</body>



</html>
