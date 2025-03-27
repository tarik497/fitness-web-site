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
    <!-- <link rel="stylesheet" href="assets/css/styles.css"> -->
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
        <main class="main">
            <div class="container homeContent py-5" style="background-image: url('assets/img/img0.jpg'); background-size: cover; background-position: center;">
                <div class="vh-100 d-flex justify-content-center align-items-center">
                    <header class="masthead text-center text-white py-5">
                        <div class="container">
                            <h1 class="display-4 fw-bold">Une Page de Merveilles de la Forme Physique</h1>
                            <p class="lead mb-4">Impactez Votre Parcours de Remise en Forme</p>
                            <a class="btn btn-primary btn-lg rounded-pill" href="#scroll">En Savoir Plus</a>
                        </div>
                        <div class="bg-circles">
                            <div class="bg-circle bg-circle-1"></div>
                            <div class="bg-circle bg-circle-2"></div>
                            <div class="bg-circle bg-circle-3"></div>
                            <div class="bg-circle bg-circle-4"></div>
                        </div>
                    </header>
                </div>

                <!-- Section de contenu 1 -->
                <section id="scroll" class="py-5">
                    <div class="container">
                        <div class="row gx-5 align-items-center">
                            <div class="col-lg-6 order-lg-2">
                                <div class="p-5">
                                    <img class="img-fluid rounded-circle" src="assets/img/img2.jpg" alt="..." />
                                </div>
                            </div>
                            <div class="col-lg-6 order-lg-1">
                                <div class="p-5">
                                    <h2 class="display-4">Pour ceux qui s'apprêtent à améliorer leur parcours de remise en forme</h2>
                                    <p class="lead">évoque les individus qui se préparent à entreprendre des efforts pour améliorer leur condition physique et leur bien-être général. Il s'adresse à ceux qui sont sur le point de commencer ou de poursuivre leur voyage vers une meilleure santé et un mode de vie plus actif.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                
                <!-- Sections de contenu supplémentaires -->
                <section class="py-5">
                    <div class="container">
                        <div class="row gx-5 align-items-center">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <img class="img-fluid rounded-circle" src="assets/img/img1.jpg" alt="..." />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <h2 class="display-4">Nous saluons votre dévouement !</h2>
                                    <p class="lead">exprime une reconnaissance et une appréciation envers l'engagement et l'effort fournis par une personne ou un groupe de personnes dans la poursuite d'un objectif ou d'une cause. Il célèbre la détermination et la persévérance démontrées par ceux qui s'investissent pleinement dans une activité ou un projet.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="py-5">
                    <div class="container">
                        <div class="row gx-5 align-items-center">
                            <div class="col-lg-6 order-lg-2">
                                <div class="p-5">
                                    <img class="img-fluid rounded-circle" src="assets/img/img3.jpg" alt="..." />
                                </div>
                            </div>
                            <div class="col-lg-6 order-lg-1">
                                <div class="p-5">
                                    <h2 class="display-4">Que la forme physique soit présente !</h2>
                                    <p class="lead">exprime un souhait ou une affirmation en faveur de la présence et de l'importance de la forme physique. Il peut être interprété comme un encouragement à maintenir ou à améliorer sa condition physique et sa santé globale.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>

    <!-- Link JS -->
    <script src="assets/js/main.js"></script>
</body>

</html>