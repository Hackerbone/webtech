<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Inventory - Lego Store</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
<div class="container mx-auto my-10 p-5 bg-white shadow-lg rounded-lg">

    <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Lego Product Inventory</h1>
    <h1 class="text-xl font-bold text-center text-gray-800 mb-8">Web Technology FISAC</h1>

	<!-- Show team members -->
	<h2 class="text-2xl font-semibold text-gray-700 mt-8">Team Members</h2>
	<ul class="list-disc list-inside">
		<li>Shreyas Jha - 220953013</li>
		<li>S Sitaraman - 200953080</li>
		<li>Sri Anshu Kantipudi - 220953264</li>
	</ul>

	<br/>
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include 'config.php';

    // Fetch products
    $sql_products = "SELECT p.product_id, p.product_name, p.price, p.stock_quantity, c.category_name 
                     FROM Products p 
                     LEFT JOIN Categories c ON p.category_id = c.category_id";
    $result_products = $conn->query($sql_products);
    ?>

    <!-- Products Table -->
    <table class="min-w-full bg-white border mb-8">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Product ID</th>
                <th class="py-2 px-4 border-b">Product Name</th>
                <th class="py-2 px-4 border-b">Category</th>
                <th class="py-2 px-4 border-b">Price ($)</th>
                <th class="py-2 px-4 border-b">Stock Quantity</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result_products->fetch_assoc()) { ?>
                <tr>
                    <td class="py-2 px-4 border-b text-center"><?php echo $row['product_id']; ?></td>
                    <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($row['product_name']); ?></td>
                    <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($row['category_name']); ?></td>
                    <td class="py-2 px-4 border-b text-center"><?php echo number_format($row['price'], 2); ?></td>
                    <td class="py-2 px-4 border-b text-center"><?php echo $row['stock_quantity']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <h2 class="text-2xl font-semibold text-gray-700 mt-8">Place an Order</h2>
    <form action="order.php" method="post" class="mt-4">
        <input type="number" name="product_id" placeholder="Product ID" class="px-3 py-2 border" required>
        <input type="number" name="order_quantity" placeholder="Quantity" class="px-3 py-2 border" required>
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white">Place Order</button>
    </form>

    <!-- Orders Table -->
    <h2 class="text-3xl font-bold text-center text-gray-800 mt-10 mb-8">Order Details</h2>

    <?php
    // Fetch orders with product details
    $sql_orders = "SELECT o.order_id, o.order_quantity, o.order_date, p.product_name, p.price, c.category_name 
                   FROM Orders o 
                   JOIN Products p ON o.product_id = p.product_id
                   LEFT JOIN Categories c ON p.category_id = c.category_id
                   ORDER BY o.order_date DESC";
    $result_orders = $conn->query($sql_orders);
    ?>

    <?php if ($result_orders->num_rows > 0) : ?>
        <table class="min-w-full bg-white border">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Order ID</th>
                    <th class="py-2 px-4 border-b">Product Name</th>
                    <th class="py-2 px-4 border-b">Category</th>
                    <th class="py-2 px-4 border-b">Price ($)</th>
                    <th class="py-2 px-4 border-b">Quantity Ordered</th>
                    <th class="py-2 px-4 border-b">Total Price ($)</th>
                    <th class="py-2 px-4 border-b">Order Date</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($order = $result_orders->fetch_assoc()) { ?>
                    <tr>
                        <td class="py-2 px-4 border-b text-center"><?php echo $order['order_id']; ?></td>
                        <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($order['product_name']); ?></td>
                        <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($order['category_name']); ?></td>
                        <td class="py-2 px-4 border-b text-center"><?php echo number_format($order['price'], 2); ?></td>
                        <td class="py-2 px-4 border-b text-center"><?php echo $order['order_quantity']; ?></td>
                        <td class="py-2 px-4 border-b text-center"><?php echo number_format($order['price'] * $order['order_quantity'], 2); ?></td>
                        <td class="py-2 px-4 border-b text-center"><?php echo $order['order_date']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="text-gray-600 text-center">No orders have been placed yet.</p>
    <?php endif; ?>
</div>

<?php $conn->close(); ?>
</body>
</html>
