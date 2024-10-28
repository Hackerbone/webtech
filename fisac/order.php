<?php
include 'config.php';

// Function to create an order
function createOrder($product_id, $order_quantity, $conn) {
    // Check product stock
    $product_check = $conn->query("SELECT product_name, stock_quantity FROM Products WHERE product_id = $product_id");
    $product = $product_check->fetch_assoc();

    // If requested quantity exceeds stock, show error message
    if ($product['stock_quantity'] < $order_quantity) {
        echo "<div style='text-align: center; margin-top: 50px;'>
                <img src='https://media.giphy.com/media/3ohzdZh9tn5rpMOgWg/giphy.gif' alt='Error Lego' style='width: 200px;'>
                <h2>Error: Not enough stock available for <em>" . htmlspecialchars($product['product_name']) . "</em>.</h2>
                <p>You will be redirected shortly...</p>
              </div>";
        header("refresh:5;url=index.php"); // Redirect back to home after 5 seconds
        return;
    }

    // Place order and update stock
    $conn->query("INSERT INTO Orders (product_id, order_quantity) VALUES ($product_id, $order_quantity)");
    $conn->query("UPDATE Products SET stock_quantity = stock_quantity - $order_quantity WHERE product_id = $product_id");

    // Display success message
    echo "<div style='text-align: center; margin-top: 50px;'>
            <img src='https://media.giphy.com/media/l4FGE5xbI7U6cVzVm/giphy.gif' alt='Success Lego' style='width: 200px;'>
            <h2>Order placed successfully for <em>" . htmlspecialchars($product['product_name']) . "</em>!</h2>
            <p>You will be redirected shortly...</p>
          </div>";
    header("refresh:5;url=index.php"); // Redirect back to home after 5 seconds
}

// Handle POST request for placing an order
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];
    $order_quantity = $_POST['order_quantity'];
    createOrder($product_id, $order_quantity, $conn);
}

$conn->close();
?>
