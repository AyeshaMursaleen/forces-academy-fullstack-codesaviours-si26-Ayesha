<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Forces Academy LMS</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
background:linear-gradient(135deg,#071B46,#0B2F73,#1446A0);
color:#fff;
}

html{
scroll-behavior:smooth;
}
.navbar{
padding: 14px 32px;
}

.navbar-brand{
font-size:28px;
font-weight:700;
color:#fff!important;
}

.nav-link{
color:#fff!important;
margin:0 10px;
transition:.3s;
}

.nav-link:hover{
color:#F7C948!important;
}

.btn-login,
.btn-register{
padding:10px 24px;
border-radius:30px;
font-weight:600;
text-decoration:none;
transition:.3s;
}

.btn-login{
border:2px solid #F7C948;
color:#F7C948;
margin-right:10px;
}

.btn-login:hover{
background:#F7C948;
color:#071B46;
}

.btn-register{
background:#F7C948;
color:#071B46;
}

.btn-register:hover{
background:#fff;
}

.hero{
padding:70px 0;
}

.hero h1{
font-size:55px;
font-weight:700;
}

.hero p{
margin:20px 0 35px;
font-size:18px;
line-height:1.8;
color:#ddd;
}

.hero-btn{
display:inline-block;
padding:12px 28px;
border-radius:30px;
text-decoration:none;
font-weight:600;
margin-right:15px;
transition:.3s;
}

.login-student{
background:#F7C948;
color:#071B46;
}

.register-student{
border:2px solid #fff;
color:#fff;
}

.hero-btn:hover{
transform:translateY(-3px);
}

.hero img{
max-width:480px;
width:100%;
display:block;
margin:auto;
filter:drop-shadow(0 20px 30px rgba(0,0,0,.25));
animation:float 4s ease-in-out infinite;
}

@keyframes float{
0%{transform:translateY(0);}
50%{transform:translateY(-12px);}
100%{transform:translateY(0);}
}

.features{
padding:70px 0;
}
.feature-card{
background:rgba(255,255,255,.08);
padding:25px;
border-radius:18px;
text-align:center;
height:100%;
transition:.3s;
}

.feature-card:hover{
background:rgba(255,255,255,.15);
transform:translateY(-8px);
}

.icon{
font-size:40px;
margin-bottom:15px;
}

.feature-card h4{
font-weight:600;
margin-bottom:10px;
}

.feature-card p{
font-size:15px;
color:#ddd;
line-height:1.7;
}

footer{
    background:rgba(0,0,0,.25);
    padding:50px 0 30px;
    margin-top:60px;
    text-align:center;
    border-top:3px solid #F7C948;
}

footer h4{
    color:#fff;
    font-weight:700;
    margin-bottom:10px;
}

footer p{
    color:#ddd;
    margin:8px 0;
}

.footer-links{
    margin:20px 0;
}

.footer-links a{
    color:#F7C948;
    text-decoration:none;
    margin:0 15px;
    font-weight:500;
    transition:.3s;
}

.footer-links a:hover{
    color:#fff;
}
/* Section Heading */

.section-title{
    font-size:42px;
    font-weight:700;
    color:#fff;
    text-align:center;
    margin-bottom:40px;
    position:relative;
    display:inline-block;
}

.section-title::after{
    content:"";
    width:80px;
    height:4px;
    background:#FFD54F;
    position:absolute;
    left:50%;
    transform:translateX(-50%);
    bottom:-12px;
    border-radius:10px;
}
@media(max-width:991px){

.hero{
text-align:center;
padding:50px 0;
}

.hero h1{
font-size:40px;
}

.hero img{
max-width:300px;
margin-top:40px;
}

.hero-btn{
display:block;
width:230px;
margin:15px auto;
}

}


</style>

</head>

<body>

<nav class="navbar navbar-expand-lg">

<div class="container">

<a class="navbar-brand" href="#">🎓 Forces Academy LMS</a>

<button class="navbar-toggler bg-light" data-bs-toggle="collapse" data-bs-target="#menu">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="menu">

<ul class="navbar-nav mx-auto">

