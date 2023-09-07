<?php
    include("connect.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $regno = $_POST["regno"];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $confirmPassword = $_POST["confirm_password"];
        if ($_POST["password"] !== $confirmPassword) {
        echo "Error: Passwords do not match.";
    } else {
        $sql = "INSERT INTO students (regno, name, password) VALUES ('$regno','$name', '$password')";
        if ($mysqli->query($sql) === TRUE) {
            header("Location: student_login.html"); }
        else {
            echo "Error: " . $sql . "<br>" . $mysqli->error;
        }
    }
}
$mysqli->close();
?>