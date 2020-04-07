<?php
require_once "./config/config.php";
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    if($link === false){
        die("ERROR: Could not connect to server. " . mysqli_connect_error()); 
    }
    $person = $_SESSION["name"];
    echo($_SESSION["name"]);
    
    $sql = "DELETE FROM login WHERE username='$person';";
    
    if (mysqli_query($link, $sql)) {
        echo "New record created successfully";
        header("location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
    }
    mysqli_close($link);
}
?>

<html>

<head>
    <title>Confirm Delete</title>
    <link rel='icon' type='image/ico' href='images/favicon.ico'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel='stylesheet' href='CSS/user02CSS.css'>
    <style>
        body {
            background-image: url(images/deleteBg.jpg);
        }

        label {
            background-color: black;
            border-radius: 5px;
            margin: 5px;
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

    <center>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <h2>Confirm Delete Account</h2>
                <label>Are you sure?</label>
                <br>
                <input type="submit" class="btn btn-primary" value="Yes, Delete my Account">
            </div>
        </form>
    </center>

    <div id='footer' class='pull-down'>
    </div>

    <script src='https://code.jquery.com/jquery-3.4.1.min.js'></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src='JS/user02Java.js'></script>
    <script>
        $('#delete').addClass('active');

    </script>
</body>

</html>
