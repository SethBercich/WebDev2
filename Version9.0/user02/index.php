<?php
require_once "./config/config.php";
//processStudentLogin.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {//Check it is coming from a form    	
	//delcare PHP variables
	$firstName = $_POST["name"];
    $personType = $_POST["personType"];
	$postButton = $_POST["givePass"];
    $userError = $typeError = "";
	
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    
    if(empty(trim($firstName))){
        $userError = "Please enter your name"
    }
    
    $sql = "INSERT INTO login (username, personType) VALUES (?, ?)";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_personType);
        
        $param_username = trim($firstName);
        $param_personType = trim($personType);
        mysqli_stmt_execute($stmt);
        
        echo "<script>
        console.log('Success!');
        </script>";
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
    <div class='menu'>
    </div>
</head>

<body>
    <div class='container'>
        <h1>Please enter your Name and What You Are</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($userError)) ? 'has-error' : ''; ?>">
                <label>Your name:</label>
                <input type="text" name="name" class="form-control" value="<?php echo $username; ?>" />
                <span class="help-block"><?php echo $userError; ?></span>
            </div>

            <label for='personType'>What are you?: </label>
            <select id="personType" name="personType">
                <option value="Student">Student</option>
                <option value="Teacher">Teacher</option>
                <option value="Other">Other</option>
            </select>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>
    </div>
</body>

</html>
