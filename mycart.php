<?php
include 'includes/header.php';

// Start or resume the session
session_start();

// Add item to cart if 'action' is 'add'
if (isset($_GET['action']) && $_GET['action'] == 'add' && isset($_GET['id'])) {
    $_SESSION['cart'][] = $_GET['id'];
}

// Display cart items
echo "<h2>Shopping Cart</h2>";
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    echo "<ul>";
    foreach ($_SESSION['cart'] as $itemId) {
        echo "<li>Item ID: $itemId</li>";
    }
    echo "</ul>";
} else {
    echo "<p>Your cart is empty</p>";
}

include 'includes/footer.php';
?>
