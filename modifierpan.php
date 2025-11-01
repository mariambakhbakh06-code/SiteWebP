
<?php
require 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_produits'], $_POST['quantite'])) {
    $id_produits = filter_input(INPUT_POST, 'id_produits', FILTER_VALIDATE_INT);
    $quantite = filter_input(INPUT_POST, 'quantite', FILTER_VALIDATE_INT);

    if ($id_produits !== false && $quantite !== false) {
        $query = $conn->prepare("UPDATE cart SET quantite = ? WHERE id_produits = ?");
        $query->execute([$quantite, $id_produits]);

        $_SESSION['message'] = "Quantité mise à jour !";
    }
}

header("Location: panier.php");
exit();
?>
