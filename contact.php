<?php

session_start();  
 if(!isset($_SESSION['user'])){
    header('location:404.php ');
    exit;
    }

// Inclusion du fichier de configuration de la base de données
include("config.php");
// Vérification si le formulaire a été soumis
if (isset($_POST["Submit"])) {
    // Récupération des données du formulaire
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Requête SQL d'insertion des données dans la base de données
    $sql = 'INSERT INTO messages (full_name, email, message) VALUES (?, ?, ?)';

    // Préparation de la requête SQL
    $stmt = mysqli_prepare($conn, $sql);

    // Vérification de la préparation de la requête
    if ($stmt) {
        // Liaison des paramètres avec les valeurs
        mysqli_stmt_bind_param($stmt, "sss", $full_name, $email, $message);

        // Exécution de la requête préparée
        if (mysqli_stmt_execute($stmt)) {
            echo "";
        } else {
            echo "";
        }

        // Fermeture de la requête préparée
        mysqli_stmt_close($stmt);
    } else {
        echo "Erreur lors de la préparation de la requête.";
    }
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitClub</title>
    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="assets/img/img.png" type="image/x-icon">
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/js/bootstrap.js">
</head>
<body>
    <div class="sidebar close">
        <a href="#" class="logo-box">
            <i class='bx bxl-xing'></i>
            <div class="logo-name">FitClub</div>
        </a>
        <ul class="sidebar-list">
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
            <li class="dropdown">
                <div class="title">
                    <a href="programmes.php" class="link">
                        <i class='bx bx-collection'></i>
                        <span class="name">Programes</span>
                    </a>
                </div>
                <div class="submenu">
                    <a href="programme.php" class="link submenu-title">Programes</a>
                </div>
            </li>
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

            <li>
                <div class="title">
                    <a href="encouragement.php" class="link">
                        <i class='bx bx-pie-chart-alt-2'></i>
                        <span class="name">Encouragement</span>
                    </a>
                </div>
            </li>
            <li class="dropdown">
                <div class="title">
                    <a href="contact.php" class="link">
                        <i class='bx bx-envelope'></i>
                        <span class="name">contact</span>
                    </a>
                </div>
                <div class="submenu">
                    <a href="contact.php" class="link submenu-title">contact</a>
                </div>
            </li>
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

    <!-- Section pour le formulaire de contact admin -->
    <section class="home">
        <div class="toggle-sidebar">
            <i class='bx bx-menu'></i>
            <div class="text">FitClub</div>
        </div>

        <main class="voila">
    <div class="content-body">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-xxl-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">contact</h5>
                        </div>
                        <form action="contact.php" method="post" enctype="multipart/form-data" class="p-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="nutrition_name" class="form-label">full_name</label>
                                            <input type="text" class="form-control" id="nutrition_name" name="full_name" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Message</label>
                                            <textarea class="form-control" rows="5"  name="message" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <button type="submit" class="btn btn-primary" name="Submit">Submit</button>
                                        <button type="reset" class="btn btn-light">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


    </section>

    <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>   
    <script src="assets/js/main.js"></script>
</body>
</html>
