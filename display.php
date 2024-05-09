<?php
        if (isset($_POST['displayButton'])) {
            include 'Db_Connect.php';  // Adjust the path as necessary

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $query = "SELECT * FROM users";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Email</th></tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
            $conn->close();
        }
    ?>