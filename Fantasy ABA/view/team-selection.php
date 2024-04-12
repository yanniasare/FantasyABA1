<?php
include '../settings/connection.php';
session_start();


// Start session
/*session_start();

// Check if registration completed session variable is set
if(isset($_SESSION['registration_completed']) && $_SESSION['registration_completed'] === true) {
    // Display roster selection page
    // Add your HTML and PHP code for the roster selection page here
*/
$selectedBackCourtPlayers = [];
$selectedFrontCourtPlayers = [];

if (!isset($_SESSION['user_team'])) {
    $_SESSION['user_team'] = [];
}

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
<script src="../js/script.js"></script>
    <header>
        <div class="topnav">
            <h1>Fantasy</h1>
            <div class="links">
                <a href="home.php">
                    <button>Home</button>
                </a>
                <a href="team-selection.php">
                    <button class="active">Roster Selection</button>
                </a>
                <a href="../view/logged-in-help.php">
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
                    <h2>Roster Selection</h2>
                    <p>Select a maximum of 2 players from a single team or 'Auto Pick' if you're short of time.</p>
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
                        <!-- Selected players will be dynamically added here -->
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

<?php
/*} else {
    // Redirect user to another page
    header('Location: myteam.php');
    exit(); // Stop further execution to prevent the rest of the page from being processed
}
?>*/