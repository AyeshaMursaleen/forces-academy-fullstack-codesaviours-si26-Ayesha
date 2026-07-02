<?php
session_start();

if (!isset($_SESSION['student_id'])) {
    header("Location: login.php");
    exit();
}

$student_name = $_SESSION['student_name'];
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Student Dashboard | Forces Academy LMS</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Poppins,sans-serif;
}

body{
background:#f5f7fb;
}

.navbar{
background:#1E3A8A;
}

.navbar-brand{
font-weight:bold;
font-size:24px;
}

.sidebar{
background:#163172;
height:100vh;
padding-top:20px;
}

.sidebar a{
display:block;
color:white;
padding:15px 20px;
text-decoration:none;
font-size:17px;
}

.sidebar a:hover{
background:#2563EB;
}

.content{
padding:30px;
}

.card{
border:none;
border-radius:15px;
box-shadow:0 5px 15px rgba(0,0,0,.1);
transition:.3s;
}

.card:hover{
transform:translateY(-5px);
}

.card h4{
color:#1E3A8A;
font-weight:600;
}

.welcome{
background:white;
padding:20px;
border-radius:15px;
margin-bottom:30px;
box-shadow:0 5px 15px rgba(0,0,0,.1);
}

</style>

</head>

<body>

<nav class="navbar navbar-dark">
<div class="container-fluid">
<a class="navbar-brand" href="#">Forces Academy LMS</a>
</div>
</nav>

<div class="container-fluid">

<div class="row">

<div class="col-md-3 sidebar">

<a href="#">🏠 Dashboard</a>

<a href="#">📚 My Courses</a>

<a href="#">📝 Assignments</a>

<a href="#">📊 Results</a>

<a href="#">📢 Notices</a>

<a href="logout.php">🚪 Logout</a>

</div>

<div class="col-md-9 content">

<div class="welcome">

<h2>Welcome, <?php echo htmlspecialchars($student_name); ?> 👋</h2>

<p>Welcome to the Forces Academy Learning Management System.</p>

</div>

<div class="row">

<div class="col-md-6 mb-4">

<div class="card p-4">

<h4>📚 My Courses</h4>

<p>You are enrolled in 0 courses.</p>

</div>

</div>

<div class="col-md-6 mb-4">

<div class="card p-4">

<h4>📝 Assignments</h4>

<p>No pending assignments.</p>

</div>

</div>

<div class="col-md-6 mb-4">

<div class="card p-4">

<h4>📊 Results</h4>

<p>Your results will appear here.</p>

</div>

</div>

<div class="col-md-6 mb-4">

<div class="card p-4">

<h4>📢 Notices</h4>

<p>No latest notices.</p>

</div>

</div>

</div>

</div>

</div>

</div>

</body>

</html>