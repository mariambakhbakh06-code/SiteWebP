
<?php
require 'connexion.php';
$conn->query("DELETE FROM cart");
header("Location: paniera.php");
exit();
?>
