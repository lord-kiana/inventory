<?php
include 'Product.php';

class Inventory {
    private $products = [];

    public function addProduct(Product $product) {
        $this->products[] = $product;
    }

    public function displayInventory() {
        if (empty($this->products)) {
            echo "No products in inventory.<br>";
        } else {
            foreach ($this->products as $product) {
                echo $product->displayProduct() . "<br>";
            }
        }
    }
}
?>
