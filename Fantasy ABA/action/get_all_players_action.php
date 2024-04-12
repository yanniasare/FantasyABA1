<?php
// Include your database connection file
include '../settings/connection.php';

// Fetch player data from the database
$query = "SELECT player_name, position, purchase_salary FROM Player";
$result = mysqli_query($conn, $query);

$players = [];

if (mysqli_num_rows($result) > 0) {
    // Fetch each row of player data and add it to the players array
    while ($row = mysqli_fetch_assoc($result)) {
        $players[] = $row;
    }
}

// Encode the players array as JSON and output it
echo json_encode($players);
?>
