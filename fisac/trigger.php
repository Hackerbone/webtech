<?php
include 'config.php';

// Create trigger for order logging
$conn->query("DROP TRIGGER IF EXISTS after_order_insert");
$conn->query("CREATE TRIGGER after_order_insert
AFTER INSERT ON Orders
FOR EACH ROW
BEGIN
    INSERT INTO Order_logs (order_id, order_quantity) VALUES (NEW.order_id, NEW.order_quantity);
END;");

$conn->close();
echo "Trigger created successfully!";
?>
