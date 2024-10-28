<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'ecommerce';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<?php
include 'config.php';

// Create tables
$conn->query("CREATE TABLE IF NOT EXISTS Categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(255) UNIQUE
)");

$conn->query("CREATE TABLE IF NOT EXISTS Products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255),
    price DECIMAL(10, 2),
    stock_quantity INT,
    category_id INT,
    FOREIGN KEY (category_id) REFERENCES Categories(category_id) ON DELETE SET NULL
)");

$conn->query("CREATE TABLE IF NOT EXISTS Orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    order_quantity INT,
    order_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES Products(product_id) ON DELETE CASCADE
)");

$conn->query("CREATE TABLE IF NOT EXISTS Order_logs (
    log_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    order_quantity INT,
    timestamp DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (order_id) REFERENCES Orders(order_id)
)");

// Insert sample data
$conn->query("INSERT IGNORE INTO Categories (category_name) VALUES ('Lego City'), ('Lego Technic')");
$conn->query("INSERT IGNORE INTO Products (product_name, price, stock_quantity, category_id)
    VALUES 
    ('Lego Fire Truck', 19.99, 100, 1),
    ('Lego Bulldozer', 29.99, 50, 2)");

$conn->close();
echo "Setup completed successfully!";
?>
