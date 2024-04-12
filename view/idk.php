<?php
include '../settings/connection.php';
require_once '../functions/player_fxn.php';

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
    <link rel="stylesheet" href="../css/style.css">
    <script> 
        function togglePopup() { 
            const overlay = document.getElementById('popupOverlay'); 
            overlay.classList.toggle('show'); 
        }
        function toggleRegister() { 
            const overlay = document.getElementById('registerOverlay'); 
            overlay.classList.toggle('show'); 
        }  
        function sortTable() {
  // Get the selected filter value
  const filterSelect = document.getElementById("filter");
  const filterValue = filterSelect.value;

  // Get the table element
  const table = document.getElementById("players_list");

  // Get the table rows and filter them based on the selected filter value
  const rows = Array.from(table.rows).slice(1)
    .filter(row => {
      const playerPosition = row.dataset.playerPosition;
      const playerTeam = row.dataset.playerTeam;

      if (filterValue === "all") {
        return true;
      } else if (et_1 && et_1 === filterValue) {
        return true;
      } else if (et_2 && et_2 === filterValue) {
        return true;
      } else {
        return false;
      }
    });

  // Sort the filtered rows based on the selected sort value
  rows.sort(function(a, b) {
    const aValue = a.cells[1].innerText;
    const bValue = b.cells[1].innerText;

    // Parse the salary value as a float
    const aSalary = parseFloat(aValue.replace("$", ""));
    const bSalary = parseFloat(bValue.replace("$", ""));

    // Compare the salary values based on the selected value
    if (selectedValue === "salary-asc") {
      return aSalary - bSalary;
    } else if (selectedValue === "salary-desc") {
      return bSalary - aSalary;
    } else if (selectedValue === "name-asc") {
      return aValue.localeCompare(bValue);
    } else if (selectedValue === "name-desc") {
      return bValue.localeCompare(aValue);
    }
  });

  // Remove the existing table rows and add the sorted rows
  table.innerHTML = "";
  table.appendChild(table.rows[0]);
  rows.forEach(function(row) {
    table.appendChild(row);
  });
}

  const playersList = document.getElementById("players_list");
  playersList.addEventListener("click", (event) => {
    const row = event.target.closest("tr");
    if (row) {
      const playerId = row.dataset.playerId;
      const playerPosition = row.dataset.playerPosition;
      const playerName = row.dataset.playerName;
      const salary = row.dataset.playerSalary;

      if (row.classList.contains("selected")) {
        // Remove the player from the selected players array
        if (playerPosition === "back court") {
          const index = selectedBackCourtPlayers.indexOf(playerId);
          selectedBackCourtPlayers.splice(index, 1);
        } else if (playerPosition === "front court") {
          const index = selectedFrontCourtPlayers.indexOf(playerId);
          selectedFrontCourtPlayers.splice(index, 1);
        }
      } else {
        // Add the player to the selected players array
        if (playerPosition === "back court") {
          if (selectedBackCourtPlayers.length < 5) {
            selectedBackCourtPlayers.push(playerId);
          } else {
            alert("You have reached the maximum number of back court players.");
            return;
          }
        } else if (playerPosition === "front court") {
          if (selectedFrontCourtPlayers.length < 5) {
            selectedFrontCourtPlayers.push(playerId);
          } else {
            alert("You have reached the maximum number of front court players.");
            return;
          }
        }
      }

      // Toggle the player's selection
      row.classList.toggle("selected");

      // Update the roster table
      updateRosterTable(selectedBackCourtPlayers, selectedFrontCourtPlayers);
    }
  });

  const selectFrontCourtButton = document.getElementById("select-front-court");
selectFrontCourtButton.addEventListener("click", () => {
    event.preventDefault();
  // Update the filter variable to show only front court players
  const filterSelect = document.getElementById("filter");
  filterSelect.value = "et_2";

  // Call the sortTable() function to re-sort the table based on the new filter
  sortTable();
});
</script>
</head>
<body>
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
                        <div class="selection-counter">0 / 10</div>
                    </div>
                    <div class="card" id="money-remaining">
                        <Label for="money-remaining">Money Remaining</Label>
                        <div class="money-counter">100.0</div>
                    </div>   
                </div>
                <form action="../action/submit_roster.php" method="post">
                <div class="roster-info">
                <table class="roster-table">
    <thead id="front-court">
        <tr>
            <th><label>Front Court</label></th>
            <th>$</th>
            <th>VAL</th>
            <th>TP</th>
            <th>SCH</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $front_court_players = array_filter($_SESSION['user_team'], function($player) {
            return $player['position'] === 'Front Court';
        });

        foreach ($front_court_players as $player) {
            // write a SELECT query on the "players" table
            $sql = "SELECT * FROM player WHERE player_id = $player[id]";

            // execute the query using the connection
            $result = mysqli_query($conn, $sql);

            // check if execution worked
            if (!$result) {
                die("Query failed: " . mysqli_error($conn));
            }

            // fetch the results
            $player_data = mysqli_fetch_assoc($result);

            // display the player's data in a table row
            echo "<tr>";
            echo "<td><label>{$player_data['name']}</label></td>";
            echo "<td>{$player_data['salary']}</td>";
            echo "<td>{$player_data['value']}</td>";
            echo "<td>{$player_data['total_points']}</td>";
            echo "<td>{$player_data['schedule']}</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
    <thead id="back-court">
        <tr>
            <th><label>Back Court</label></th>
            <th>$</th>
            <th>VAL</th>
            <th>TP</th>
            <th>SCH</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $back_court_players = array_filter($_SESSION['user_team'], function($player) {
            return $player['position'] === 'Back Court';
        });

        foreach ($back_court_players as $player) {
            // write a SELECT query on the "players" table
            $sql = "SELECT * FROM player WHERE player_id = $player[id]";

            // execute the query using the connection
            $result = mysqli_query($conn, $sql);

            // check if execution worked
            if (!$result) {
                die("Query failed: " . mysqli_error($conn));
            }

            // fetch the results
            $player_data = mysqli_fetch_assoc($result);

            // display the player's data in a table row
            echo "<tr>";
            echo "<td><label>{$player_data['name']}</label></td>";
            echo "<td>{$player_data['salary']}</td>";
            echo "<td>{$player_data['value']}</td>";
            echo "<td>{$player_data['total_points']}</td>";
            echo "<td>{$player_data['schedule']}</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
                    <button type="submit">Submit Roster</button>
                </div>
                </form>
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
                            <select id="sort" class="drop-selector" onchange="sortTable()">
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
                            <input type="search" id="search" name="search" class="search-box" value>

                        </div>
                    </div>

                    <div class="player-table">
                    <h2>Players</h2>
                    <?php 
                        display_player_table();
                        
                    ?>
                    </div>

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