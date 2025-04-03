<?php
session_start();

// Connect to MySQL
$mysqli = new mysqli("localhost", "synapse_user", "StrongPassword123!", "synapse_auth");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Sanitize user input
$username = trim($_POST['username']);
$password = trim($_POST['password']);

file_put_contents("login_debug.log", "Username: [$username] | Password: [$password]\n", FILE_APPEND);

// Prepare and execute SQL query
$stmt = $mysqli->prepare("SELECT password_hash FROM accounting_users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows === 1) {
    $stmt->bind_result($hash);
    $stmt->fetch();

    if (password_verify($password, $hash)) {
        // Successful login
        $_SESSION['username'] = $username;
        $_SESSION['department'] = 'accounting';
        header("Location: accounting_dashboard.php");
        exit();
    } else {
        // Wrong password
        header("Location: login_accounting.php?error=invalid");
        exit();
    }
} else {
    // No such user
    header("Location: login_accounting.php?error=notfound");
    exit();
}

$stmt->close();
$mysqli->close();
?>
