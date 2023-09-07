<?php
include("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM faculties WHERE username = ?";

    $stmt = $mysqli->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashedPasswordFromDB = $row["password"];
            if ($password == $hashedPasswordFromDB) {
                header("Location: faculty_dashboard.php");
                exit();
            } else {
                echo "Invalid credentials (password mismatch)";
                echo "Entered Password: $password<br>";
            }
        } else {
            echo "Invalid credentials (username not found)";
        }

        $stmt->close();
    } else {
        echo "Statement preparation failed: " . $mysqli->error;
    }
} else {
    echo "Invalid request method";
}
$mysqli->close();
?>
