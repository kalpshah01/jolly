<?php
// Database connection
$host = "localhost";   // usually localhost
$user = "root";        // phpMyAdmin username
$pass = "";            // phpMyAdmin password (set it if exists)
$db   = "jollyganpati";

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("❌ Database connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $tower = trim($_POST["tower"]);
    $flatno = trim($_POST["flatno"]);
    $games = isset($_POST["games"]) ? implode(", ", $_POST["games"]) : "";

    if ($name && $tower && $flatno && $games) {
        $stmt = $conn->prepare("INSERT INTO submissions (name, tower, flatno, games) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $tower, $flatno, $games);

        if ($stmt->execute()) {
            echo "<h2>✅ Thank you, $name! for participate in the $games.</h2>";
            echo "<a href='jolly.php'>Back to Form</a>";
        } else {
            echo "❌ Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "<h2>⚠️ Please fill all fields and select at least one game.</h2>";
        echo "<a href='jolly.php'>Back to Form</a>";
    }
}
$conn->close();
?>
