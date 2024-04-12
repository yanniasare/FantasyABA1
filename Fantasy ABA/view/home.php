<?php
// Start session
session_start();

// Check if registration completed session variable is set
if(isset($_SESSION['registration_completed']) && $_SESSION['registration_completed'] === true) {
    // Display roster selection page
    // Add your HTML and PHP code for the roster selection page here
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
    </script>
</head>
<body>
    <header>
        <div class="topnav">
            <h1>Fantasy</h1>
            <div class="links">
                <a href="home.php">
                    <button class="active">Home</button>
                </a>
                <a href="team-selection.php">
                    <button>Roster Selection</button>
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

            <div class="container" id="home">
                <div class="box">
                    <img src="../images/build-roster.png">
                    <div class="text">
                        <h2>Pick Your Roster</h2>
                        <p>Pick your 10-player ABA roster using your $100m budget.</p>
                        <a href="team-selection.php">
                    <button>Roster</button>
                </a>
                    </div>
                </div>
    
                <div class="box">
                    <img>
                    <div class="text">
                        <h2>Create and Join Leagues</h2>
                        <p>Play against friends , colleagues or a web community in invitational leagues and cups.</p>
                        <a href="leagues.php">
                    <button>Leagues</button>
                </a>
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
} else {
    // Redirect user to another page
    header('Location: myteam-home.php');
    exit(); // Stop further execution to prevent the rest of the page from being processed
}
?>