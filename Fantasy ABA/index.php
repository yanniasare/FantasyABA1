<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fantasy ABA, The Official Fantasy Basketball Game of the Ashesi Basketball League</title>
    <link rel="stylesheet" href="css/index.css">
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
                <a href="#home">
                    <button class="active">Home</button>
                </a>
                <a href="view/help.php">
                    <button>Help</button>
                </a>
                <a href="#stats">
                    <button>Stats</button>
                </a>
            </div>
        </div>
    </header>

    <main>
        <div class="mid-section">
            <div class="container">
                <div class="container-outline">
                    <div class="text-container">
                        <h2>PLAY ABA FANTASY</h2>
                        <p>Create your account or sign in with your Ashesi Email to play the ABA Fantasy game. Create a league and invite your friends to see who will win.</p>
                    </div>

                    <div class="login-container">
                        <button href="#login" onclick="togglePopup()">Sign In</button>
                        <div id="popupOverlay" class="overlay-container"> 
                            <div class="popup-box">
                                <div class="pop-up-header">
                                    <p>LOG IN WITH YOUR ASHESI EMAIL</p>
                                    <a class="close" onclick="togglePopup()">×</a>
                                </div>
                    
                               <form action="action/login_user_action.php" method="post" class="form-container"> 
                                   <input class="form-input" type="email" placeholder="Email Address" id="email" name="email" required> 
                     
                                   <input class="form-input" type="password" placeholder="Password" id="password" name="password" required> 
                                   <button class="btn-submit" type="submit" name="submit">Submit</button>
                               </form>

                                <div class="bottom">
                                    <a href="forgot-password.php">Forgot Password</a> 
                                    <a href="register.php">Don't have an account?</a>
                                </div>
                           </div> 
                       </div> 

                        <a href="forgot-password.php">Forgot Password</a>
                        <button onclick="toggleRegister()">Register</button>

                        <div id="registerOverlay" class="overlay-container"> 
                            <div class="popup-box">
                                <div class="pop-up-header">
                                    <p>CREATE AN ACCOUNT</p>
                                    <a class="close" onclick="toggleRegister()">×</a>
                            </div>
                           
                            <form action="action/register_user_action.php" method="post" class="form-container">
                                <input class="form-input" type="text" placeholder="First Name" id="fname" name="fname" required>
                                
                                <input class="form-input" type="text" placeholder="Last Name" id="lname" name="lname" required>
                                        
                                <input class="form-input" type="email" placeholder="Email Address" id="email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"> 
                    
                                <input class="form-input" type="password" placeholder="Password" id="password" name="password" required>
                                
                                
                                <input class="form-input" type="password" placeholder="Confirm your password" id="retypePassword" name="retypePassword" required>
                               

                                      <select class="form-select" name="favorite_team" id="favorite_team">
                                        <option value="" disabled selected>Favorite Team</option>
                                        <option value="AshKnights">AshKnights</option>
                                        <option value="Longshots">Longshots</option>
                                        <option value="Hillblazers">Hillblazers</option>
                                        <option value="Berekuso Warriors">Berekuso Warriors</option>
                                        <option value="Los Ashtros">Los Ashtros</option>
                                      </select>

                                      <select class="form-select" name="course_offered" id="course_offered">
                                        <option value="" disabled selected>Course</option>
                                        <option value="business">Business Administration</option>
                                        <option value="mis">MIS</option>
                                        <option value="compsci">Computer Science</option>
                                        <option value="engineering">Engineering</option>
                                        <option value="econs">Economics</option>
                                      </select>
                               <button class="btn-submit" 
                                       type="submit" name="submit">Submit</button>

                           </form>
                       </div> 
                   </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="box">
                    <img src="images/build-roster.png">
                    <div class="text">
                        <h2>Pick Your Roster</h2>
                        <p>Pick your 10-player ABA roster using your $100m budget.</p>
                    </div>
                </div>
    
                <div class="box">
                    <img>
                    <div class="text">
                        <h2>Create and Join Leagues</h2>
                        <p>Play against friends , colleagues or a web community in invitational leagues and cups.</p>
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