<?php
// Connect to database
$servername = "localhost";
$username = "emailid";
$password = " ";
$dbname = "buy";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get order ID from URL parameter
$order_id = $_GET['order_id'];

// Retrieve order details from database
$sql = "SELECT * FROM orders WHERE order_id = $order_id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// Display order details
echo "Order ID: " . $row['order_id'] . "<br>";
echo "Customer ID: " . $row['customer_id'] . "<br>";
echo "Order Date: " . $row['order_date'] . "<br>";
echo "Order Status: " . $row['order_status'] . "<br>";

// Display order status form
echo "<form method='post'>";
echo "<select name='order_status'>";
echo "<option value='pending'>Pending</option>";
echo "<option value='processing'>Processing</option>";
echo "<option value='shipped'>Shipped</option>";
echo "<option value='delivered'>Delivered</option>";
echo "</select>";
echo "<input type='submit' name='update_status' value='Update Status'>";
echo "</form>";

// Update order status
if(isset($_POST['update_status'])) {
    $new_status = $_POST['order_status'];
    $sql = "UPDATE orders SET order_status = '$new_status' WHERE order_id = $order_id";
    $conn->query($sql);
    echo "Order status updated successfully!";
}