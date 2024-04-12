<?php
// Include the file that contains the function to get team selection
require_once '../action/get-team-selection.php';

// Execute the function to get the selected players
$selected_players = get_team_selection();

// Example: Mark the first two players as starting lineup and the rest as bench
$starting_lineup_count = 5; // Change this according to your requirements
foreach ($selected_players as $key => $player) {
    $selected_players[$key]['is_starting_lineup'] = ($key < $starting_lineup_count);
}

function display_player_selection_table($selected_players) {
    // Check if there are selected players to display
    if (!empty($selected_players)) {
        // Start building the form
        echo '<form id="lineup-form" action="submit-lineup.php" method="post">';
        echo '<table>';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Player Name</th>';
        echo '<th>Position</th>';
        echo '<th>Salary</th>';
        echo '<th>Status</th>'; // Change "Starting Lineup" to "Status"
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        // Loop through each selected player and display them in a table row
        foreach ($selected_players as $player) {
            // Determine the CSS class based on the player's status
            $status_class = $player['is_starting_lineup'] ? 'starting-lineup' : 'bench';
            // Output the player row with onclick attribute to call the substitutePlayer function
            echo '<tr id="player-' . $player['id'] . '" class="player-row ' . $status_class . '" onclick="substitutePlayer(' . $player['id'] . ')">';
            echo '<td>' . $player["player_name"] . '</td>';
            echo '<td>' . $player["position"] . '</td>';
            echo '<td>' . $player["purchase_salary"] . '</td>';
            // Display the status (Starting Lineup or Bench)
            echo '<td>' . ($player["is_starting_lineup"] ? "Starting Lineup" : "Bench") . '</td>';
            echo '</tr>';
        }

        // Close the table body and table tags
        echo '</tbody>';
        echo '</table>';
        echo '<button type="submit">Save Your Team</button>'; // Add a submit button for the form
        echo '</form>';
    } else {
        // If there are no selected players, display a message
        echo '<p>No players selected yet.</p>';
    }
}

// Call the function to display the selected players table
display_player_selection_table($selected_players);
?>
