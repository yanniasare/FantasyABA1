<?php
include '../settings/connection.php';
session_start();

// Check if the team name is already set for the user
if (isset($_SESSION['team_name']) && !empty($_SESSION['team_name'])) {
    // Redirect user to myteam.php
    header('Location: myteam.php');
    exit(); // Stop further execution to prevent the rest of the page from being processed
}

// Continue displaying the form for updating team details
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fantasy ABA, The Official Fantasy Basketball Game of the Ashesi Basketball League</title>
    <link rel="stylesheet" href="../css/style.css">

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
                <a href="myteam.php">
                    <button>Edit Line-up</button>
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
                <div class="rules-container">
                    <h1>MY TEAM</h1>
                    <form action="../action/update_team_details_action.php" method="post" class="form-container">
                    <h2>Team Details</h2>
                    <div class="team-name">
                        <Label>Team Name</Label><br>
                        <p>Maximum 20 Characters</p>
                            <input class="form-input" type="text" placeholder="Team Name" id="team_name" name="team_name" required>
                        
                        <p>Please think carefully before entering your team name. Teams with names that are deemed inappropriate 
                            or offensive may result in your account being deleted. Please refer to the Terms & Conditions of entry
                            for more information.</p>

                    </div>
                    <h2>Favorite Team</h2>
                    <div class="fav-team">
                        <select class="form-select" name="favorite_team" id="favorite_team">
                            <option value="" disabled selected>Favorite Team</option>
                            <option value="AshKnights">AshKnights</option>
                            <option value="Longshots">Longshots</option>
                            <option value="Hillblazers">Hillblazers</option>
                            <option value="Berekuso Warriors">Berekuso Warriors</option>
                            <option value="Los Ashtros">Los Ashtros</option>
                    </select>

                    </div>

                    <button class="btn-submit" type="submit" name="submit">Save Details</button>
                    </form>
                </div>
            </div>

        </div>

    </main>
    <footer>
        <p>©2024 Yanni Asare, LLC. All rights reserved.</p>
    </footer>
</body>
</html>