<li class="nav-item"><a class="nav-link" href="#">Home</a></li>
<li class="nav-item"><a class="nav-link" href="#about">About</a></li>
<li class="nav-item"><a class="nav-link" href="#features">Features</a></li>
<li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
</ul>

<a href="login.php" class="btn-login">Login</a>
<a href="register.php" class="btn-register">Register</a>

</div>

</div>

</nav>

<section class="hero">

<div class="container">

<div class="row align-items-center">

<div class="col-lg-6">

<h1>Welcome to<br>Forces Academy LMS</h1>

<p>
Welcome to the Forces Academy Learning Management System.
Register as a new student or log in to access your dashboard and continue your learning journey.
</p>

<a href="login.php" class="hero-btn login-student">👤 Student Login</a>

<a href="register.php" class="hero-btn register-student">📝 Student Register</a>

</div>

<div class="col-lg-6 text-center">
<img src="https://cdn-icons-png.flaticon.com/512/3135/3135755.png" alt="Student Study Illustration">
</div>

</div>
<!-- Features -->

<div class="features">

<div class="row g-4">

<div class="col-md-6 col-lg-3">

<div class="feature-card">

<div class="icon">📚</div>

<h4>Online Learning</h4>

<p>Learn anytime with an easy and modern online learning platform.</p>

</div>

</div>

<div class="col-md-6 col-lg-3">

<div class="feature-card">

<div class="icon">👨‍🎓</div>

<h4>Student Portal</h4>

<p>Manage your profile, attendance and academic information easily.</p>

</div>

</div>

<div class="col-md-6 col-lg-3">

<div class="feature-card">

<div class="icon">🔒</div>

<h4>Secure Login</h4>

<p>Your personal information is protected with a secure login system.</p>

</div>

</div>

<div class="col-md-6 col-lg-3">

<div class="feature-card">

<div class="icon">💻</div>

<h4>Any Device</h4>

<p>Access the LMS from desktop, laptop, tablet or mobile anytime.</p>

</div>

</div>

</div>

</div>

</div>

</section>

<section id="about" class="py-5">

<div class="container text-center">

<div class="text-center">
    <h2 class="section-title">About Us</h2>
</div>

<p class="mt-3">
Forces Academy LMS is an online learning management system that helps
students access courses, assignments, results, and notices anytime.
Our goal is to provide a simple, secure, and modern learning experience.
</p>
</div>
</section>
<!-- Features Section Start -->

<section id="features" class="py-5">

<div class="container">

<div class="text-center mb-5">
    <h2 class="section-title">Features</h2>
</div>

<div class="row text-center">

<div class="col-md-4">

<h3>📚</h3>

<h5>Online Courses</h5>

<p>Access your study material anytime.</p>

</div>

<div class="col-md-4">

<h3>📝</h3>

<h5>Assignments</h5>

<p>Submit assignments easily through LMS.</p>

</div>

<div class="col-md-4">

<h3>📊</h3>

<h5>Results</h5>

<p>Check your academic results online.</p>

</div>

</div>

</div>

</section>

<!-- Features Section End -->
 <!-- Contact Section Start -->

<section id="contact" class="py-5">

<div class="container text-center">

<div class="text-center mb-5">
    <h2 class="section-title">Contact Us</h2>
</div>

<p><strong>Email:</strong> info@forcesacademy.com</p>

<p><strong>Phone:</strong> +92 300 1234567</p>

<p><strong>Address:</strong> Lahore, Pakistan</p>

</div>

</section>

<!-- Contact Section End -->
<footer>

<div class="container text-center">

<hr style="border:1px solid rgba(255,255,255,0.2); margin-bottom:30px;">

<h4>🎓 Forces Academy LMS</h4>

<p>Empowering Students Through Modern Learning</p>

<div class="footer-links">
    <a href="#">Home</a>
    <a href="#about">About</a>
    <a href="#contact">Contact</a>
</div>

<p class="mt-4">
    © 2026 Forces Academy LMS. All Rights Reserved.
</p>

<p>
    Developed by <strong>Ayesha Mursaleen</strong>
</p>

</div>

</footer>