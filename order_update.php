<!-- Modify your orders table to include an order_status column. This column will store the order status, such as 
"Delivered," "On the Way," "Processing," etc.

ALTER TABLE orders
ADD COLUMN order_status VARCHAR(255) NOT NULL DEFAULT 'Processing';

Admin Order Status Update Page (admin_update_order.php): -->

<!DOCTYPE html>
<html>
<head>
    <title>Admin - Update Order Status</title>
</head>
<body>
    <h1>Update Order Status</h1>

    <?php
    // Check if the admin is logged in (you need to implement admin authentication)

    // if ($adminIsLoggedIn) {
        // Replace $adminIsLoggedIn with your admin authentication logic

        // Handle form submission to update order status
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get the order ID and the new order status from the form
            $order_id = $_POST['order_id'];
            $new_status = $_POST['new_status'];

            // Connect to the database (similar to your previous code)
            $host = "localhost";
            $db_name = "order";
            $db_user = "root";
            $db_pass = "";

            $conn = mysqli_connect('localhost','root','','order');

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Update the order status in the database
            $sql = "UPDATE users SET order_status = ? WHERE order_id = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "si", $new_status, $order_id);

            if (mysqli_stmt_execute($stmt)) {
                echo "Order status updated successfully.";
            } else {
                echo "Error updating order status: " . mysqli_error($conn);
            }

            mysqli_close($conn);
        }

        // Display a form for admins to update the order status
        echo "<form method='post'>";
        echo "Order ID: <input type='text' name='order_id' required><br>";
        echo "New Status: <input type='text' name='new_status' required><br>";
        echo "<button type='submit'>Update Status</button>";
        echo "</form>";
    // } else {
    //     echo "Please log in as an admin to update order status.";
    // }
    ?>
</body>
</html>