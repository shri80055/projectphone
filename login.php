
<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: welcome.php");
  exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>

<html>
    <head>

        <title>login form</title>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">        
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
        <link href="bootstrap.min.css">
        <style type="text/css">
            .navbar-nav
            {
                list-style: none;
            }
            .navbar-nav li 
            {
                display: inline;
                margin: 0 1px;
            }
            .navbar-nav li a
            {
                display: inline-block;
                text-transform: uppercase;
                text-decoration: none;
                line-height: 20px;
                margin: 5px 25px;
            }
            .mobile-name li a
            {
              text-decoration: none;
              color: bisque;
            }
            .hello 
            {
                text-decoration: none;
                color: black;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <center>
              
                <h1><a class="navbar-brand" href="#">Phone Finder</a></h1>
            </center>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button class="navbar-togger" type="button" data-toggle="collapse" data-target="#navbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                          <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="news.html">news</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="tranding.html">tranding</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.html">login</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">admin</a>
                          </li>
                      </ul>
                </div>
            </nav><br>
            <center>
                <h2 class="display-5">Login Here</h2><br>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <label class="text-monospace" for="#usertext">Username</label>&nbsp;&nbsp;
                    <input type="text" class="col-sm-4" id="usertext" placeholder="Enter Username" value="<?php echo $username; ?>"><br>
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <label class="text-monospace" for="#passtext">Password</label>&nbsp;&nbsp;
                    <input type="password" class="col-sm-4" id="passtext" placeholder="Enter Password">
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>
                <div class="col-sm-10 ">
                <button type="submit" class="btn btn-primary" value="login">login</button>
                <button type="cancle" class="btn btn-secondary">cancle</button>
                </div>
            </form>
            <a class="hello" href="register.php">Create <span class="badge badge-primary">New</span> Account</a>
        </center><br>
        
          


        </div>
    </body>
</html>