<?php
include("connect.php");

$mysqli = new mysqli($localhost, $user, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $regno = $_POST["regno"];
    $password = $_POST["password"];

    $sql = "SELECT password FROM students WHERE regno = ?";
    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $regno);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows === 1) {
            $stmt->bind_result($dbPassword);
            $stmt->fetch();
            if (password_verify($password, $dbPassword)) {
                session_start();
                $_SESSION["regno"] = $regno;
                $stmt->close();
                header("Location: student_dashboard.php");
                exit();
            } else {
                echo "Invalid credentials (password mismatch)";
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