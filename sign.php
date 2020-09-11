<?php 
session_start();
include('functions.php');
    $user = "";
    $pass = "";
  if(!isset($_SESSION['uname'])){

  if(isset($_POST['btnSubmit'])){

    $lname = $_POST['lname'];
    $fname = $_POST['fname'];
    $cont = $_POST['cont'];
    $email = $_POST['email'];
    $username = $_POST['uname'];
    $password = $_POST['password'];
    $conf = $_POST['conf'];
   
  if($lname!="" && $fname!="" && $cont!="" && $email!="" && $username!="" && $password!="" && $conf!=""){

        if($password == $conf){

          $password = md5($password); //hash before storing for security purposes

          if (userExist($username)) {
            echo "<div class='alert alert-info'><strong>Username already exists!</strong></div>";
          }else{
            if(registerUser($lname,$fname,$cont,$email,$username,$password))
            header('location:homepage.php?m=Session logged in');
            else echo "<div>REGISTRATION FAILED! PLEASE TRY AGAIN!</div>";
          }

        }else echo "<div class='alert alert-info'><strong>Password did not match</strong></div>"; 
    }else echo "<div> Fields must not be empty </div>";
  } 
  ?>
<!DOCTYPE html>
<html>
<head>
<title>Vehiquo-Sign in</title>
<!--
        CAPSTONE PROJECT 42
        GROUP: TEAM KEMB
        AUTHOR: KEANU SEAN GOMEZ
        DATE: 08/01/20   
    -->
<link rel="stylesheet" href="css/w3.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="styles.css"> 
<link rel="stylesheet" href="sign.css">

</head>

<style>
  input[type="button"] {
    background: #4caf50;
    border: 0;
    cursor: pointer;
    color: #fff;
    
}
 
  </style>

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
    <div class="form-wrap">
    <form>
      <h1>Register</h1>
      <input name="fname" type="text" placeholder="Firstname" >
      <input name="lname" type="text" placeholder="Lastname" >
      <input name="cont" type="text" placeholder="Contact number"> 
      <input name="email" type="email" placeholder="Email" >
      <input name="uname" type="text" placeholder="Username" >
      <input name="password" type="password" placeholder="Password" >
      <input name="conf" type="password" placeholder="Confirm Password">
      <input type="button" value="Sign Up">
      
      
    </form>
</div>

<footer>
               <div class="footer">
                <p>2020 © VEHIQUO All Rights Reserved</p>
              </div>
</footer>
</body>
</html> 
<?php } else {
  header('location:homepage.php?m=Session logged in');
}?>