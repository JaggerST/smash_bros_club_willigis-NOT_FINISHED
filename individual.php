<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>"> 
    <link rel="stylesheet" href="playerStats.css?v=<?php echo time(); ?>">   <!--applies css to php-->
    <link rel="stylesheet" href="table.css?v=<?php echo time(); ?>"> 
    <!--font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">  
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>
    <!--font-->
    <title>Document</title>
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
                    <a href="index.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="players.php" class="nav-link">Spieler</a>
                </li>
                <li class="nav-item">
                    <a href="table.php?season=1" class="nav-link">Liga</a>
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

    <table class="mainTable">
        <tr>
            <th colspan="2" class="th1">

                <!--name-->

                <?php 
                    $servername = "localhost";
                    $database = "d03cf694";
                    $username = "d03cf694";
                    $password = "datenbank";
                    // Create connection 
                    $conn = mysqli_connect($servername, $username, $password, $database);
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    //get value of invocation 
                    $playerID = '';
                    if (isset($_GET['playerID'])) {
                        $playerID = $_GET['playerID'];
                    }
                    //get value of invocation 
                    $season = '';
                    if (isset($_GET['season'])) {
                        $season = $_GET['season'];
                    }
                    
                    $tablename = "players".$season;   //my database has different tables called players1, players2, players3... 
                    $sql1 = "SELECT player_name FROM $tablename WHERE id = $playerID";
                    $sql2 = "SELECT player_id FROM $tablename WHERE id = $playerID";
                    //use invocation value to access data from database
                    $result1 = mysqli_query($conn, $sql1);  
                    $result2 = mysqli_query($conn, $sql2);
                    if ($row1 = $result1->fetch_assoc() and $row2 = $result2->fetch_assoc()) {
                        echo "<div class='name'>";
                        echo $row2['player_id']." - ";
                        echo $row1['player_name'];
                        echo "</div>";
                    }
                    //close connection
                    mysqli_close($conn);
                ?>
            </th>
        </tr>
        <tr>
            <td class="td2 design2">
                <div class="heading">Mains:</div>
                <br>
                <div class="rowImage">

                    <!--first Main-->

                    <div>
                    <?php 
                        $servername = "localhost";
                        $database = "d03cf694";
                        $username = "d03cf694";
                        $password = "datenbank";
                        // Create connection 
                        $conn = mysqli_connect($servername, $username, $password, $database);
                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        //get value of invocation 
                        $playerID = '';
                        if (isset($_GET['playerID'])) {
                            $playerID = $_GET['playerID'];
                        }  
                        //use invocation value to access data from database
                        $result1 = mysqli_query($conn, "SELECT player_main1 FROM players1 WHERE id = $playerID");
                        $result2 = mysqli_query($conn, "SELECT player_main_path1 FROM players1 WHERE id = $playerID");
                        $result3 = mysqli_query($conn, "SELECT player_fights1 FROM players1 WHERE id = $playerID");
                        if ($row1 = $result1->fetch_assoc() and $row2 = $result2->fetch_assoc() and $row3 = $result3->fetch_assoc()) {
                            $filename = $row2['player_main_path1'];
                            echo '<div class="mainImg">';
                            echo '<div class="mainName">';
                            echo $row1['player_main1']."<br>";
                            echo "</div>";
                            echo "<img class='personalImage' src=$filename />";
                            echo "<div class='fights'>";
                            echo "Kämpfe:"."<br>";
                            echo '</div>';
                            echo "<div class='specialNumbers'>";
                            echo $row3['player_fights1']."<br>";
                            echo "</div>";
                            echo '</div>';
                        }
                        //close connection
                        mysqli_close($conn);
                    ?>
                    </div>

                    <!--second Main-->

                    <div>
                    <?php 
                        $servername = "localhost";
                        $database = "d03cf694";
                        $username = "d03cf694";
                        $password = "datenbank";
                        // Create connection 
                        $conn = mysqli_connect($servername, $username, $password, $database);
                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        //get value of invocation 
                        $playerID = '';
                        if (isset($_GET['playerID'])) {
                            $playerID = $_GET['playerID'];
                        }
                        //use invocation value to access data from database
                        $result1 = mysqli_query($conn, "SELECT player_main2 FROM players1 WHERE id = $playerID");
                        $result2 = mysqli_query($conn, "SELECT player_main_path2 FROM players1 WHERE id = $playerID");
                        $result3 = mysqli_query($conn, "SELECT player_fights2 FROM players1 WHERE id = $playerID");
                        if ($row1 = $result1->fetch_assoc() and $row2 = $result2->fetch_assoc() and $row3 = $result3->fetch_assoc()) {
                            $filename = $row2['player_main_path2'];
                            echo '<div class="mainImg">';
                            echo '<div class="mainName">';
                            echo $row1['player_main2']."<br>";
                            echo '</div>';
                            echo "<img class='personalImage' src=$filename />";
                            echo "<div class='fights'>";
                            echo "Kämpfe:"."<br>";
                            echo '</div>';
                            echo "<div class='specialNumbers'>";
                            echo $row3['player_fights2']."<br>";
                            echo "</div>";
                            echo '</div>';
                        }
                        //close connection
                        mysqli_close($conn);
                    ?>
                    </div>
                    
                    <!--third Main-->

                    <div>
                    <?php 
                        $servername = "localhost";
                        $database = "d03cf694";
                        $username = "d03cf694";
                        $password = "datenbank";
                        // Create connection 
                        $conn = mysqli_connect($servername, $username, $password, $database);
                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        //get value of invocation 
                        $playerID = '';
                        if (isset($_GET['playerID'])) {
                            $playerID = $_GET['playerID'];
                        }
                        //use invocation value to access data from database
                        $result1 = mysqli_query($conn, "SELECT player_main3 FROM players1 WHERE id = $playerID");
                        $result2 = mysqli_query($conn, "SELECT player_main_path3 FROM players1 WHERE id = $playerID");
                        $result3 = mysqli_query($conn, "SELECT player_fights3 FROM players1 WHERE id = $playerID");
                        if ($row1 = $result1->fetch_assoc() and $row2 = $result2->fetch_assoc() and $row3 = $result3->fetch_assoc()) {
                            $filename = $row2['player_main_path3'];
                            echo '<div class="mainImg">';
                            echo '<div class="mainName">';
                            echo $row1['player_main3']."<br>";
                            echo '</div>';
                            echo "<img class='personalImage' src=$filename />";
                            echo "<div class='fights'>";
                            echo "Kämpfe:"."<br>";
                            echo '</div>';
                            echo "<div class='specialNumbers'>";
                            echo $row3['player_fights3']."<br>";
                            echo "</div>";
                            echo '</div>';
                        }
                        //close connection
                        mysqli_close($conn);
                    ?>
                    </div>
                </div>
            </td>
            <td class="td2">
            <div class="heading">Liga-Ergebnisse:</div>

                <!--Matches-->

                <div>
                <?php 
                    $servername = "localhost";
                    $database = "d03cf694";
                    $username = "d03cf694";
                    $password = "datenbank";
                    // Create connection 
                    $conn = mysqli_connect($servername, $username, $password, $database);
                     // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    //get value of invocation 
                    $playerID = '';
                    if (isset($_GET['playerID'])) {
                          $playerID = $_GET['playerID'];
                    }
                    //use invocation value to access data from database
                   
                    $result2 = mysqli_query($conn, "SELECT player_place1 FROM players1 WHERE id = $playerID");
                    $result3 = mysqli_query($conn, "SELECT player_place2 FROM players1 WHERE id = $playerID");
                    $result4 = mysqli_query($conn, "SELECT player_place3 FROM players1 WHERE id = $playerID");
                    $result5 = mysqli_query($conn, "SELECT player_place4 FROM players1 WHERE id = $playerID");
                    $result6 = mysqli_query($conn, "SELECT player_kos FROM players1 WHERE id = $playerID");
                    $result7 = mysqli_query($conn, "SELECT player_fights1 FROM players1 WHERE id = $playerID");
                    $result8 = mysqli_query($conn, "SELECT player_fights2 FROM players1 WHERE id = $playerID");
                    $result9 = mysqli_query($conn, "SELECT player_fights3 FROM players1 WHERE id = $playerID");
                    if ($row2 = $result2->fetch_assoc() and $row3 = $result3->fetch_assoc() and $row4 = $result4->fetch_assoc()
                    and $row5 = $result5->fetch_assoc() and $row6 = $result6->fetch_assoc() and $row7 = $result7->fetch_assoc() and $row8 = $result8->fetch_assoc()
                    and $row9 = $result9->fetch_assoc()) {

                        //code to automatically update placement, points and matches 
                        $points = $row2['player_place1'] * 4 + $row3['player_place2'] * 3 + $row4['player_place3'] * 2 + $row5['player_place4']; //player points formula
                        $placement = mysqli_query($conn, "SELECT COUNT(1) FROM players1 WHERE 4 * player_place1 + 3 * player_place2 + 2* player_place3 + player_place4 >= $points");
                        $placement2 = $placement->fetch_column();
                        $matches = $row7['player_fights1'] + $row8['player_fights2'] + $row9['player_fights3'];
                        //end of snippet

                        echo "<br>"."<div class='tableRight'>";
                        echo "Matches: ".$matches."<br>"."<br>";
                        echo "<table class='score_table'>";
                        echo "<tr>";
                        echo "<td class='score_row'>";
                        echo "Platz 1: ".$row2['player_place1'];
                        echo "</td>";
                        echo "</tr>";
                        echo "<te>";
                        echo "<td class='score_row'>";
                        echo "Platz 2: ".$row3['player_place2'];
                        echo "</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td class='score_row'>";
                        echo "Platz 3: ".$row4['player_place3'];
                        echo "</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td class='score_row'>";
                        echo "Platz 4: ".$row5['player_place4'];
                        echo "</td>";
                        echo "<tr>";
                        echo "</table>"."<br>";
                        echo "Liga-Punkte: ".$points."<br>"."<br>";
                        echo "<hr color='black'>"."<br>";
                        echo "<div class='place'>";
                        echo "Aktuelle Platzierung: ".$placement2."<br>"."<br>";
                        echo "</div>";
                        echo "<hr color='black'>"."<br>";
                        echo "KOs:"."<br>";
                        echo "<div class='specialNumbers'>";
                        echo $row6['player_kos']."<br>"."<br>";
                        echo "</div>";
                        echo "<hr color='black'>"."<br>";
                        echo "</div>";
                    }
                    //close connection
                    mysqli_close($conn);
                 ?>
                </div> 
            </td>
        </tr>
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