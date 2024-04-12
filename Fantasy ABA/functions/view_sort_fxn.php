<?php
// include the connection file
require_once '../settings/connection.php';

// write a SELECT query on the "family_name" table
$sql = "SELECT team_id, team_name FROM aba_team";

// execute the query using the connection
$result = mysqli_query($conn, $sql);

// check if execution worked
if (!$result) {
  die("Query failed: " . mysqli_error($conn));
}

// fetch the results
$teams = [];
while ($row = mysqli_fetch_assoc($result)) {
  $teams[] = $row;
}

// build the family role dropdown on the register_view page
$dropdown = '<select name="teams">';
foreach ($teams as $team) {
  $dropdown .= '<option value="' . $team['team_id'] . '">' . $team['team_name'] . '</option>';
}
$dropdown .= '</select>';