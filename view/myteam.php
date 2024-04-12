<?php
include '../settings/connection.php';
session_start();

// Fetch the user's team and selected players from the database
// Replace 'user_id' with the actual column name in your 'user-selection' table
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM user_selections WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Check if the user has any selections
if ($result->num_rows > 0) {
    // Fetch and display the user's team information and selected players
    while ($row = $result->fetch_assoc()) {
        // Display the user's team information
        
        // Display the selected players and allow the user to set the starting lineup
        // You can use HTML forms and JavaScript to implement this part
    }
} else {
    // Redirect the user to 'team-selection.php' if no selections are found
    header("Location: team-selection.php");
    exit(); // Ensure that no further code is executed after the redirect
}

$stmt->close();
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fantasy ABA, The Official Fantasy Basketball Game of the Ashesi Basketball League</title>
    <link rel="stylesheet" href="../css/team-select.css">
    
</head>
<body>
    <header>
        
        <div class="topnav">
            <h1>Fantasy</h1>
            
            <div class="links">
                <a href="home.php">
                    <button>Home</button>
                </a>
                <a href="edit-lineup.php">
                    <button class="active">Edit Line-up</button>
                </a>
                <a href="transfers.php">
                    <button>Transfers</button>
                </a>
                <a href="leagues.php">
                    <button>Leagues</button>
                </a>
                <a href="schedule.php">
                    <button>Schedule</button>
                </a>
                <a href="statistics.php">
                    <button>Statistics</button>
                </a>
                <a href="logged-in-help.php">
                    <button>Help</button>
                </a>
                <a href="../action/sign_out_action.php">
                    <button>Sign Out</button>
                </a>
            </div>
        </div>
    </header>

    <main>
        <div class="mid-section">
            <div class="container" id="roster-container">
                <div class="text-container">
                    <h2>PICK TEAM</h2>
                    <p>Only your starting 5 players will score points. Move players with a fixture into the starting 5.
                        If your starter doesn't play, automatic substitutions will be made in the priority order selected below.
                        To change your captain use the menu which appears when clicking on a player.</p>
                </div>
                <div class="deadline">
                    <h2>GAMEWEEK 1 DEADLINE: </h2>
                    <p>APRIL 10, 2024</p>
                </div>
                <div class=info>
                    <div class="card" id="quick">
                        <button id="auto-pick">Auto Pick</button>
                        <button id="reset">Reset</button>
                    </div>
                    <div class="card" id="players-selected">
                        <Label for="players-selected">Players Selected</Label>
                        <div class="selection-counter" id="selection-counter">0 / 10</div>
                    </div>
                    <div class="card" id="money-remaining">
                        <Label for="money-remaining">Money Remaining</Label>
                        <div class="money-counter"><span id="money-counter">100</span></div>
                        
                    </div>
                      
                </div>
                <div class="roster-info">
    <h2>Selected Players</h2>
    <ul id="selected-players" class="selected-players">
        <?php
        // Loop through each selected player fetched from the database
        while ($row = $result->fetch_assoc()) {
            // Output a list item for each selected player
            echo "<li>{$row['player_name']} - {$row['position']} - ${$row['purchase_salary']}</li>";
        }
        ?>
    </ul>
    <button type="submit" id="submit-btn">Submit Roster</button>
</div>


                <div class="schedule">
                    <div class="schedule-header">
                        <h5>Schedule</h5>
                    </div>
                </div>
            </div>

            <div class="container" id="player-container">
                <h2>Player Selection</h2>
                <div class="form-select">
                    <label for="filter" class="epKLNk">
                        <span>View:</span>
                    </label>
                    <div class="filter-selector-box">
                        <div class="jbDNgh">
                            <select id="filter" class="drop-selector">
                                <optgroup label="Global">
                                    <option value="all" aria-selected="true">All players</option>
                                </optgroup>
                                <optgroup label="By position">
                                    <option value="et_1" aria-selected="false">Back Court</option>
                                    <option value="et_2" aria-selected="false">Front Court</option>
                                </optgroup>
                                <optgroup label="By team">
                                    <option value="te_1" aria-selected="false">AshKnights</option>
                                    <option value="te_2" aria-selected="false">Berekuso Warriors</option>
                                    <option value="te_3" aria-selected="false">HillBlazers</option>
                                    <option value="te_4" aria-selected="false">Longshots</option>
                                    <option value="te_5" aria-selected="false">Los Ashtros</option>
                                </optgroup>
                            </select>
                        </div>
                        
                    </div>
                    
                    <label for="sort" class="epKLNk">
                        <span>Sorted By:</span>
                    </label>
                    <div class="filter-selector-box">
                        <div class="jbDNgh">
                            <select id="sort" class="drop-selector">
                                <option value="total_fantasy_pts" aria-selected="true">Total Fantasy Points</option>
                                <option value="gameday_fantasy_pts" aria-selected="false">Gameday Fantasy Points</option>
                                <option value="salary" aria-selected="false">Salary</option>
                                <option value="select_perc" aria-selected="false">Team Selected By %</option>
                                <option value="min_played" aria-selected="false">Minutes PLayed</option>
                                <option value="pts_scored" aria-selected="false">Points Scored</option>
                                <option value="rebounds" aria-selected="false">Rebounds</option>
                                <option value="assists" aria-selected="false">Assists</option>
                                <option value="blocks" aria-selected="false">Blocks</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <label for="search-player" class="epKLNk">
                        <span>Search Player List:</span>
                    </label>
                    <div class="filter-selector-box">
                        <div class="jbDNgh">
                            <input type="text" id="search-input" name="search" class="search-box" value>
                            <button id="search-btn">Search</button>
                        </div>

                    </div>

                </div>
                <div class="pick-players">
                    <div id="error-message"></div>
                    <h2>Pick Players</h2>
                    <table id="player-list">
                        <thead>
                            <tr>
                                <th>Player Name</th>
                                <th>Position</th>
                                <th>Salary</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Player rows will be dynamically added here -->
                        </tbody>
                    </table>
                    
                </div>
            </div>

        </div>

    </main>
    <footer>
        <p>©2024 Yanni Asare, LLC. All rights reserved.</p>
    </footer>
</body>
</html>