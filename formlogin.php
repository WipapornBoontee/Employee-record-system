<?php
include 'condb.php';
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            width: 100vw;
            height: 100vh;
            overflow: hidden;
        }

        body {
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            background-position: top;
            background-image: url(https://i.pinimg.com/564x/36/b5/f7/36b5f70e1acdbd07b3599e006a6ad022.jpg);
            background-color: #5f605f;
            font-family: Arial, Helvetica, sans-serif;
            letter-spacing: 0.02em;
            font-weight: 400;
            image-rendering: -webkit-optimize-contrast;
            image-rendering: crisp-edges;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .blurred-box {
            position: fixed;
            width: 90%;
            max-width: 350px;
            height: 500px;
            background: inherit;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 2px 4px 4px rgba(0, 0, 0, 0.2), 0 6px 20px rgba(0, 0, 0, 0.19);
        }

        .blurred-box::after {
            content: '';
            width: 100%;
            height: 100%;
            background: inherit;
            position: absolute;
            left: 0;
            top: 0;
            box-shadow: inset 0 0 0 200px rgba(255, 255, 255, 0.1);
            filter: blur(10px);
        }

        .header-text {
            position: absolute;
            top: 60px;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            font-size: 1.5em;
            font-weight: bold;
            color: #252423;
            z-index: 1;
            text-shadow: 2px 0px 3px rgba(0, 0, 0, 0.5);

        }

        .user-login-box {
            position: relative;
            margin-top: 30px;
            text-align: center;
            z-index: 1;
        }

        .user-login-box>* {
            display: inline-block;
            width: 80%;
            max-width: 250px;
        }

        .user-icon {
            width: 100px;
            height: 100px;
            position: relative;
            border-radius: 50%;
            background-size: contain;
            background-image: url(https://cdn-icons-png.flaticon.com/256/10738/10738701.png);
            margin: 0 auto;
        }

        .user-name {
            margin-top: 15px;
            margin-bottom: 15px;
            color: #fff;
        }

        input.user-username,
        input.user-password {
            display: block;
            width: 100%;
            height: 25px;
            opacity: 0.8;
            border-radius: 5px;
            padding: 15px 15px;
            border: none;
            margin: 10px auto;
            outline: none;
        }

        .login-button {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #45a049;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .login-button:hover {
            background-color: #373533;
        }
    </style>

</head>

<body>

    <p class="header-text">Employee record system</p>
    <div class="blurred-box">
        <form action="checklogin.php" method="post">
            <div class="user-login-box">
                <span class="user-icon"></span>
                <div class="user-name" style="color: #212F3D;">Administrator</div>
                <input type="text" class="user-username" placeholder="Username" name="username">
                <input type="password" class="user-password" placeholder="Password" name="password">
                <button class="login-button">Login</button>
            </div>
        </form>
    </div>

</body>

</html>