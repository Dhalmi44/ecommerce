<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch products
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My E-Commerce Store</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>My E-Commerce Store</h1>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Contact</a></li>
                <li><button id="cart-button">Cart (0)</button></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="products">
            <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='product'>";
                    echo "<img src='" . $row["image"] . "' alt='" . $row["name"] . "'>";
                    echo "<h2>" . $row["name"] . "</h2>";
                    echo "<p>$" . number_format($row["price"], 2) . "</p>";
                    echo "<input type='number' class='quantity' min='1' value='1'>";
                    echo "<button class='add-to-cart' data-id='" . $row["id"] . "' data-name='" . $row["name"] . "' data-price='" . $row["price"] . "'>Add to Cart</button>";
                    echo "</div>";
                }
            } else {
                echo "<p>No products found</p>";
            }
            ?>
        </section>
    </main>

    <div id="cart-modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Shopping Cart</h2>
            <div id="cart-items">
                <p>Your cart is empty.</p>
            </div>
            <button id="checkout-button">Checkout</button>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 My
