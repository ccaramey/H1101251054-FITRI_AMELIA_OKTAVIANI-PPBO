<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Services\UserService;
use App\Services\ProductService;

try {
    $userService = new UserService();
    $user = $userService->createUser('Amey', 'amey@example.com');
    echo "<h3>Data User</h3>";
    echo $userService->displayUser($user);

    $productService = new ProductService();
    $product1 = $productService->createProduct('Laptop', 13500000);
    $product2 = $productService->createProduct('Mouse Wireless', 150000);

    echo "<h3>Data Produk</h3>";
    echo $productService->displayProduct($product1);
    echo "<br><br>";
    echo $productService->displayProduct($product2);
} catch (Throwable $e) {
    echo "<h3>Terjadi Error</h3>";
    echo "<p>Pesan: " . $e->getMessage() . "</p>";
    echo "<p>File: " . $e->getFile() . "</p>";
    echo "<p>Line: " . $e->getLine() . "</p>";
}