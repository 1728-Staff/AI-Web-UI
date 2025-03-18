<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userMessage = $_POST['message'];
    
    // Send request to Python backend
    $response = file_get_contents("http://localhost:5000/chat?message=" . urlencode($userMessage));
    
    echo json_encode(["response" => $response]);
}
?>
