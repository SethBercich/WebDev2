<?php 
    session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

?>

<html lang="en">
<!--Version 7.0 
	Name: Seth Bercich
	Date Completed:
    -->

<head>
    <title>Seth's Vibing Website</title>
    <link rel='icon' type='image/ico' href='images/favicon.ico'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel='stylesheet' href='CSS/user02CSS.css'>
    
    <style>
        body {
            background-image: url(images/homeBg.jpg);
        }

    </style>
</head>
<body>
    <div id='menu' class='menu'>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <button class="menuButton">
                <span class="fa fa-list"></span>
            </button>

            <div class="menuCollapse" id="inputMenu">
            </div>
            
            <div class="navbar-nav ml-auto">
                <p id="identity" style="margin-bottom: 0px; font-size: 0.9em;"><?php echo htmlspecialchars($_SESSION["name"]); ?> as <?php echo htmlspecialchars($_SESSION["personType"]); ?></p>
            </div>
        </nav>
    </div>
    

    <h1 id='headName'>Welcome <strong style='font-weight: bold;'><?php echo htmlspecialchars($_SESSION["name"]); ?></strong>, to the Vibing Homepage</h1>
    
    <div class='bodyStuff'>
        <p>Welcome to my Vibing Webpage, where you can learn how to vibe in your own ways. Explore the different pages with the menu bar on the top. On this website, I will give you tips on how to be relaxed and have fun relaxing!</p>
        
        <h6>Have fun learning how to</h6>
        <img alt="VIBE image" src='images/vibeLogo.png' width='100%'>
    </div>

    <div id='footer' class='pull-down'>
    </div>
    <script src='https://code.jquery.com/jquery-3.4.1.min.js'></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="JS/user02Java.js"></script>
    <script>$('#home').addClass('active');</script>
</body>

</html>
