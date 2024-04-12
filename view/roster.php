<?php
session_start();
require_once '../settings/connection.php';

// check if the user is logged in
if (!isset($_SESSION['user_id'])) {
  header('Location: login.php');
  exit;
}

// get the user's team and total team salary from the session
$user_team = $_SESSION['user_team'];
$total_salary = $_SESSION['total_salary'];

// write a SELECT query on the "players" table
$sql = "SELECT * FROM players WHERE team_id = $user_team";

// execute the query using the connection
$result = mysqli_query($conn, $sql);

// check if execution worked
if (!$result) {
  die("Query failed: " . mysqli_error($conn));
}

// fetch the results
$players = [];
while ($row = mysqli_fetch_assoc($result)) {
  $players[] = $row;
}

// display the user's current roster
echo '<table>';
echo '<tr><th>Player</th><th>Team</th><th>Position</th><th>Salary</th></tr>';
foreach ($players as $player) {
  echo '<tr>';
  echo '<td>' . $player['player_name'] . '</td>';
  echo '<td>' . $player['team_name'] . '</td>';
  echo '<td>' . $player['position_name'] . '</td>';
  echo '<td>' . $player['salary'] . '</td>';
  echo '</tr>';
}
echo '</table>';

// check if the user has exceeded the maximum number of players allowed on their team
if (count($players) >= 10) {
  echo '<p>Error: You have reached the maximum number of players allowed on your team.</p>';
} else {
  echo '<a href="player_list.php">Add Player</a>';
}

mysqli_close($conn);