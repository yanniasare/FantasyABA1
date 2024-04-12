document.addEventListener("DOMContentLoaded", function() {
    let selectedPlayers = []; // Change from const to let
    let totalCost = 0;
    const submitButton = document.getElementById("submit-btn");
    const errorMessage = document.getElementById("error-message");
    const searchInput = document.getElementById("search-input");
    const resetButton = document.getElementById("reset");

    // Event listener for the Reset button
    resetButton.addEventListener("click", resetSelectedPlayers);

    // Function to handle squad submission
    submitButton.addEventListener("click", () => {
        if (checkSelectedPlayers()) {
            // Here you can proceed with submitting the form or performing other actions
            errorMessage.textContent = "Squad submitted successfully!";
    
            // Send selected player data to backend endpoint
            fetch('../action/submit_roster.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ selected_players: selectedPlayers }),
            })
            .then(response => {
                if (response.ok) {
                    errorMessage.textContent = "Selection saved successfully!";
                    // Redirect to the profile setup page
                    window.location.href = "../view/myteam.php"; // Adjust the URL as needed
                } else {
                    console.error("Failed to save selection:", response.statusText);
                    errorMessage.textContent = "Failed to save selection. Please try again.";
                }
            })
            .catch(error => {
                console.error("Error saving selection:", error);
                errorMessage.textContent = "An error occurred while saving the selection.";
            });
        }
    });
    
    

    // Function to check if selected players meet the requirements
    function checkSelectedPlayers() {
        // Count the number of front court and back court players selected
        const frontCourtCount = selectedPlayers.filter(p => p.position === "Front Court").length;
        const backCourtCount = selectedPlayers.filter(p => p.position === "Back Court").length;
    
        // Check if there are 5 front court and 5 back court players selected
        if (frontCourtCount !== 5 || backCourtCount !== 5) {
            errorMessage.textContent = "You must select 5 front court and 5 back court players.";
            return false;
        }
    
        // Check if the total cost exceeds 100
        if (totalCost > 100) {
            errorMessage.textContent = "Total cost exceeds the limit of $100.";
            return false;
        }
    
        // If all checks pass, return true
        return true;
    }

    // Event listener for the search button
    const searchBtn = document.getElementById("search-btn");
    searchBtn.addEventListener("click", () => {
        const searchTerm = searchInput.value.toLowerCase();
        const filteredPlayers = players.filter(player => player.player_name.toLowerCase().includes(searchTerm));
        renderPlayerList(filteredPlayers);
    });

    // Event listener for input changes in search input
    searchInput.addEventListener("input", () => {
        searchBtn.click();
    });

    // Function to render the player list
    function renderPlayerList(players) {
        const tbody = document.querySelector("#player-list tbody");
        tbody.innerHTML = ""; // Clear previous content

        players.forEach(player => {
            const tr = document.createElement("tr");
            tr.innerHTML = `
                <td>${player.player_name}</td>
                <td>${player.position}</td>
                <td>$${player.purchase_salary}</td>
            `;
            tr.addEventListener("click", () => selectPlayer(player)); // Attach event listener here
            tbody.appendChild(tr);
        });
    }

    // Fetch player data from the database using AJAX
    let players = []; // Declare players variable outside fetch request
    fetch('../action/get_all_players_action.php')
        .then(response => response.json())
        .then(data => {
            // Assign the retrieved player data to the players variable
            players = data;

            // Call the renderPlayerList function with the retrieved player data
            renderPlayerList(players);

            // You can also perform any other actions that depend on the player data here
            // For example, updating UI elements or initializing other parts of your application
        })
        .catch(error => console.error('Error fetching player data:', error));

    // Function to select a player
    function selectPlayer(player) {
        // Check if the player is already selected
        if (selectedPlayers.some(p => p.player_name === player.player_name)) {
            errorMessage.textContent = "You have already selected this player.";
            return;
        }

        // Check if adding the player exceeds the total cost limit
        if (totalCost + player.purchase_salary > 100) {
            errorMessage.textContent = "Total cost exceeds the limit of $100.";
            return;
        }

        // Count the number of front court and back court players already selected
        const frontCourtCount = selectedPlayers.filter(p => p.position === "Front Court").length;
        const backCourtCount = selectedPlayers.filter(p => p.position === "Back Court").length;

        // Check if adding the player exceeds the limit for front court or back court players
        if (player.position === "Front Court" && frontCourtCount >= 5) {
            errorMessage.textContent = "You've already selected the maximum of 5 Front Court players.";
            return;
        }
        if (player.position === "Back Court" && backCourtCount >= 5) {
            errorMessage.textContent = "You've already selected the maximum of 5 Back Court players.";
            return;
        }

        // If all checks pass, add the player to the selectedPlayers array
        selectedPlayers.push(player);
        totalCost += player.purchase_salary;
        updateTotalCost();
        renderSelectedPlayers();
        errorMessage.textContent = ""; // Clear any previous error message
    }

    // Function to update total cost display
    function updateTotalCost() {
        const totalCostDisplay = document.getElementById("money-remaining");
        totalCostDisplay.textContent = totalCost;
    }

    // Function to reset selected players
    function resetSelectedPlayers() {
        // Clear the selected players array
        selectedPlayers = [];

        // Reset the total cost
        totalCost = 0;
        updateTotalCost();

        // Render the selected players list
        renderSelectedPlayers();
    }

    // Function to render selected players
    function renderSelectedPlayers() {
        const selectedPlayerContainer = document.getElementById("selected-players");

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

        const selectedCount = document.getElementById("selection-counter");
        selectedCount.textContent = `${selectedPlayers.length} / 10`;
    }

    // Function to deselect a player
    function deselectPlayer(player) {
        const playerIndex = selectedPlayers.findIndex(p => p.player_name === player.player_name);
        if (playerIndex !== -1) {
            // Remove the deselected player from the selectedPlayers array
            const deselectedPlayer = selectedPlayers.splice(playerIndex, 1)[0];

            // Update the total cost
            totalCost -= deselectedPlayer.purchase_salary;
            updateTotalCost();
            renderSelectedPlayers();
        }
    }
});
