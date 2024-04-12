<?php
require_once '../settings/connection.php';

// write a SELECT query on the "players", "teams", and "positions" tables
$sql = "SELECT player.*, aba_team.team_name, position.position
        FROM player
        INNER JOIN ABA_team ON player.team_id = ABA_team.team_id
        INNER JOIN position ON player.position_id = position.position_id
        ORDER BY player.player_name ASC";

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

// display the list of players
echo '<table>';
echo '<tr><th>Player</th><th>Team</th><th>Position</th><th>Salary</th><th>Select</th></tr>';
foreach ($players as $player) {
  echo '<tr>';
  echo '<td>' . $player['player_name'] . '</td>';
  echo '<td>' . $player['team_name'] . '</td>';
  echo '<td>' . $player['position_name'] . '</td>';
  echo '<td>' . $player['salary'] . '</td>';
  echo '<td><a href="add_player.php?player_id=' . $player['player_id'] . '">Select</a></td>';
  echo '</tr>';
}
echo '</table>';

mysqli_close($conn);