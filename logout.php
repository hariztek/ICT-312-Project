<?php
// Start the session
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session cookie
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 3600, '/');
}

// Destroy the session
session_destroy();

// Set response header
header('Content-Type: application/json');

// Return success response
echo json_encode(['success' => true]);
?> 