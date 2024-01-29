<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel - User Details</title>
    <style>
    table,th,td {
        border: 1px solid black;
        border-collapse:collapse;
    }
    </style>
</head>
<body>
    <h1>User Details</h1>
    <table style="width:100%">
        <tr>
            
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <!-- <th>Other Details</th> -->
        </tr>
        <?php
        // Connect to the database (similar to your previous code)
        $host = "localhost";
        $db_name = "registration";
        $db_user = "root";
        $db_pass = "";

        $conn = mysqli_connect('localhost','root','','registration');

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Retrieve user details from the database
        $sql = "SELECT * FROM users";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            // echo "<td>" . $row['user_id'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['password'] . "</td>";
            echo "</tr>";
        }

        mysqli_close($conn);
        ?>
    </table>
</body>
</html>