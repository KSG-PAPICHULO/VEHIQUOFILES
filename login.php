<?php
session_start();
include('functions.php');
    $user = "";
    $pass = "";
  if(!isset($_SESSION['uname'])){
   
  if(isset($_POST['btnlogin']))
  {
    $user = trim($_POST["username"]);
    $pass = trim($_POST["password"]);
    if($user != "" && $pass != "")
    {
      $users = login($user, $pass);
      if($users["username"] == $user && $users["password"] == $pass)
      {
        $_SESSION['id'] = $users["uid"];
        $_SESSION['firstname'] = $users["fname"];
        $_SESSION['lastname'] = $users["lname"];
        $_SESSION['username'] = $users["uname"];
        header("location:homepage.php");
        
      }
      else
      {
        $mess = "<div class='alert alert-danger'><strong>Invalid Credentials!</strong></div";
      }
    }
    else
    {
      $mess = "<div class='alert alert-danger'><strong>ALL fields are required!</strong></div";
    }

  }

?>

<!DOCTYPE html>
  <html>
    <head>
      <title>V E H I Q U O</title>
      <!--
        CAPSTONE PROJECT 42
        GROUP: TEAM KEMB
        AUTHOR: KEANU SEAN GOMEZ
        DATE: 08/01/20   
    -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,300&display=swap" rel="stylesheet">   
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="login.css">
      </head>
  <body> 
    <!--KSG-->
    <nav>
        <div class="logo">
            <h4>Vehiquo</h4>
        </div>
        <ul class="nav-links">
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>
            <li>
                <a href="about.html">About</a>
                <ul>
                    <li><a href="ourteam.html">Our Team</a></li>
                </ul>
            </li>
            <li>
                <a href="login.php">Log In</a>
                <ul>
                    <li><a href="sign.php">Sign Up</a></li>
                </ul>
            </li>
        </ul>
    </nav>
<!--KSG-->
<div class="login-box">
<h1>Login</h1>
<div class="textbox">
  <input type="text" placeholder="Username" name="" value="">
</div>

<div class="textbox">
  <input type="password" placeholder="Password" name="" value="">
</div>

<input class="btn" type="button" name="" value="Sign in">
</div>

       </div>
    </div>
  </footer>

  </body>
</html> 

<?php } else header("location:homepage.php");?>