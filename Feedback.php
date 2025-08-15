<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./Feedback.php">
</head>
<body>
<?php
$servername = "localhost"; // Your DB server (usually localhost)
$username   = "root";      // Your MySQL username
$password   = "";          // Your MySQL password
$dbname     = "books";     // Your database name

// Create DB connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data safely
$name = $conn->real_escape_string($_POST['name']);
$feedback = $conn->real_escape_string($_POST['feedback']);

// Insert into database
$sql = "INSERT INTO feedback (name, feedback) VALUES ('$name', '$feedback')";

if ($conn->query($sql) === TRUE) {
    echo "Thank you! Your feedback has been saved.";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
<?php
// Database connection
$servername = "localhost";
$username   = "root";    // change if needed
$password   = "";        // change if needed
$dbname     = "books";   // change if needed

$conn = new mysqli($servername, $username, $password, $dbname);

// If connection fails
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $feedback = $conn->real_escape_string($_POST['feedback']);

    if (!empty($name) && !empty($feedback)) {
        $sql = "INSERT INTO feedback (name, feedback) VALUES ('$name', '$feedback')";
        $conn->query($sql);
    }
}

// Fetch all feedback
$result = $conn->query("SELECT name, feedback, created_at FROM feedback ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Feedback</title>
    <?php
// Database connection
$servername = "localhost";
$username   = "root";    // change if needed
$password   = "";        // change if needed
$dbname     = "books";   // change if needed

$conn = new mysqli($servername, $username, $password, $dbname);

// If connection fails
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $feedback = $conn->real_escape_string($_POST['feedback']);

    if (!empty($name) && !empty($feedback)) {
        $sql = "INSERT INTO feedback (name, feedback) VALUES ('$name', '$feedback')";
        $conn->query($sql);
    }
}

// Fetch all feedback
$result = $conn->query("SELECT name, feedback, created_at FROM feedback ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Feedback</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 20px;
        }
        h2 {
            color: #333;
        }
        form {
            background: #fff;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
        }
        input, textarea, button {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background: #28a745;
            color: white;
            cursor: pointer;
            border: none;
        }
        button:hover {
            background: #218838;
        }
        .feedback-item {
            background: #fff;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 8px;
        }
        .feedback-item strong {
            color: #007bff;
        }
        .date {
            color: gray;
            font-size: 12px;
        }
    </style>
</head>
<body>

<h2>Leave Your Feedback</h2>
<form method="POST" action="">
    <input type="text" name="name" placeholder="Your Name" required>
    <textarea name="feedback" placeholder="Your Feedback" required></textarea>
    <button type="submit">Submit</button>
</form>

<h2>All Feedback</h2>
<?php while($row = $result->fetch_assoc()): ?>
    <div class="feedback-item">
        <strong><?php echo htmlspecialchars($row['name']); ?></strong>  
        <span class="date">(<?php echo $row['created_at']; ?>)</span>
        <p><?php echo nl2br(htmlspecialchars($row['feedback'])); ?></p>
    </div>
<?php endwhile; ?>

</body>
</html>

<?php $conn->close(); ?>
</body>
</html>
