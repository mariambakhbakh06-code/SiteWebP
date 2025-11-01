
<?php
require 'conn.php';
$query = $conn->query("SELECT * FROM produits");
$produits = $query->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>

<div class="container">
    <div class="row">
        <?php foreach ($produits as $produit) { ?>
            <div class="col-4">
                <div class="card">
                    <img src="<?= $produit['image'] ?>" class="card-img-top" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title"><?= $produit['nom'] ?></h5>
                        <p class="card-text"><?= $produit['prix'] ?>£</p>
                        <form action="ajout_pan.php" method="POST">
                            <input type="hidden" name="id_produits" value="<?= $produit['id'] ?>">
                            <input type="hidden" name="prix" value="<?= $produit['prix'] ?>">
                            <button type="submit" class="btn btn-primary">🛒 Ajouter au panier</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
</body>
</html>