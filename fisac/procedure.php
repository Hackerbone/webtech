<?php
include 'config.php';

// Create stored procedure
$conn->query("DROP PROCEDURE IF EXISTS getProductDetails");
$conn->query("CREATE PROCEDURE getProductDetails(IN prod_id INT)
BEGIN
    SELECT p.product_name, c.category_name, 
           (SELECT COUNT(*) FROM Orders WHERE product_id = prod_id) AS total_orders
    FROM Products p
    LEFT JOIN Categories c ON p.category_id = c.category_id
    WHERE p.product_id = prod_id;
END;");

$conn->close();
echo "Stored procedure created successfully!";
?>
