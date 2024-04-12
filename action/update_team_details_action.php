<?php
// Include the database connection file
include '../settings/connection.php';

// Start the session
session_start();

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get the user ID from the session
    if (!isset($_SESSION['user_id'])) {
        // Handle the case where the user is not logged in
        echo "User is not logged in.";
        exit();
    }
    
    $user_id = $_SESSION['user_id'];

    // Collect form data and assign each to a variable
    $tName = $_POST['team_name'];
    $favorite_team = $_POST['favorite_team'];

    // Check if the team name already exists for the current user
    $check_sql = "SELECT * FROM team WHERE team_name = ? AND user_id = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param('si', $tName, $user_id);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        // Team name already exists for the current user
        echo "Team name already exists. Please choose a different name.";
        exit();
    }

    // Insert the team name into the database
    $sql = "INSERT INTO team (user_id, team_name, favorite_team) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('iss', $user_id, $tName, $favorite_team);
    $result = $stmt->execute();

    // Check for errors
    if ($stmt->errno) {
        echo "Error: " . $stmt->error;
        exit();
    }

    // If the query is successful
    if ($result) {
        // Display a success message
        echo '<script> window.alert("Team Details updated.");</script>';
        
        // Redirect the user to the my-team.php page
        header("Location: ../view/myteam.php");
        exit();
    } else {
        // Display an error message if the query fails
        echo "Query failed: " . $stmt->error;
        exit();
    }
}
?>
