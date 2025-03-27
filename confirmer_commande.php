<?php


session_start();
include("config.php");

if (!isset($_SESSION['user'])) {
    header('location: 404.php');
    exit;
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des valeurs du formulaire
    $nomclient = $_POST['nomclient'];
    $telephone = $_POST['telephone'];
    $wilaya = $_POST['wilaya'];
    $adresse = $_POST['adresse'];
    $confirmation_date = $_POST['confirmation_date'];
    $prix_livraison = $_POST['prix_livraison'];
    $prix_totale = $_POST['totale'];

    // Récupérer les quantités saisies dans le formulaire
    $quantites = $_POST['quantite'] ?? [];

    // Assurez-vous que la session de panier existe
    if (isset($_SESSION['cart'])) {
        $cartItems = $_SESSION['cart'];
        
        // Itération sur chaque élément du panier
        foreach ($cartItems as $itemId) {
            // Récupérer les détails de l'élément
            $sql = "SELECT * FROM compliment_alimentaire WHERE id_compliment_alimentaire = $itemId";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);

                // Récupérer la quantité de l'élément à partir du tableau des quantités
                $quantite = isset($quantites[$itemId]) ? (int) $quantites[$itemId] : 1;

                // Calcul du prix de la commande (quantité * prix)
                $prix_commande = $row['prix'] * $quantite;

                // Insertion des informations de la commande dans la table commande
                $sql_insert = "INSERT INTO commande (nomclient, telephone, quantite, image, wilaya, adresse, confirmation_date, prix_commande, prix_livraison, totale)
                               VALUES ('$nomclient', '$telephone', '$quantite', '{$row['image']}', '$wilaya', '$adresse', '$confirmation_date', '$prix_commande', '$prix_livraison', '$prix_totale')";

                if (mysqli_query($conn, $sql_insert)) {
                    // La commande a été enregistrée avec succès pour cet élément
                    echo "Commande pour l'élément ID $itemId enregistrée avec succès.<br>";
                } else {
                    // Affichez l'erreur s'il y a un problème avec l'insertion
                    echo "Erreur lors de l'insertion de la commande pour l'élément ID $itemId : " . mysqli_error($conn) . "<br>";
                }
            }
        }
    }

    // Effacez le panier et les quantités de la session une fois la commande confirmée
    unset($_SESSION['cart']);
    unset($_SESSION['quantite']);

    // Redirection vers une autre page pour éviter la soumission multiple
    header('Location: compliment_alimentaire.php');
    exit();
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
            <!-- Utiliser une div avec `d-flex justify-content-center` pour centrer le formulaire -->
            <div class="d-flex justify-content-center">
                <!-- Utilisez `mx-auto` pour centrer la colonne -->
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Confirmer la commande</h5>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <!-- Placez votre code PHP ici -->
                                <?php
                                
                    
                                // Vérifiez si des produits sont présents dans le panier
                                if (isset($_SESSION['cart'])) {
                                    $cartItems = $_SESSION['cart'];
            
                                    foreach ($cartItems as $cartItem) {
                                        // Récupérer les détails de chaque produit en fonction de l'ID
                                        $sql = "SELECT * FROM compliment_alimentaire WHERE id_compliment_alimentaire = $cartItem";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_array($result)) {
                                                // Afficher les détails du produit
                                                echo '<div class="card mb-3">';
                                                echo '<div class="card-body">';
                                                echo '<img src="' . $row['image'] . '" alt="' . $row['compliment_alimentaire_name'] . '" style="width: 100%;">';
                                                echo '<h5 class="card-title">Compliment alimentaire : ' . $row['compliment_alimentaire_name'] . '</h5>';
                                                echo '<p>Prix : ' . $row['prix'] . '</p>';
            
                                                // Récupérer la quantité de chaque produit dans la session
                                                $quantite = isset($_SESSION['quantite'][$cartItem]) ? $_SESSION['quantite'][$cartItem] : 1;
            
                                                // Afficher la quantité dans un champ d'entrée
                                                echo '<label> Quantite : </label>';
                                                echo '<input type="number" id="quantite_' . $row['id_compliment_alimentaire'] . '" name="quantite[' . $row['id_compliment_alimentaire'] . ']" value="' . $quantite . '" min="1" class="form-control">';
            
                                                // Récupérer le prix et l'ajouter en champ d'entrée caché
                                                echo '<input type="hidden" name="prix[' . $row['id_compliment_alimentaire'] . ']" value="' . $row['prix'] . '">';                                 
                                                echo '</div>';
                                                echo '</div>';
                                            }
                                        }
                                    }
                                }
            
                            
                                ?>
                                
                                <!-- Afficher les champs de formulaire pour les détails du client -->
                                <div class="form-group">
                                    <label for="nomclient">Nom De Client</label>
                                    <input type="text" class="form-control" name="nomclient" placeholder="Nom De Client" required>
                                </div>
                                <div class="form-group">
                                    <label for="telephone">Téléphone</label>
                                    <input type="number" class="form-control" name="telephone" placeholder="Téléphone" required>
                                </div>
                                <div class="form-group">
                                    <label for="ville">Wilaya :</label>
                                    <select name="wilaya" id="ville" class="form-control" required>
                                        <option value="">Sélectionnez une wilaya</option>
                                        <option value="Adrar">Adrar</option>
                                        <option value="Chlef">Chlef</option>
                                        <option value="Laghouat">Laghouat</option>
                                        <option value="Oum El Bouaghi">Oum El Bouaghi</option>
                                        <option value="Batna">Batna</option>
                                        <option value="Béjaïa">Béjaïa</option>
                                        <option value="Biskra">Biskra</option>
                                        <option value="Béchar">Béchar</option>
                                        <option value="Blida">Blida</option>
                                        <option value="Bouira">Bouira</option>
                                        <option value="Tamanrasset">Tamanrasset</option>
                                        <option value="Tébessa">Tébessa</option>
                                        <option value="Tlemcen">Tlemcen</option>
                                        <option value="Tiaret">Tiaret</option>
                                        <option value="Tizi Ouzou">Tizi Ouzou</option>
                                        <option value="Alger">Alger</option>
                                        <option value="Djelfa">Djelfa</option>
                                        <option value="Jijel">Jijel</option>
                                        <option value="Sétif">Sétif</option>
                                        <option value="Saïda">Saïda</option>
                                        <option value="Skikda">Skikda</option>
                                        <option value="Sidi Bel Abbès">Sidi Bel Abbès</option>
                                        <option value="Annaba">Annaba</option>
                                        <option value="Guelma">Guelma</option>
                                        <option value="Constantine">Constantine</option>
                                        <option value="Médéa">Médéa</option>
                                        <option value="Mostaganem">Mostaganem</option>
                                        <option value="M'Sila">M'Sila</option>
                                        <option value="Mascara">Mascara</option>
                                        <option value="Ouargla">Ouargla</option>
                                        <option value="Oran">Oran</option>
                                        <option value="El Bayadh">El Bayadh</option>
                                        <option value="Illizi">Illizi</option>
                                        <option value="Bordj Bou Arreridj">Bordj Bou Arreridj</option>
                                        <option value="Boumerdès">Boumerdès</option>
                                        <option value="El Tarf">El Tarf</option>
                                        <option value="Tindouf">Tindouf</option>
                                        <option value="Tissemsilt">Tissemsilt</option>
                                        <option value="El Oued">El Oued</option>
                                        <option value="Khenchela">Khenchela</option>
                                        <option value="Souk Ahras">Souk Ahras</option>
                                        <option value="Tipaza">Tipaza</option>
                                        <option value="Mila">Mila</option>
                                        <option value="Aïn Defla">Aïn Defla</option>
                                        <option value="Naâma">Naâma</option>
                                        <option value="Aïn Témouchent">Aïn Témouchent</option>
                                        <option value="Ghardaïa">Ghardaïa</option>
                                        <option value="Relizane">Relizane</option> 
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="adresse">Adresse</label>
                                    <input type="text" class="form-control" name="adresse" placeholder="Adresse" required>
                                </div>

                                <div class="form-group">
                                    <label for="confirmation_date">Date de confirmation</label>
                                    <input type="date" class="form-control" name="confirmation_date" placeholder="confirmation_date" required>
                                </div>

                                <!-- Champs pour les détails de la commande -->
                                <div class="form-group">
                                    <label for="prix_livraison">Prix de Livraison</label>
                                    <input id="prix_livraison" class="form-control" name="prix_livraison" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="prix_totale">Prix Total</label>
                                    <input id="prix_totale" class="form-control" name="totale" readonly>
                                </div>
                                <button type="submit" class="btn btn-success">Confirmer la commande</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        
    </section>
    <!-- Link JS -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/c_c.js"></script>
    <script src="assets/js/prix_totale.js"></script>
</body>


</html>                       



