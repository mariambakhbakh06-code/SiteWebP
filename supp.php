
<?php
require 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_produits'])) {
    $id_produits = filter_input(INPUT_POST, 'idproduits', FILTER_VALIDATE_INT);

    if ($id_produits !== false) {
        $query = $conn->prepare("DELETE FROM cart WHERE id_produits = ?");
        $query->execute([$id_produits]);

        $_SESSION['message'] = "Produit supprimé du panier !";
    }
}

header("Location: paniera.php");
exit();
?>
