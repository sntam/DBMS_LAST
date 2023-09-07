<?php
include("connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $ques = $_POST["ques"];
    $optA = $_POST["optA"];
    $optB = $_POST["optB"];
    $optC = $_POST["optC"];
    $optD = $_POST["optD"];
    $corOpt = $_POST["corOpt"];

    $sql = "INSERT INTO questions (ques, optA, optB, optC, optD, corOpt)
            VALUES ('$ques', '$optA', '$optB', '$optC', '$optD', '$corOpt')";

    if ($mysqli->query($sql) == TRUE) {
        echo "Question added successfully<br>";
        echo "<a href='faculty_dashboard.php'>Add Another Question</a>  |   ";
        echo "<a href='index.php'>Back to Index</a>  |  ";
        echo "<a href='faculty_login.html'>Back to Login</a>";
    }
}
$mysqli->close();
?>