<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABA Fantasy</title>
    <link rel="stylesheet" href="../css/index.css">
    <script>
        function toggleCollapsible_1() {
            let collapsible = document.getElementById('collapsible-1');
            if (collapsible.style.display === 'block') {
                collapsible.style.display = 'none';
            } else {
                collapsible.style.display = 'block';
            }
        }
        function toggleCollapsible_2() {
            let collapsible = document.getElementById('collapsible-2');
            if (collapsible.style.display === 'block') {
                collapsible.style.display = 'none';
            } else {
                collapsible.style.display = 'block';
            }
        }
        function toggleCollapsible_3() {
            let collapsible = document.getElementById('collapsible-3');
            if (collapsible.style.display === 'block') {
                collapsible.style.display = 'none';
            } else {
                collapsible.style.display = 'block';
            }
        }
        function toggleCollapsible_4() {
            let collapsible = document.getElementById('collapsible-4');
            if (collapsible.style.display === 'block') {
                collapsible.style.display = 'none';
            } else {
                collapsible.style.display = 'block';
            }
        }
        function toggleCollapsible_5() {
            let collapsible = document.getElementById('collapsible-5');
            if (collapsible.style.display === 'block') {
                collapsible.style.display = 'none';
            } else {
                collapsible.style.display = 'block';
            }
        }
        function toggleCollapsible_6() {
            let collapsible = document.getElementById('collapsible-6');
            if (collapsible.style.display === 'block') {
                collapsible.style.display = 'none';
            } else {
                collapsible.style.display = 'block';
            }
        }
        function toggleCollapsible_7() {
            let collapsible = document.getElementById('collapsible-7');
            if (collapsible.style.display === 'block') {
                collapsible.style.display = 'none';
            } else {
                collapsible.style.display = 'block';
            }
        }
    </script>
