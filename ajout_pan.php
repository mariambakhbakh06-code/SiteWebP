
<?php
require 'connexion.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_produits'], $_POST['quantite'])) {
    $id_produits = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
    $quantite = filter_input(INPUT_POST, 'quantite', FILTER_VALIDATE_INT);

    if ($id_produits !== false && $quantite !== false) {
        $query = $conn->prepare("SELECT id FROM produits WHERE id = ?");
        $query->execute([$id_produits]);

        if ($query->fetch()) {
            $query = $conn->prepare("INSERT INTO cart (id_produits, quantite) VALUES (?, ?) 
                ON DUPLICATE KEY UPDATE quantite = quantite + VALUES(quantite)");
            $query->execute([$id_produits, $quantite]);

            $_SESSION['message'] = "Produit ajouté au panier !";
        } else {
            $_SESSION['error'] = "Produit non trouvé.";
        }
    } else {
        $_SESSION['error'] = "Données invalides.";
    }
}

header("Location: paniera.php");
exit();
?>
