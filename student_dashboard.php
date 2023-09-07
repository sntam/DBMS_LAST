<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Welcome, Student!</h2>
        <form action="thankyou.php" method="post">
            <?php
            include("connect.php");

            $sql = "SELECT * FROM questions";
            $result = $mysqli->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='question'>";
                    echo "<p>" . $row['ques'] . "</p>";
                    echo "<label><input type='radio' name='answer_" . $row['id'] . "' value='1'>" . $row['optA'] . "</label><br>";
                    echo "<label><input type='radio' name='answer_" . $row['id'] . "' value='2'>" . $row['optB'] . "</label><br>";
                    echo "<label><input type='radio' name='answer_" . $row['id'] . "' value='3'>" . $row['optC'] . "</label><br>";
                    echo "<label><input type='radio' name='answer_" . $row['id'] . "' value='4'>" . $row['optD'] . "</label><br>";
                    echo "<input type='hidden' name='q_id_" . $row['id'] . "' value='" . $row['id'] . "'>";
                    echo "</div><br>";
                }
            } else {
                echo "No questions available.";
            }
            $mysqli->close();
            ?>
            <input type="submit" value="Submit Answers">
        </form>
    </div>
</body>
</html>
