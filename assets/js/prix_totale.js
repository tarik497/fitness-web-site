// Fonction pour calculer le prix total
function calculerPrixTotal() {
    // Récupérer la wilaya sélectionnée et le prix de livraison associé
    var selectedVille = document.getElementById('ville').value;
    var prixLivraison = 0;

    // Associer les prix de livraison aux wilayas
    switch(selectedVille) {
        case "Adrar":
            prixLivraison = 1000;
            break;
        case "Chlef":
            prixLivraison = 800;
            break;
        case "Laghouat":
            prixLivraison = 1200;
            break;
        case "Oum El Bouaghi":
            prixLivraison = 1000;
            break;
        case "Batna":
            prixLivraison = 1100;
            break;
        case "Béjaïa":
            prixLivraison = 900;
            break;
        case "Biskra":
            prixLivraison = 1300;
            break;
        case "Béchar":
            prixLivraison = 1500;
            break;
        case "Blida":
            prixLivraison = 700;
            break;
        case "Bouira":
            prixLivraison = 900;
            break;
        case "Tamanrasset":
            prixLivraison = 1800;
            break;
        case "Tébessa":
            prixLivraison = 1300;
            break;
        case "Tlemcen":
            prixLivraison = 1000;
            break;
        case "Tiaret":
            prixLivraison = 1200;
            break;
        case "Tizi Ouzou":
            prixLivraison = 1000;
            break;
        case "Alger":
            prixLivraison = 600;
            break;
        case "Djelfa":
            prixLivraison = 1400;
            break;
        case "Jijel":
            prixLivraison = 1100;
            break;
        case "Sétif":
            prixLivraison = 1200;
            break;
        case "Saïda":
            prixLivraison = 1000;
            break;
        case "Skikda":
            prixLivraison = 1100;
            break;
        case "Sidi Bel Abbès":
            prixLivraison = 1300;
            break;
        case "Annaba":
            prixLivraison = 1200;
            break;
        case "Guelma":
            prixLivraison = 1300;
            break;
        case "Constantine":
            prixLivraison = 1400;
            break;
        case "Médéa":
            prixLivraison = 900;
            break;
        case "Mostaganem":
            prixLivraison = 1100;
            break;
        case "M'Sila":
            prixLivraison = 1200;
            break;
        case "Mascara":
            prixLivraison = 1200;
            break;
        case "Ouargla":
            prixLivraison = 1600;
            break;
        case "Oran":
            prixLivraison = 1000;
            break;
        case "El Bayadh":
            prixLivraison = 1400;
            break;
        case "Illizi":
            prixLivraison = 1800;
            break;
        case "Bordj Bou Arreridj":
            prixLivraison = 1000;
            break;
        case "Boumerdès":
            prixLivraison = 900;
            break;
        case "El Tarf":
            prixLivraison = 1200;
            break;
        case "Tindouf":
            prixLivraison = 1500;
            break;
        case "Tissemsilt":
            prixLivraison = 1000;
            break;
        case "El Oued":
            prixLivraison = 1500;
            break;
        case "Khenchela":
            prixLivraison = 1300;
            break;
        case "Souk Ahras":
            prixLivraison = 1200;
            break;
        case "Tipaza":
            prixLivraison = 1100;
            break;
        case "Mila":
            prixLivraison = 1300;
            break;
        case "Aïn Defla":
            prixLivraison = 900;
            break;
        case "Naâma":
            prixLivraison = 1600;
            break;
        case "Aïn Témouchent":
            prixLivraison = 1200;
            break;
        case "Ghardaïa":
            prixLivraison = 1700;
            break;
        case "Relizane":
            prixLivraison = 1100;
            break;
        // Ajoutez des cas pour les autres wilayas avec leurs prix de livraison respectifs
        default:
            prixLivraison = 0; // Par défaut, aucun prix de livraison
    }

    // Mettre à jour le champ de prix livraison dans le formulaire
    document.getElementById('prix_livraison').value = prixLivraison.toFixed(2);

    // Calculer le coût total des produits
    var prixTotalProduits = 0;
    var produits = document.querySelectorAll('input[name^="quantite"]');

    produits.forEach(function(input) {
        // Récupérer l'ID du produit
        var id = input.getAttribute('name').match(/\d+/)[0];

        // Récupérer la quantité
        var quantite = parseFloat(input.value) || 1;

        // Récupérer le prix unitaire du produit
        var prixUnitaire = parseFloat(document.querySelector('input[name="prix[' + id + ']"]').value) || 0;

        // Calculer le coût total pour ce produit
        var coutProduit = quantite * prixUnitaire;

        // Ajouter le coût du produit au coût total des produits
        prixTotalProduits += coutProduit;
    });

    // Calculer le prix total en ajoutant le prix de livraison au coût total des produits
    var prixTotal = prixTotalProduits + prixLivraison;

    // Mettre à jour le champ de prix total dans le formulaire
    document.getElementById('prix_totale').value = prixTotal.toFixed(2);
}

// Assurez-vous d'ajouter un gestionnaire d'événements pour déclencher la fonction
// chaque fois que la quantité ou la wilaya est modifiée
document.querySelectorAll('input[name^="quantite"]').forEach(function(input) {
    input.addEventListener('input', calculerPrixTotal);
});
document.getElementById('ville').addEventListener('change', calculerPrixTotal);

// Appelez la fonction une première fois pour calculer et mettre à jour le prix total lors du chargement de la page
calculerPrixTotal();
