<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>"> 
    <link rel="stylesheet" href="table.css?v=<?php echo time(); ?>"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">  
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Saira:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Metrophobic&display=swap" rel="stylesheet">

    
</head>
<body>
    <!-- navbar -->
    <header class="header">
        <nav class="navbar">
            <div class="nav-logo">
                <img src="images/LogoWhite.png" class="logoWhite"> 
                <span class="longText">WILLIGIS SMASH CLUB</span>
                <span class="shortText">WSC</span>
            </div>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="#" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="players.php" class="nav-link">Spieler</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Liga</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Turniere</a>
                </li>
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </header>
    <!-- navbar end -->
        
    <h1>Spielerrankings</h1>
    <!--Choose Season-->
     <div class="accordion">
            <button type="button" class="accordionButton" id="seasonButton">
            <?php
                 $season = '';
                 if (isset($_GET['season'])) {
                     $season = $_GET['season'];
                 }
                 echo "Season ".$season
            ?>
            </button>
            <div class="accordionContent">
                <table>
                    <tr>
                        <td>
                            <a
                            <?php
                            $playerID = '';
                            if (isset($_GET['playerID'])) {
                                $playerID = $_GET['playerID'];
                            }
                            $link = 'individual.php?playerID='.$playerID.'&season=1';
                            echo "href=$link"
                            ?>
                            id="linkS1" class="seasonLink">Season 1</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <a
                            <?php
                            $playerID = '';
                            if (isset($_GET['playerID'])) {
                                $playerID = $_GET['playerID'];
                            }
                            $link = 'individual.php?playerID='.$playerID.'&season=2';
                            echo "href=$link"
                            ?>
                            id="linkS2" class="seasonLink">Season 2</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <a
                            <?php
                            $playerID = '';
                            if (isset($_GET['playerID'])) {
                                $playerID = $_GET['playerID'];
                            }
                            $link = 'individual.php?playerID='.$playerID.'&season=3';
                            echo "href=$link"
                            ?>
                            id="linkS3" class="seasonLink">Season 3</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <a
                            <?php
                            $playerID = '';
                            if (isset($_GET['playerID'])) {
                                $playerID = $_GET['playerID'];
                            }
                            $link = 'individual.php?playerID='.$playerID.'&season=4';
                            echo "href=$link"
                            ?>
                            id="linkS4" class="seasonLink">Season 4</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <table class="content-table">
            <thead>
                    <tr>
                        <th>Platz</th>
                        <th>Spieler</th>
                        <th>Punkte</th>
                        <th>KOs</th>
                        <th>Matches</th>
                        <th>1.</th>
                        <th>2.</th>
                        <th>3.</th>
                        <th>4.</th>
                    </tr>
            </thead>
            <tbody>
            <?php 
            
                $servername = "localhost";
                $database = "d03cf694";
                $username = "d03cf694";
                $password = "datenbank";
                
                /*
                $servername = "127.0.0.1:3307";
                $database = "players_db";
                $username = "root";
                $password = "";
                */
                // Create connection 
                $conn = mysqli_connect($servername, $username, $password, $database);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                //get value of invocation 
                $season = '';
                if (isset($_GET['season'])) {
                    $season = $_GET['season'];
                }
                $tablename = "players".$season; 

                //iteration variable i
                $i = 0; 

                //number of rows in database 
                $tmp = mysqli_query($conn, "SELECT * FROM $tablename");
                $num_rows = mysqli_num_rows($tmp);

                //fill table
                while($i < $num_rows) {
                    $placement = $i + 1;
                    $player = mysqli_query($conn, "SELECT player_name FROM $tablename ORDER BY 4 * player_place1 + 3 * player_place2 + 2 * player_place3 + player_place4  DESC, player_kos DESC LIMIT $i, 1");
                    $place1 = mysqli_query($conn, "SELECT player_place1 FROM $tablename ORDER BY 4 * player_place1 + 3 * player_place2 + 2 * player_place3 + player_place4 DESC, player_kos DESC LIMIT $i, 1");
                    $place2 = mysqli_query($conn, "SELECT player_place2 FROM $tablename ORDER BY 4 * player_place1 + 3 * player_place2 + 2 * player_place3 + player_place4 DESC, player_kos DESC LIMIT $i, 1");
                    $place3 = mysqli_query($conn, "SELECT player_place3 FROM $tablename ORDER BY 4 * player_place1 + 3 * player_place2 + 2 * player_place3 + player_place4 DESC, player_kos DESC LIMIT $i, 1");
                    $place4 = mysqli_query($conn, "SELECT player_place4 FROM $tablename ORDER BY 4 * player_place1 + 3 * player_place2 + 2 * player_place3 + player_place4 DESC, player_kos DESC LIMIT $i, 1");
                    $kos = mysqli_query($conn, "SELECT player_kos FROM $tablename ORDER BY 4 * player_place1 + 3 * player_place2 + 2 * player_place3 + player_place4 DESC, player_kos DESC LIMIT $i, 1");
                    $fights1 = mysqli_query($conn, "SELECT player_fights1 FROM $tablename ORDER BY 4 * player_place1 + 3 * player_place2 + 2 * player_place3 + player_place4 DESC, player_kos DESC LIMIT $i, 1");
                    $fights2 = mysqli_query($conn, "SELECT player_fights2 FROM $tablename ORDER BY 4 * player_place1 + 3 * player_place2 + 2 * player_place3 + player_place4 DESC, player_kos DESC LIMIT $i, 1");
                    $fights3 = mysqli_query($conn, "SELECT player_fights3 FROM $tablename ORDER BY 4 * player_place1 + 3 * player_place2 + 2 * player_place3 + player_place4 DESC, player_kos DESC LIMIT $i, 1");
                    
                    $row1 = $placement;
                    $row2 = $player->fetch_assoc();
                    $row3 = $kos->fetch_assoc();
                    $row4 = $place1->fetch_assoc();
                    $row5 = $place2->fetch_assoc();
                    $row6 = $place3->fetch_assoc();
                    $row7 = $place4->fetch_assoc();
                    $row8 = $fights1->fetch_assoc();
                    $row9 = $fights2->fetch_assoc();
                    $row10 = $fights3->fetch_assoc();

                    $matches = $row8['player_fights1'] + $row9['player_fights2'] + $row10['player_fights3'];
                    $points = $row4['player_place1'] * 4 + $row5['player_place2'] * 3 + $row6['player_place3'] * 2 + $row7['player_place4']; //player points formula
                    
                    echo "<tr>";
                    echo "<td>";
                    echo $row1;
                    echo "</td>";
                    echo "<td>";
                    echo $row2['player_name'];
                    echo "</td>";
                    echo "<td>";
                    echo $points;
                    echo "</td>";
                    echo "<td>";
                    echo substr($row3['player_kos'], -2); //führende 0 entfernen 
                    echo "</td>";
                    echo "<td>";
                    echo $matches;
                    echo "</td>";
                    echo "<td>";
                    echo $row4['player_place1'];
                    echo "</td>";
                    echo "<td>";
                    echo $row5['player_place2'];
                    echo "</td>";
                    echo "<td>";
                    echo $row6['player_place3'];
                    echo "</td>";
                    echo "<td>";
                    echo $row7['player_place4'];
                    echo "</td>";
                    echo "</tr>";
                    $i++;
                }
                //close connection
                mysqli_close($conn);     
            ?>
            </tbody>
        </table>
        <script src="script.js"></script> 
     <script>
        //Funktionalität zum Auswahl der Season beim individuellen Profil
        var currentSeason = "<?php 
        $season = '';
        if (isset($_GET['season'])) {
            $season = $_GET['season'];
        }
        echo "Season ".$season;
        ?>";

        var button = document.getElementById('seasonButton');

        button.addEventListener('click', function() {
            if (button.textContent == 'Wähle Season') {
                 button.textContent = currentSeason;
            } else {
                button.textContent = 'Wähle Season';
            }
        });
     </script>
</body>
</html>