<?php
session_start();
require_once '../settings/connection.php';

if (!isset($_SESSION['user_team'])) {
    $_SESSION['user_team'] = [];
}

if (!isset($_SESSION['total_salary'])) {
    $_SESSION['total_salary'] = 100;
}

if (!isset($_GET['player_id'])) {
    header('Location: ../view/team-selection.php');
    exit;
}

$player_id = $_GET['player_id'];

$sql = "SELECT * FROM player WHERE player_id = ?"; // Use prepared statement
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $player_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

$player = mysqli_fetch_assoc($result);

$player_position = $player['position'];
array_push($_SESSION['user_team'], ['id' => $player_id, 'position' => $player_position]);

define('MAX_FRONT_COURT', 5);
define('MAX_BACK_COURT', 5);

// Check if $_SESSION['user_team'] is an array before using array_filter
if (!is_array($_SESSION['user_team'])) {
  die('$_SESSION[\'user_team\'] is not an array.');
}

// Use array_filter only if $_SESSION['user_team'] is an array
$current_front_court = count(array_filter($_SESSION['user_team'], function($player) {
  // Ensure $player is an array before accessing its elements
  if (is_array($player)) {
      return $player['position'] === 'Front Court';
  }
  return false; // Return false if $player is not an array
}));

if (!is_array($_SESSION['user_team'])) {
  die('$_SESSION[\'user_team\'] is not an array.');
}

$current_back_court = count(array_filter($_SESSION['user_team'], function($player) {
  if (is_array($player)) {
    return $player['position'] === 'Back Court';
}
return false; // Return false if $player is not an array
}));

if (($player_position === 'Front Court' && $current_front_court >= MAX_FRONT_COURT) ||
    ($player_position === 'Back Court' && $current_back_court >= MAX_BACK_COURT)) {
    header('Location: roster.php?error=max_players_exceeded');
    exit;
}

// Check if $_SESSION['total_salary'] is a valid number
if (!is_numeric($_SESSION['total_salary'])) {
  die('total_salary is not a valid number.');
}

// Check if player salary is a valid number
if (!is_numeric($player['purchase_salary'])) {
  die('Player salary is not a valid number.');
}

// Update total salary by subtracting player's salary
$_SESSION['total_salary'] -= floatval($player['purchase_salary']);

$_SESSION['user_team'] = array_unique($_SESSION['user_team']);

header('Location: ../view/team-selection.php');
exit;

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
