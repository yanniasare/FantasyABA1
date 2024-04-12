<?php

// include the get all chores action
require_once '../action/get_all_players_action.php';

// execute / call / run the function created in the get_all_chores_action file and assign the output to a variable
$var_data = get_all_players();

function display_player_table() {
    global $var_data;

    // Create an associative array to group players by position
    $grouped_players = [];
    foreach ($var_data as $player) {
        if (isset($player['position'])) {
            $position = strtolower($player['position']);
            if (!isset($grouped_players[$position])) {
                $grouped_players[$position] = [];
            }
            $grouped_players[$position][] = $player;
        }
    }

    // Display the front court players

    if (isset($grouped_players['front court'])) {
        // Display the front court players
        echo '<table>';
    echo '<thead>';
    echo '<tr>';
    echo '<th>FRONT COURT</th>';
    echo '<th>Team</th>';
    echo '<th>$</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody id="players_list">';

    foreach ($grouped_players['front court'] as $player) {
        echo '<tr data-player-id="' . $player['player_id'] . '" data-player-position="' . strtolower($player['position']) . '" data-player-team="' . $player['team_name'] . '">';
echo '<td>' . $player["player_name"] . '</td>';
echo '<td>' . $player["team_name"] . '</td>';
echo '<td>' . $player["purchase_salary"] . '</td>';
echo '<td><a href="../action/add_player.php?player_id=' . $player["player_id"] . '">
<button id="select-player-btn">Select</button><a></td>';
echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    }

    // Display the back court players
    if (isset($grouped_players['back court'])) {
    echo '<table>';
    echo '<thead>';
    echo '<tr>';
    echo '<th>BACK COURT</th>';
    echo '<th>Team</th>';
    echo '<th>$</th>';
echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    foreach ($grouped_players['back court'] as $player) {
        echo '<tr data-player-id="' . $player['player_id'] . '" data-player-position="' . strtolower($player['position']) . '" data-player-team="' . $player['team_name'] . '">';
echo '<td>' . $player["player_name"] . '</td>';
echo '<td>' . $player["team_name"] . '</td>';
echo '<td>' . $player["purchase_salary"] . '</td>';
echo '<td><button id="select-player-btn">Select</button></td>';
echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
}
}



// Update the roster table
function update_roster_table($selectedBackCourtPlayers, $selectedFrontCourtPlayers) {
    // Display the roster table here
  }