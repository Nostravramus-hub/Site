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
        .form{
          width: 300px;
          padding: 40px;
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%,-50%);
          background: #000000;
          text-align: center;
        }
        .form h1{
          color: white;
          text-transform: uppercase;
          font-weight: 500;
        }
        .form input[type = "text"],.form input[type = "password"]{
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
        .form input[type = "text"]:focus,.form input[type = "password"]:focus{
          width: 280px;
          border-color: #2ecc71;
        }
        .textlogin{
          width: 300px;
          padding: 40px;
          position: absolute;
          top: 50%;
          left: 50%;
          color: #FFFFFF;
          transform: translate(-50%,-50%);
          background: #000000;
          text-align: center;
        }
        .form input[type = "submit"]{
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
        .form input[type = "submit"]:hover{
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
  


            </style>
</head>
<?php
    require('db.php');
    session_start();
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check if user exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to index page
            header("Location: pagina/index.html");
        } else {
            echo "
				<div class='textlogin'>
				<p>Incorrect Username/password.</h3>
                  <p>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
		</form>
	<form class="register" action="registration.php" method="get">
    <input type="submit" value="Register" name="Submit"/>
</form>

<?php
    }
?>
<body>
    <img src="pagina/pics/page_logo.png" class="center" >

</body>
</html>