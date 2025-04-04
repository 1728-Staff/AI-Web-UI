<?php
$mysqli = new mysqli("localhost", "synapse_user", "StrongPassword123!", "synapse_auth");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$result = $mysqli->query("SELECT username FROM accounting_users");

if ($result) {
    while ($row = $result->fetch_assoc()) {
        echo "Found user: " . htmlspecialchars($row['username']) . "<br>";
    }
} else {
    echo "Query failed: " . $mysqli->error;
}

$mysqli->close();
?>
