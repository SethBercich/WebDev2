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
    <title>How To Vibe</title>
    <link rel='icon' type='image/ico' href='images/favicon.ico'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='CSS/user02CSS.css'>

    <style>
        body {
            background-image: url(images/howtoBg.jpg);
        }
        
        .dropDown{
            margin-bottom: 30px;
        }
        
        .dropItems div{
            background-color:rgba(30, 100, 60, 0.5);
            padding: 10px;
            border-radius: 20px;
        }
        
        h1{
            margin-bottom:5px;
        }
        
        a{
            color:cyan;
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

    <h1>How you can Vibe</h1>
    <div class='bodyStuff'>
        <p>Check out some of the popular ways to vibe! These aren't the only ways you are able to vibe because there are unlimited ways to!</p>
        <div class='dropDown'>
            <button class='topBar'><span class='fa fa-caret-right pull-left'></span>Ways to Vibe</button><br>
            <button class='dropBar' data-div='.vibeMusic'><span class='fa fa-music pull-left'></span>Music</button><br>
            <button class='dropBar' data-div='.vibeGaming'><span class='fa fa-gamepad pull-left'></span>Gaming</button><br>
            <button class='dropBar' data-div='.vibeVideos'><span class='fa fa-video-camera pull-left'></span>Videos</button><br>
        </div>
        
        <div class='dropItems'>
            <div class='vibeMusic'>
                <h2>Vibing to Music</h2>
                <p>An easy way to vibe is through music. Studys show that music can improve your memory, helps the recovery process of trauma, and reduces stress and anxiety. Just turn on a song you like that isnt crazy loud and you can help yourself start to vibe. You can look at my reccomended music <a href='music.html'>HERE</a>. Have fun listening to music!</p>
            </div>
            
            <div class='vibeGaming'>
                <h2>Vibing to Games</h2>
                <p>Games are a way to escape whats going on around you and just have fun. You get to either play with your friends, play with random people, or play solo. No matter what your doing, it still helps get your mind of the bad things going on in your life and overall makes you feel better. But, if a game is making you angry, take a break for a bit. Angry gaming doesn't help you vibe at all.</p>
            </div>
            
            <div class='vibeVideos'>
                <h2>Vibing to Videos</h2>
                <p>This one is similar to video games. Watching videos is a way to get your mind of stuff going on in your life. This includes watching recorded videos or watching a live stream. Either way, you just watch a video you're interested in and the rest is behind you. Also, videos are a good way to learn new things you're interested in.</p>
            </div>
        </div>
    </div>
    <div id='footer' class='pull-down'>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src='https://code.jquery.com/jquery-3.4.1.min.js'></script>
    <script src='JS/user02Java.js'></script>
    <script>$('#ways').addClass('active')</script>
</body>

</html>
