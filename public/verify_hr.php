<?php
session_start();

// Block if no POST data
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['username'], $_POST['password'])) {
    header("Location: login_hr.php?error=invalidrequest");
    exit();
}
// Connect to MySQL
$mysqli = new mysqli("localhost", "synapse_user", "StrongPassword123!", "synapse_auth");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Sanitize user input
$username = trim($_POST['username']);
$password = trim($_POST['password']);

file_put_contents("login_hr_debug.log", "USERNAME=[$username] | PASSWORD=[$password]\n", FILE_APPEND);

// Prepare and execute SQL query
$stmt = $mysqli->prepare("SELECT password_hash FROM hr_users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows === 1) {
    $stmt->bind_result($hash);
    $stmt->fetch();

    if (password_verify($password, $hash)) {
        // Successful login
        $_SESSION['username'] = $username;
        $_SESSION['department'] = 'hr';
        header("Location: hr_dashboard.php");
        exit();
    } else {
        // Wrong password
        header("Location: login_hr.php?error=invalid");
        exit();
    }
} else {
    // No such user
    header("Location: login_hr.php?error=notfound");
    exit();
}

$stmt->close();
$mysqli->close();
?>
