<?php
include '../settings/connection.php';


// SQL query to select all players from the database
$sql = "SELECT player_name, position, purchase_salary FROM player";
$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
    // Array to store player data
    $players = array();

    // Fetch data from each row and add it to the players array
    while ($row = $result->fetch_assoc()) {
        $players[] = $row;
    }

    // Encode the players array as JSON and output it
    echo json_encode($players);
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Fantasy Basketball League - Squad Selection</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    .container {
        max-width: 800px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .players-container {
        margin-top: 20px;
    }

    h1, h2 {
        color: #333;
    }

    ul {
        list-style: none;
        padding: 0;
    }

    li {
        margin-bottom: 10px;
        cursor: pointer;
    }

    button {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }

    #error-message {
        color: #ff0000;
    }

    /* Added CSS */
    .selected {
        background-color: #e6e6e6;
    }
</style>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const playerList = document.getElementById("player-list");
    const selectedPlayerContainer = document.getElementById("selected-players");
    const totalCostDisplay = document.getElementById("total-cost");
    const submitButton = document.getElementById("submit-btn");
    const errorMessage = document.getElementById("error-message");

        let totalCost = 0;
        let selectedPlayers = [];

        // Function to update total cost display
        function updateTotalCost() {
            totalCostDisplay.textContent = totalCost;
        }

        function selectPlayer(player) {
        const playerIndex = selectedPlayers.findIndex(p => p.player_name === player.player_name);
        if (playerIndex === -1) {
            selectedPlayers.push(player);
            totalCost += player.purchase_salary;
            updateTotalCost();
            renderSelectedPlayers();
            errorMessage.textContent = "";
        }
        }

        function renderSelectedPlayers() {
    // Clear previous selection
    selectedPlayerContainer.innerHTML = "";

    // Render selected players in the separate container
    selectedPlayers.forEach(player => {
        const li = document.createElement("li");
        li.textContent = `${player.player_name} - ${player.position} - $${player.purchase_salary}`;

        // Add a button for deselecting the player
        const deselectButton = document.createElement("button");
        deselectButton.textContent = "Remove";
        deselectButton.addEventListener("click", () => deselectPlayer(player));
        li.appendChild(deselectButton);

        selectedPlayerContainer.appendChild(li);
    });
}

        // Function to handle squad submission
        submitButton.addEventListener("click", () => {
            if (!checkSelectedPlayers()) {
                return;
            }

            // Here you can send the selectedPlayers array to your backend for further processing
            console.log("Selected Players:", selectedPlayers);
            errorMessage.textContent = "Squad submitted successfully!";
        });

        const players = [
            { player_name: "Player 1", position: "Back Court", purchase_salary: 8 },
            { player_name: "Player 2", position: "Front Court", purchase_salary: 6 },
            // Add more player objects here...
            { player_name: "Player 3", position: "Back Court", purchase_salary: 7 },
            { player_name: "Player 4", position: "Front Court", purchase_salary: 9 },
            { player_name: "Player 5", position: "Back Court", purchase_salary: 10 },
            { player_name: "Player 6", position: "Front Court", purchase_salary: 8 },
            { player_name: "Player 7", position: "Back Court", purchase_salary: 6 },
            { player_name: "Player 8", position: "Front Court", purchase_salary: 7 },
            { player_name: "Player 9", position: "Back Court", purchase_salary: 9 },
            { player_name: "Player 10", position: "Front Court", purchase_salary: 8 },
            { player_name: "Player 11", position: "Back Court", purchase_salary: 7 },
            { player_name: "Player 12", position: "Front Court", purchase_salary: 6 },
            { player_name: "Player 13", position: "Back Court", purchase_salary: 8 },
            { player_name: "Player 14", position: "Front Court", purchase_salary: 7 },
            { player_name: "Player 15", position: "Back Court", purchase_salary: 9 },
        ];

        function renderPlayerList() {
            playerList.innerHTML = "";
            players.forEach(player => {
                const li = document.createElement("li");
                li.textContent = `${player.player_name} - ${player.position} - $${player.purchase_salary}`;
                li.addEventListener("click", () => selectPlayer(player));
                playerList.appendChild(li);
            });
        }

        renderPlayerList();
    

                // Function to deselect a player
                
    });

</script>
</head>
<body>
<div class="container">
    <h1>Fantasy Basketball League - Squad Selection</h1>
    <div class="players-container">
        <!-- Player selection section -->
        <h2>Select Your Squad</h2>
        <ul id="player-list">
            <!-- Player items will be dynamically added here -->
        </ul>
    </div>
    <div class="selected-players-container">
        <!-- Selected players section -->
        <h2>Selected Players</h2>
        <ul id="selected-players">
            <!-- Selected player items will be dynamically added here -->
        </ul>
    </div>
    <p>Total Cost: <span id="total-cost">0</span></p>
    <button id="submit-btn">Submit Squad</button>
    <p id="error-message"></p>
</div>

</body>
</html>
