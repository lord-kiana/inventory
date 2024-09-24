<?php
include 'Inventory.php';

$inventory = new Inventory();

$product1 = new Product("Water", 10, 20.00);
$product2 = new Product("Sprite", 15, 30.00);

$inventory->addProduct($product1);
$inventory->addProduct($product2);

echo "<h3>Inventory:</h3>";
$inventory->displayInventory();
?>
