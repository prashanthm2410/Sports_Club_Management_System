<?php
session_start();
if(isset($_SESSION["user_data"]))
{
	header("location:./dashboard/admin/");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Sports Club Management</title>
  <link href="https://fonts.googleapis.com/css2?family=Alumni+Sans+Collegiate+One&family=Cookie&family=Dancing+Script&family=Kalam:wght@700&family=Sacramento&family=Vina+Sans&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Alumni+Sans+Collegiate+One&family=Cookie&family=Dancing+Script&family=Kalam:wght@700&family=Sacramento&family=Vina+Sans&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Alumni+Sans+Collegiate+One&family=Cookie&family=Dancing+Script&family=Ephesis&family=Kalam:wght@700&family=Sacramento&family=Vina+Sans&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      background: url(./images/1559273318phpkS54ZX.jpeg) center/cover no-repeat;
      position: relative;
      overflow: hidden;
    }

    body::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      backdrop-filter: blur(3px);
    }

    .login-container {
      border-radius: 25px;
      overflow: hidden;
      height: 550px;
      width: 350px;
      max-width: 650px;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
      font-size: 20px;
      color: rgb(0, 0, 0); /* Updated text color */
      padding: 20px;
    }

    .login-header {
      font-family: 'Dancing Script', cursive;
      font-family: 'Kalam', cursive;
      font-family: 'Sacramento', cursive;
      font-family: 'Vina Sans', sans-serif;; /* Updated text color */
      text-align: center;
      position: relative;
      padding: 0.5em 1em; /* Adjusted padding */
      font-family: 'Vina Sans', sans-serif;
      font-size: 36px; /* Increased font size */
      margin-bottom: 20px; /* Adjusted space between elements */
      text-shadow: 0 0 5px rgb(255, 255, 255); /* Added white shadow */
      letter-spacing: 2px; /* Increased letter-spacing */
    }

    .login-header h2 {
      margin: 0;
      line-height: 1; /* Reduced line height */
    }

    input {
      width: calc(100% - 22px); /* Adjust width to include border */
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #000000; /* Add a border */
      border-radius: 8px;
      background: rgb(255, 251, 251); /* Changed background color to white */
      box-sizing: border-box;
      outline: none;
      color: #000000; /* Adjust text color */
      letter-spacing: 1px; /* Added letter-spacing */
    }

    input[type="password"] {
      color: transparent; /* Hides the password text */
      text-shadow: 0 0 0 #000000; /* Makes the text shadow blend with the background */
    }

    button {
      background: orange;
      color: rgb(0, 0, 0);
      padding: 10px 20px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      width: 100%;
      transition: background 0.3s;
      font-size: 24px;
    }

    button:hover {
      background: #f4f4f4;
    }

    .login-buttons {
      display: flex;
      justify-content: space-between;
      margin-bottom: 1px;
    }

    .login-buttons button {
      width: calc(50% - 10px);
    }

    #error-message {
      color: rgb(0, 0, 0);
      display: none;
    }

    .login-content {
      margin-bottom: 20px; /* Space between elements */
    }

    .login-bottom-links {
      margin-top: 20px; /* Space from top */
    }

    .copy-right {
      font-size: 17px; /* Font size */
      color: #000000; /* Color */
    }

    .input-group {
      display: flex;
      flex-direction: column;
    }

    .input-group label {
      color: #000000; /* Adjust label color */
      font-weight: bold; /* Bold label text */
      margin-bottom: 5px; /* Adjust space between label and input */
      font-family: 'Dancing Script', cursive;
    }
  </style>
</head>

<body>
  <header>
    <div class="login-container">
      <div class="logo"></div>
      <div class="login-header">
        <h2>JSS SPORTS CLUB</h2>
      </div>
      <div class="login-form">
        <div class="login-content">
          <form action="secure_login.php" method='post' id="bb">
            <div class="form-group">
              <div class="input-group">
                <label for="textfield">User ID</label>
                <input type="text" placeholder="eg:TEXT" class="form-control" name="user_id_auth" id="textfield" data-rule-minlength="6" data-rule-required="true">
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <label for="pwfield">Password</label>
                <input type="password" name="pass_key" id="pwfield" class="form-control" data-rule-required="true" data-rule-minlength="6" placeholder="eg:12345678">
              </div>
            </div>
            <div class="form-group">
              <button type="submit" name="btnLogin" class="btn btn-primary">
                LOGIN
                <i class="entypo-login"></i>
              </button>
            </div>
          </form>
          <div class="login-bottom-links">
            <a href="forgot_password.php" class="link">Forgot your password?</a>
          </div>
        </div>
      </div>
      <div class="copy-right">
        ©2023 SPORTS CLUB MANAGEMENT SYSTEM
      </div>
    </div>
  </header>
</body>

</html>