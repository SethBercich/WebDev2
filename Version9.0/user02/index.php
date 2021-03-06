<?php
require_once "./config/config.php";
session_start();

$_SESSION["loggedin"] = false; //Yea
$_SESSION["id"] = '';
$_SESSION["name"] = '';
$_SESSION["personType"] = '';

$noErrors = true;

if($_SERVER["REQUEST_METHOD"] == "POST"){//Check it is coming from a form    	
	//delcare PHP variables
	$firstName = $_POST["name"];
    $personType = $_POST["personType"];
	$postButton = $_POST["submit"]; 
    $userError = $typeError = "";
    
    if($link === false){
        die("ERROR: Could not connect to server. " . mysqli_connect_error());
    }
    
    if(empty($firstName)){
        $userError = "Please enter your name!";
        $noErrors = false;
    }
    
    if(empty($personType)){
        $typeError = "Please select what you are!";
        $noErrors = false;
    }
    
    if($noErrors) { //If there are no errors
    $sql = "INSERT INTO login (username, personType) VALUES (?, ?)";
    //$sql = "SELECT id FROM login WHERE username = ?";
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_personType);
        
        $param_username = trim($firstName);
        $param_personType = trim($personType);
        
        if(mysqli_stmt_execute($stmt)){
            //mysqli_stmt_store_result($stmt); // Well it doesnt work anymore 
            echo "Success!";
            
            //if(mysqli_stmt_num_rows($stmt) > 0){ //It was supposed to get all of the id where username = ?, which means it would get 1 if it exists
                //$sql2 = "UPDATE login SET login.personType='$param_personType' WHERE login.username='$param_username'";
                //if ($link->query($sql2) === TRUE) { // Yea
                  //  echo "Record updated successfully";
                //} else {
                  //  die("ERROR, NOT RIGHT: $sql2");
                //}
            }
        }
        
        $_SESSION["loggedin"] = true;
        //$_SESSION["id"] = $id; // This doesnt work
        $_SESSION["name"] = $param_username;
        $_SESSION["personType"] = $param_personType;

        echo "<script>
        console.log('Success!');
        </script>";
        
        header("location: home.php"); //Since the session variables are set, the stmt is executing, supposively
    } else{
        echo "<script>
        console.log('Failed!');
        </script>";
        
        mysqli_error($link);
    }
        
        mysqli_stmt_close($stmt); //Close statement
        mysqli_close($link); //Close connection
    }
?>

<html>

<head>
    <title>Vibing Login</title>
    <link rel='icon' type='image/ico' href='images/favicon.ico'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='CSS/user02CSS.css'>

    <style>
        body {
            background-image: url(images/loginBg.jpeg);
        }

        .help-block {
            color: red;
        }

    </style>
</head>

<body>
    <div class='bodyStuff'>
        <h1>Please enter your Name and What You Are</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($userError)) ? 'has-error' : ''; ?>">
                <label>Your name:</label>
                <input type="text" name="name" class="form-control" value="<?php echo $firstName; ?>" />
                <p class="help-block"><?php echo $userError; ?></p>
            </div>

            <div class="form-group <?php echo (!empty($typeError)) ? 'has-error' : ''; ?>">
                <label for='personType'>What are you?: </label>
                <select id="personType" name="personType">
                    <option value=""></option>
                    <option value="Student">Student</option>
                    <option value="Teacher">Teacher</option>
                    <option value="Other">Other</option>
                </select>
                <p class="help-block"><?php echo (!empty($typeError)) ? $typeError : ''; ?></p>
            </div>

            <div class="form-group">
                <input name="submit" type="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>
    </div>
    <script src='https://code.jquery.com/jquery-3.4.1.min.js'></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="JS/user02Java.js"></script>
</body>

</html>
