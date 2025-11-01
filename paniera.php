
<?php
session_start();
require 'conn.php';

$query = $conn->query("
    SELECT p.id, p.nom, p.prix, p.image, c.quantite 
    FROM cart c 
    JOIN produits p ON c.idproduits = p.id
");
$cart = $query->fetchAll();

$total = 0;
?>

<h2>🛒 Votre Panier</h2>
<table border="1">
    <tr>
        <th>Produit</th>
        <th>Prix</th>
        <th>Quantité</th>
        <th>Sous-total</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($cart as $produit) { 
        $sous_total = $produit['prix'] * $produit['quantite'];
        $total += $sous_total;
    ?>
        <tr>
            <td><?= $produit['nom'] ?></td>
            <td><?= $produit['prix'] ?>£</td>
            <td><?= $produit['quantite'] ?></td>
            <td><?= $sous_total ?>£</td>
            <td>
                <form action="modifierpan.php" method="POST">
                    <input type="hidden" name="id_produits" value="<?= $produit['id'] ?>">
                    <input type="number" name="quantite" value="<?= $produit['quantite'] ?>" min="1">
                    <button type="submit">Modifier</button>
                </form>
                <form action="supp.php" method="POST">
                    <input type="hidden" name="id_produits" value="<?= $produit['id'] ?>">
                    <button type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
    <?php } ?>

</table>
<h3>Total à payer : <strong><?= $total ?>£</strong></h3>
<a href="index.php">🔄 Continuer les achats</a>
<a href="vidpan.php">🗑 Vider le panier</a>

