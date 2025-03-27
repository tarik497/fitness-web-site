<?php
session_start();  
if(!isset($_SESSION['user'])){
   header('location:404.php ');
   exit;
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
                                <h4> compliment alimentaire</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='container'>
                    <div class='row'>
                    <?php
                    include("config.php");

                    // Vérifier si 'id' est défini dans la requête GET
                    if(isset($_GET['id_compliment_alimentaire'])) {
                        $id_compliment_alimentaire = $_GET["id_compliment_alimentaire"];
                        // Récupérer les détails de la vidéo en fonction de l'ID
                        $sql = "SELECT * FROM compliment_alimentaire WHERE id_compliment_alimentaire = $id_compliment_alimentaire";
                        $result = mysqli_query($conn, $sql);
                        // Vérifier si la requête a retourné des résultats
                        if (mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_array($result);
                    ?>
                    <div class="container mt-5">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="card">
                                <img src="<?php echo $row['image']; ?>" class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $row['compliment_alimentaire_name']; ?></h5>
                                        <h5 class="card-title"><?php echo $row['prix']; ?></h5>
                                        <p class="card-text"><?php echo $row['description']; ?></p>
                                        <a href='panier.php?action=add&id=<?php echo $row['id_compliment_alimentaire']; ?>' class='btn btn-primary'>Acheter</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        } else {
                            // Si aucune vidéo correspondant à l'ID n'est trouvée
                            echo "<p>Aucune produit trouvée avec l'ID spécifié.</p>";
                            }
                        } else {
                            // Si 'id' n'est pas défini dans la requête GET
                            echo "<p>Identifiant de la vidéo non spécifié.</p>";
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
