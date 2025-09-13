<?php
    require_once "app/Login.php";
    $page = 'login';

    if (isset($_POST['tombol'])) {
        $a = new App\Login();
        $a->login();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - SB Admin</title>
    <link href="assets/css/styles.css" rel="stylesheet" />
    <script src="assets/js/font-awsome-6-1.0.js" crossorigin="anonymous"></script>
    <style>
        /* General Page Styling */
        body {
            background: url('assets/img/bc-login.jpeg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Arial', sans-serif;
            color: #ffffff;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Card Styling */
        .card {
            background: rgba(255, 255, 255, 0.8);
            border: none;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 6px 30px rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(10px); /* Blur effect for background */
            width: 100%;
            max-width: 400px;
        }

        /* Header Styling */
        .card-header {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: #fff;
            text-align: center;
            padding: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .card-header img {
            width: 100px;
            height: 100px;
            margin-bottom: 10px;
            border-radius: 50%;
        }

        h3 {
            margin: 0;
            font-size: 22px;
        }

        /* Form Input Styling */
        .form-control {
            border-radius: 30px;
            padding: 15px 20px;
            border: 1px solid #d1d3e2;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .form-control:focus {
            border-color: #6a11cb;
            box-shadow: 0 0 0 0.2rem rgba(106, 17, 203, 0.25);
        }

        /* Button Styling */
        .btn-primary {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            border: none;
            border-radius: 30px;
            color: #fff;
            font-size: 16px;
            padding: 12px 20px;
            transition: all 0.3s ease;
            text-transform: uppercase;
        }

        .btn-primary:hover {
            background: linear-gradient(to right, #2575fc, #6a11cb);
            transform: translateY(-3px);
            box-shadow: 0 4px 10px rgba(106, 17, 203, 0.4);
        }

        /* Footer Styling */
        footer {
            margin-top: 10px;
            font-size: 12px;
            color: #6c757d;
            text-align: center;
        }

        footer small {
            color: #495057;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .card {
                margin: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="card-header">
            <img src="assets/img/login-bg.png" alt="Login Logo">
            <h3>Welcome Back</h3>
        </div>
        <div class="card-body">
            <form action="login.php" method="POST">
                <input class="form-control" id="inputEmail" type="text" name="user" placeholder="Username" required />
                <input class="form-control" id="inputPassword" type="password" name="pass" placeholder="Password" required />
                <button class="btn btn-primary btn-block" name="tombol">Login</button>
            </form>
        </div>
        <footer>
            <small>© 2025 Your Company. All rights reserved.</small>
        </footer>
    </div>
    <script src="assets/js/bootstrap.js" crossorigin="anonymous"></script>
</body>

</html>
