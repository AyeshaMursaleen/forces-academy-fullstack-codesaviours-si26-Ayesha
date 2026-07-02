<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forces Academy LMS</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins',sans-serif;
        }

        body{
            background:linear-gradient(135deg,#0F172A,#1D4ED8);
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            color:white;
        }

        .hero{
            background:rgba(255,255,255,0.12);
            backdrop-filter:blur(10px);
            padding:50px;
            border-radius:20px;
            text-align:center;
            width:90%;
            max-width:700px;
            box-shadow:0 10px 30px rgba(0,0,0,.3);
        }

        .logo{
            width:100px;
            height:100px;
            background:#fff;
            color:#1D4ED8;
            border-radius:50%;
            display:flex;
            justify-content:center;
            align-items:center;
            font-size:40px;
            font-weight:bold;
            margin:auto;
            margin-bottom:20px;
        }

        h1{
            font-weight:700;
            margin-bottom:15px;
        }

        p{
            font-size:18px;
            color:#E2E8F0;
            margin-bottom:35px;
        }

        .btn-custom{
            width:220px;
            padding:12px;
            font-size:18px;
            font-weight:600;
            border-radius:50px;
            margin:10px;
            transition:.3s;
        }

        .btn-login{
            background:white;
            color:#1D4ED8;
            border:none;
        }

        .btn-login:hover{
            background:#dbeafe;
        }

        .btn-register{
            border:2px solid white;
            color:white;
        }

        .btn-register:hover{
            background:white;
            color:#1D4ED8;
        }

        footer{
            margin-top:35px;
            color:#CBD5E1;
            font-size:14px;
        }
    </style>
</head>
<body>

<div class="hero">

    <div class="logo">
        LMS
    </div>

    <h1>Forces Academy LMS</h1>

    <p>
        Welcome to the Forces Academy Learning Management System.
        Register as a new student or login to access your dashboard,
        courses, assignments and results.
    </p>

    <a href="login.php" class="btn btn-login btn-custom">
        Student Login
    </a>

    <a href="register.php" class="btn btn-register btn-custom">
        Student Register
    </a>

    <footer>
        © 2026 Forces Academy LMS. All Rights Reserved.
    </footer>

</div>

</body>
</html>