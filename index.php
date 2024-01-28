<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Shop</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <header>
        <h1>Online Shop</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="cart.php">Cart</a></li>
            </ul>
        </nav>
    </header>
    <main>
    <?php
$host = 'localhost';
$dbname = 'your_database_name';
$username = 'your_database_username';
$password = 'your_database_password';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}
?>
<?php
include 'includes/header.php';
?>
    <h2>Welcome to our Online Shop!</h2>
    <!-- Your homepage content goes here -->
<?php
include 'includes/footer.php';
?>
<?php
include 'includes/header.php';
include 'includes/db.php';

// Fetch products from the database
$stmt = $db->query('SELECT * FROM products');
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Shop</h2>
<div class="product-list">
    <?php foreach ($products as $product): ?>
        <div class="product">
            <h3><?php echo $product['name']; ?></h3>
            <p>Price: $<?php echo $product['price']; ?></p>
            <a href="cart.php?action=add&id=<?php echo $product['id']; ?>">Add to Cart</a>
        </div>
    <?php endforeach; ?>
</div>

<?php
include 'includes/footer.php';
?>

    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Online Shop</p>
    </footer>
</body>
</html>
