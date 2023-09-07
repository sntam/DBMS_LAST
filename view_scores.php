<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Student Scores</h2>
        <?php
        include("connect.php");

        $sql = "SELECT s.name, q.ques, a.student_answer, q.corOpt
                FROM students s
                JOIN answers a ON s.regno = a.regno
                JOIN questions q ON a.question_id = q.id";

        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Student Name</th><th>Question</th><th>Student Answer</th><th>Correct Answer</th><th>Score</th></tr>";
            while ($row = $result->fetch_assoc()) {
                $score = ($row['student_answer'] == $row['corOpt']) ? 1 : 0;
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['ques'] . "</td>";
                echo "<td>" . $row['student_answer'] . "</td>";
                echo "<td>" . $row['corOpt'] . "</td>";
                echo "<td>" . $score . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No student scores available.";
        }

        $mysqli->close();
        ?>
        <br>
        <a href="faculty_dashboard.php">Back to Faculty Dashboard</a>
    </div>
</body>
</html>
