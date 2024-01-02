<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>"> 
    <link rel="stylesheet" href="players.css?v=<?php echo time(); ?>"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">  
    <script src="https://kit.fontawesome.com/ccba450066.js" crossorigin="anonymous"></script>
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
        
        <ul class="list">
            <a href="individual.php?playerID=1&season=1" class="row">  <!--invoke=number, number is the id of the player in the database-->
                <li class="listItem">
                    DrSchischious
                    <!--<span class="badge"><i class="fa-solid fa-trophy"></i></span>-->
                </li>
            </a>
            <a href="individual.php?playerID=2&season=1" class="row">   <!--Season auf 4 setzen!!!-->
                <li class="listItem">
                    Kasti
                </li>
            </a>
            <a href="individual.php?playerID=3&season=1" class="row">
                <li class="listItem">
                    Benji
                </li>
            </a>
            <a href="individual.php?playerID=4&season=1" class="row">
                <li class="listItem">
                    Jagger
                </li>
            </a>
            <a href="individual.php?playerID=5&season=1" class="row">    
                <li class="listItem">
                    Hunter
                </li>
            </a>
            <a href="individual.php?playerID=6&season=1" class="row">    
                <li class="listItem">
                    Magoboe
                </li>
            </a>
            <a href="individual.php?playerID=7&season=1" class="row">    
                <li class="listItem">
                    NofroX
                </li>
            </a>
            <a href="individual.php?playerID=8&season=1" class="row">    
                <li class="listItem">
                    LoudEcho
                </li>
            </a>
            <a href="individual.php?playerID=9&season=1" class="row">    
                <li class="listItem">
                    Lauphie
                </li>
            </a>
            <a href="individual.php?playerID=10&season=1" class="row">    
                <li class="listItem">
                    ANTi
                </li>
            </a>
            <a href="individual.php?playerID=11&season=1" class="row">    
                <li class="listItem">
                    Pokejul
                </li>
            </a>
        </ul>
   <script src="script.js"></script> 
</body>
</html>