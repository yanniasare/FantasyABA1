<?php
// Start the session
session_start();

// Include database connection settings
include '../settings/connection.php';
// Retrieve the raw POST data
$jsonData = file_get_contents('php://input');
// Decode the JSON data into a PHP associative array
$data = json_decode($jsonData, true);

// Check if user is logged in and get their ID
if (!isset($_SESSION['user_id'])) {
    // Handle the case where the user is not logged in
    exit("User is not logged in."); // Adjust as needed
}

$user_id = $_SESSION['user_id']; // Example session variable, adjust as needed

// Extract selected player data from POST request
if (isset($data['selected_players'])) {
    $selected_players = $data['selected_players'];
}

// Check if selected_players is empty
if (empty($selected_players)) {
    exit("No selected players data received."); // Adjust as needed
}

// Use prepared statement to insert each selected player into the database
try {
    $stmt = $conn->prepare("INSERT INTO user_selections (user_id, player_name, position, purchase_salary) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $user_id, $player_name, $position, $purchase_salary);
    
    foreach ($selected_players as $player) {
        $player_name = $player['player_name'];
        $position = $player['position'];
        $purchase_salary = $player['purchase_salary'];
        
        // Execute the prepared statement for each player
        $stmt->execute();
    }
    
    // Close the statement
    $stmt->close();
    
    echo "Selection saved successfully!";

} catch (Exception $e) {
    // Handle database errors
    
    exit("Error saving selection: " . $e->getMessage()); // Adjust as needed
}
?>
