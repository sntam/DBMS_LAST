<?php
include("connect.php");

$sql = "SELECT * FROM questions";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='question'>";
        echo "<p>" . $row['ques'] . "</p>";
        echo "<label><input type='radio' name='answer_" . $row['id'] . "' value='1'>" . $row['optA'] . "</label><br>";
        echo "<label><input type='radio' name='answer_" . $row['id'] . "' value='2'>" . $row['optB'] . "</label><br>";
        echo "<label><input type='radio' name='answer_" . $row['id'] . "' value='3'>" . $row['optC'] . "</label><br>";
        echo "<label><input type='radio' name='answer_" . $row['id'] . "' value='4'>" . $row['optD'] . "</label><br>";
        echo "</div>";
    }
} else {
    echo "No questions available.";
}

$conn->close();
?>