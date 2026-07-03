<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Forces Academy LMS</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
background:linear-gradient(135deg,#1e3c72,#2a5298);
min-height:100vh;
color:white;
}

.navbar{
padding:20px 50px;
}

.navbar-brand{
font-size:28px;
font-weight:bold;
color:white !important;
}

.hero{
min-height:90vh;
display:flex;
align-items:center;
justify-content:center;
padding:40px;
}

.hero-box{
    background: rgba(255,255,255,0.12);
    backdrop-filter: blur(10px);
    border-radius: 25px;
    padding: 50px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.25);
}

.hero h1{
font-size:50px;
font-weight:700;
}

.hero p{
font-size:18px;
margin-top:20px;
line-height:1.8;
}

.btn-custom{
    padding:12px 30px;
    border-radius:30px;
    font-size:17px;
    font-weight:600;
    margin-right:15px;
    transition:0.3s;
}

.btn-custom:hover{
    transform: translateY(-3px);
}

.features{
margin-top:35px;
}

.features li{
list-style:none;
padding:8px 0;
font-size:18px;
}

.image img{
    width:100%;
    max-width:350px;
    height:auto;
}

footer{
text-align:center;
padding:20px;
color:white;
}

</style>

</head>

<body>

<nav class="navbar navbar-expand-lg">
<div class="container">
<a class="navbar-brand" href="#">🎓 Forces Academy LMS</a>
</div>
</nav>

<section class="hero">

<div class="hero-box">

<div class="row align-items-center">

<div class="col-lg-6">

<h1>Welcome to Forces Academy LMS</h1>

<p>
Welcome to the Forces Academy Learning Management System.
Register as a new student or log in securely to access your
account and begin your learning journey.
</p>

<a href="login.php" class="btn btn-light btn-custom">
    Student Login
</a>

<a href="register.php" class="btn btn-outline-light btn-custom">
    Student Register
</a>

<ul class="features">

<li>📚 Modern Learning Platform</li>

<li>👨‍🎓 Easy Student Management</li>

<li>🔐 Secure Login System</li>

<li>💻 Access Anytime, Anywhere</li>

</ul>

</ul>

</div>

<div class="col-lg-6 text-center image">

<img src="https://cdn-icons-png.flaticon.com/512/3135/3135755.png" alt="Student">

</div>

</div>

</div>

</section>

<footer>

© 2026 Forces Academy LMS | All Rights Reserved.

</footer>

</body>
</html>