</head>
<body>
    <header>
        <div class="topnav">
            <h1>Fantasy</h1>
            <div class="links">
                <a href="../index.php">
                    <button>Home</button>
                </a>
                <a href="help.html">
                    <button class="active">Help</button>
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
                    <div class="rules-container">
                        <h2>Rules</h2>
                        <div class="rule-box">
                            <div class="dropdown">
                                <h5>
                                    <div type="button" aria-expanded="false" aria-controls="collapsible-1" class="collapsible-button lBoa" onclick="toggleCollapsible_1()">
                                        <div class="dropdown-icon bLlcIf">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 8">
                                                <path fill-rule="nonzero" d="M7 5.172L2.05.222.636 1.636 7 8l6.364-6.364L11.95.222z"></path>
                                            </svg>
                                        </div>
                                        Selecting Your Initial Roster
                                    </div>
                                </h5>
                                <div id="collapsible-1" aria-hidden="true" class="dropdown-content">
                                    <div class="ddc">
                                        <h5>Roster Size</h5>
                                        <p>To join the game select a fantasy basketball roster of 10 players, consisting of:</p>
                                        <ul>
                                            <li>5 Back Court players</li>
                                            <li>5 Front Court players</li>
                                        </ul>
                                        <h5>Salary Cap</h5>
                                        <p>
                                            The total value of your initial roster must not exceed the salary cap of $ 100 million.
                                        </p>
                                        <h5>Players Per Team</h5>
                                        <p>You can select up to 2 players from a single ABA team.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown">
                                <h5>
                                    <div type="button" aria-expanded="false" aria-controls="collapsible-2" class="collapsible-button lBoa" onclick="toggleCollapsible_2()">
                                        <div class="dropdown-icon bLlcIf">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 8">
                                                <path fill-rule="nonzero" d="M7 5.172L2.05.222.636 1.636 7 8l6.364-6.364L11.95.222z"></path>
                                            </svg>
                                        </div>
                                        Managing Your Team
                                    </div>
                                </h5>
                                <div id="collapsible-2" aria-hidden="true" class="dropdown-content">
                                    <div class="ddc">
                                        <h5>Choosing Your Line-Up</h5>
                                        <p>From your 10 player roster, select 5 players by the Gameday deadline to form your starting line-up.</p>
                                        <p>All your points for the Gameday will be scored by these 5 players, however if one or more doesn't play they may be automatically substituted.</p>
                                        <p>Your team can play in one of two formations:</p>
                                        <ul>
                                            <li>2 Back Court and 3 Front Court</li>
                                            <li>3 Back Court and 2 Front Court</li>
                                        </ul>
                                        <h5>Selecting a Captain and a Vice-Captain</h5>
                                        <p>
                                            From your starting 5, nominate a captain and vice-captain. Your captain's score will be doubled.
                                        </p>
                                        <p>If your captain plays 0 minutes in the Gameday, then your vice captain’s score will be doubled (providing they play at least 1 minute).</p>
                                        <p>If both the captain and the vice-captain do not play in any games in a Gameday, the bonus will be lost. No other player will take over the captaincy in their place.</p>

                                        <h5>Prioritising Your Bench For Automatic Substitutions</h5>
                                        <p>Your bench provides cover for unforeseen events like injuries and postponements by automatically replacing starting players who don't play in a Gameday.</p>
                                        <p>Playing in a Gameday means playing at least 1 minute. Based on the priorities you assign, automatic substitutions are processed at 11 PM GMT, after the last game of the Gameday has finished.</p>
                                        <p>If any of your players don't play in the Gameday, they will be substituted by the highest priority bench player who played in the Gameday and doesn't break the formation rules (e.g., If your starting team has 2 Back Court players, a Back Court player can only be replaced by another Back Court player).</p>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown">
                                <h5><div type="button" aria-expanded="false" aria-controls="collapsible-3" class="collapsible-button lBoa" onclick="toggleCollapsible_3()">
                                    <div class="dropdown-icon bLlcIf">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 8">
                                            <path fill-rule="nonzero" d="M7 5.172L2.05.222.636 1.636 7 8l6.364-6.364L11.95.222z"></path>
                                        </svg>
                                    </div>
                                    Transfers
                                    </div>
                                </h5>
                                <div id="collapsible-3" aria-hidden="true" class="dropdown-content">
                                    <div class="ddc">
                                        <p>After selecting your roster, you can sign and waive players in the transfers tab. Unlimited transfers can be made at no cost until your first deadline.</p>
                                        <p>After your first deadline you will receive 2 free transfers each Gameweek.</p>
                                        <p>Each additional transfer you make in the same Gameweek will deduct 100 points from your total score at the next deadline.</p>
                                        <p>If you do not use any of your free transfers, you are able to make an additional free transfer the following Gameweek. If you do not use this saved free
                                            transfer in the following Gameweek, it will be carried over until you do. You can never have more than 1 saved transfer.</p>

                                        <h5>Wildcards</h5>

                                        <p>A wildcard allows a user to make unlimited transfers in a Gameday, free of charge. Any transfers already made that Gameday will also be free. 
                                            The Wildcard chip is played when confirming transfers that cost points and can't be cancelled once played.</p>
                                        <p>Please note that when playing a wildcard, any saved free transfers will be lost.</p>
                                        <p>E.g., if you have 3 free transfers before using your wildcard, you will only have 2 remaining for the rest of the gameweek.</p>
                                        <p>If you play your wildcard and don’t use another free transfer in that gameweek, you will still be eligible for a saved free transfer for the following Gameweek.</p>

                                        <h5>Player Salaries</h5>

                                        <p>Player salaries change during the season depending on the popularity of the player in the transfers tab. Player salaries do not change until the season starts.</p>
                                        <p>The salary shown on your transfers page is a player's selling salary.</p>
                                        <p>This selling salary may be less than the player's current purchase salary as a sell-on fee of 50% (Rounded up to the nearest $0.1m) will be applied on any profits made on that player.</p>
                                        <p>The player salaries featured in the game are not reflective of real NBA salaries and are for gameplay purposes only.</p>

                                    </div>
                                </div>
                                </div>
                            <div class="dropdown">
                                <h5><div type="button" aria-expanded="false" aria-controls="collapsible-4" class="collapsible-button lBoa" onclick="toggleCollapsible_4()">
                                    <div class="dropdown-icon bLlcIf">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 8">
                                            <path fill-rule="nonzero" d="M7 5.172L2.05.222.636 1.636 7 8l6.364-6.364L11.95.222z"></path>
                                        </svg>
                                    </div>
                                    Chips
                                </div>
                                </h5>
                                <div id="collapsible-4" aria-hidden="true" class="dropdown-content">
                                    <div class="ddc">
                                        <p>Chips can be used to potentially enhance your team's performance during the season.</p>
                                        <p>Only one chip can be played in a single Gameday. The chips available are as follows:</p>
                                        <table class="wc-table">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Effect</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Go Big</td>
                                                    <td>All Front Court Players score double points for the next Gameday.</td>
                                                </tr>
                                                <tr>
                                                    <td>Go Small</td>
                                                    <td>All Back Court Players score double points for the next Gameday.</td>
                                                </tr>
                                                <tr>
                                                    <td>Wildcard</td>
                                                    <td>All transfers (including those already made in that Gameday) are free for the next Gameday.</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <p>The Go Big and Go Small chips can each be used once a season and are played when saving your team on the My Team page. They can be cancelled at any time before the Gameday deadline</p>
                                        <p>When playing the Go Big and Go Small chips then you won't be able to choose a captain for the game day. Only the players affected by the Go Big or Go Small chip will score double points for the game day.</p>
                                        <p>The Wildcard chip can be used three times in a season.</p>
                                        <p>The first wildcard will be available from the start of the season until Gameweek 6 - Day 6. The second wildcard will be available after Gameweek 6 - Day 6 up until Gameweek 16 - Day 7 The final wildcard can be used between Gameweek 17 - Day 1 and the end of the season.</p>
                                        <p>The wildcard chip is played when confirming transfers that cost points and cannot be cancelled once played.</p>
                                        <p>Please note that when playing a wildcard, any saved free transfers will be lost. You will be back to the usual 2 free transfer the following Gameweek.</p>

                                        <h5>Can I use more than one chip in the same Gameday?</h5>

                                        <p>No, only one chip may be active in a Gameday. For example, it is not possible to make transfers with your Wildcard chip and then use your Go Big or Go Small chip in the same Gameday.</p>
                                        
                                        <h5>What happens if my player doesn’t play, and I have used my Go Big / Go Small chip?</h5>

                                        <p>When playing a Go Big / Go Small chip, you should ensure that you have a full complement of Front Court / Back Court players playing that round.</p>
                                        <p>If there is no substitute available in that position and one of your players does not play, then the bonus for that position will be lost.</p>
                                        <p>You will still score double points for the remaining Front Court / Back Court players.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown">
                                <h5>
                                    <div type="button" aria-expanded="false" aria-controls="collapsible-5" class="collapsible-button lBoa" onclick="toggleCollapsible_5()">
                                    <div class="dropdown-icon bLlcIf">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 8">
                                            <path fill-rule="nonzero" d="M7 5.172L2.05.222.636 1.636 7 8l6.364-6.364L11.95.222z"></path>
                                        </svg>
                                    </div>Deadlines
                                </div>
                            </h5>
                            <div id="collapsible-5" aria-hidden="true" class="dropdown-content">
                                <div class="ddc">
                                    <p>You must set your starting line-up for each Gameday prior to each Gameday deadline.</p>
                                    <p>Deadlines are subject to change and will be 30 minutes before the tip off time in the first game of the Gameday.</p>
                                    <p>The Gameweek deadline is the first Game deadline of that Gameday and is used to determine the number of free transfers you can use in the Gameweek.</p>
                                </div>
                            </div>
                            </div>
                            <div class="dropdown">
                                <h5>
                                    <div type="button" aria-expanded="false" aria-controls="collapsible-6" class="collapsible-button lBoa" onclick="toggleCollapsible_6()">
                                    <div class="dropdown-icon bLlcIf">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 8">
                                            <path fill-rule="nonzero" d="M7 5.172L2.05.222.636 1.636 7 8l6.364-6.364L11.95.222z"></path>
                                        </svg>
                                    </div>Scoring
                                </div>
                            </h5>
                            <div id="collapsible-6" aria-hidden="true" class="dropdown-content">
                                <div class="ddc">
                                    <p>During the season, your NBA fantasy players will be allocated points based on their performance in the league.</p>
                                    <p>Only one chip can be played in a single Gameday. The chips available are as follows:</p>
                                    <table class="wc-table">
                                        <thead>
                                            <tr>
                                                <th>Actions</th>
                                                <th>Points</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>For each point scored</td>
                                                <td>1</td>
                                            </tr>
                                            <tr>
                                                <td>For each rebound</td>
                                                <td>1.2</td>
                                            </tr>
                                            <tr>
                                                <td>For each assist</td>
                                                <td>1.5</td>
                                            </tr>
                                            <tr>
                                                <td>For each block</td>
                                                <td>3</td>
                                            </tr>
                                            <tr>
                                                <td>For each steal</td>
                                                <td>3</td>
                                            </tr>
                                            <tr>
                                                <td>For each turnover</td>
                                                <td>-1</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <p>Once data has been marked as final, it will not be changed. We will not enter into discussion around any of the statistics used to calculate fantasy scores for any individual game.</p>
                                </div>
                            </div>
                            </div>
                            <div class="dropdown">
                                <h5>
                                    <div type="button" aria-expanded="false" aria-controls="collapsible-7" class="collapsible-button lBoa" onclick="toggleCollapsible_7()">
                                    <div class="dropdown-icon bLlcIf">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 8">
                                            <path fill-rule="nonzero" d="M7 5.172L2.05.222.636 1.636 7 8l6.364-6.364L11.95.222z"></path>
                                        </svg>
                                    </div>Leagues
                                </div>
                            </h5>
                            <div id="collapsible-7" aria-hidden="true" class="dropdown-content">
                                <div class="ddc">
                                    <p>After entering your roster, you can join and create leagues to compete with friends and other game players</p>
                                    
                                    <h4>League Types</h4>
                                    
                                    <h5>Private Leagues</h5>
                                    
                                    <p>Private leagues allow you to compete against your friends. Just create a league and then send out the unique code to allow your friends to join!</p>
                                    <p>You can compete in up to 25 private leagues. There's no limit on the number of teams in a single league.</p>
                                    
                                    <h5>Public Leagues</h5>
                                    
                                    <p>Need an extra challenge? Then join a public league of randomly assigned teams. You can compete in up to 5 public leagues.</p>
                                    
                                    <h5>Global Leagues</h5>
                                    
                                    <p>You are automatically entered into the following global leagues:</p>
                                    <ul>The overall league featuring all registered teams.</ul>
                                    <ul>A league for general managers from your graduating class.</ul>
                                    <ul>A league for fans of your favorite ABA team.</ul>
                                    <ul>A league for general managers starting in the same Gameday as you.</ul>
                                    
                                    <h5>League Scoring</h5>

                                    <p>All leagues score on a Classic basis. In a league with classic scoring, teams are ranked based on their total points in the game.</p>
                                    <p>In a league with classic scoring, teams are ranked based on their total points in the game. You can join or leave a league with classic scoring at any point during the season.</p>
                                    <p>In the event of a tie between teams, the team who has made the fewest transfers will be positioned higher.</p>
                                    <p>Any transfers made using a wildcard will not count towards total transfers made.</p>
                                </div>
                            </div>
                            </div>
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