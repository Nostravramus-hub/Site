<!DOCTYPE html>
<html>
<head>
    <title>GammoSocial</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="pagina/pics/head_logo.png" />
    <style>
        img {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        body {
            background-color: black;
        }
        body{
     margin: 0;
      padding: 0;
      font-family: sans-serif;
      background: #000000;
    }
    
    .box{
      width: 300px;
      padding: 40px;
      position: absolute;
      top: 65%;
      left: 50%;
      transform: translate(-50%,-50%);
      background: #000000;
      text-align: center;
    }
    .box h1{
      color: white;
      text-transform: uppercase;
      font-weight: 500;
    }
    .box input[type = "text"],.box input[type = "password"]{
      border:0;
      background: none;
      display: block;
      margin: 20px auto;
      text-align: center;
      border: 2px solid #3498db;
      padding: 14px 10px;
      width: 200px;
      outline: none;
      color: white;
      border-radius: 24px;
      transition: 0.25s;
    }
    .box input[type = "text"]:focus,.box input[type = "password"]:focus{
      width: 280px;
      border-color: #2ecc71;
    }
    .box input[type = "submit"]{
      border:0;
      background: none;
      display: block;
      margin: 20px auto;
      text-align: center;
      border: 2px solid #2ecc71;
      padding: 14px 40px;
      outline: none;
      color: white;
      border-radius: 24px;
      transition: 0.25s;
      cursor: pointer;
    }
    .box input[type = "submit"]:hover{
      background: #2ecc71;
    }

    .register{
      width: 300px;
      padding: 40px;
      position: absolute;
      top: 83%;
      left: 50%;
      transform: translate(-50%,-50%);
      background: #000000;
      text-align: center;
    }
    .register input[type = "submit"]{
      border:0;
      background: none;
      display: block;
      margin: 20px auto;
      vertical-align: text-top;
      border: 2px solid #2ecc71;
      padding: 14px 40px;
      outline: none;
      color: white;
      border-radius: 24px;
      transition: 0.25s;
      cursor: pointer;
    }
    .register  input[type = "submit"]:hover{
      background: #2ecc71;
    }
     .textcolor1 {
     color: white;
     margin-left: 40%;
     }
      .textcolor2{
     color: white;
     margin-left: 45%;
     }
      .textcolor3{
     color: white;
     margin-left: 10%;
     }
    </style>
    </head>
<body>
<div class="pagelogo">
<img src="pagina/pics/page_logo.png" >
<?php
require ('db.php');
if (isset($_REQUEST['username']))
{
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($con, $username);
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con, $email);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con, $password);
    $passwordCheck = stripslashes($_REQUEST['passwordCheck']);
    $passwordCheck = mysqli_real_escape_string($con, $passwordCheck);
    $queryUser = "SELECT * FROM users WHERE username = '$username'";
    $queryEmail = "SELECT * FROM users WHERE email = '$email'";
    $result1 = mysqli_query($con, $queryUser) or die(mysql_error());
    $rows1 = mysqli_num_rows($result1);
    $result2 = mysqli_query($con, $queryEmail) or die(mysql_error());
    $rows2 = mysqli_num_rows($result2);

    if ($rows1 != 0)
    {
        $ckuser = 'Username already used';
        echo "	<div class='textlogin'>
            <p style=\"color: white ;margin-left:44%\">$ckuser</p>";
    }
    else if ($rows2 != 0)
    {
        $ckemail = 'Email already used';
        echo "<p style=\"color: white ;margin-left:45%\">$ckemail</p>";
    }
    else if ($password != $passwordCheck)
    {
        $text = 'Passwords do not match';
        echo "<p style=\"color: white ;margin-left:44%\">$text</p>";
    }
    else
    {
        $create_datetime = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (username, email, password, create_datetime)
                     VALUES ('$username', '$email','" . md5($password) . "',  '$create_datetime')";
        $result = mysqli_query($con, $query);
        header("Location: login.php");

    }
}

?>
      <form class="box" method="post">
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="text" class="login-input" name="email" placeholder="Email address"  pattern="[^@\s]+@[^@\s]+\.[^@\s]+" required>
        <input type="password" class="login-input" name="password" placeholder="Password" required>
        <input type="password" class="login-input" name="passwordCheck" placeholder="Confirm password" required>
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="textcolor3">Already have an account? 
          <a href="login.php">Login here
            </a>
          </p>
      </form>
    </div>
  </body>
</html>