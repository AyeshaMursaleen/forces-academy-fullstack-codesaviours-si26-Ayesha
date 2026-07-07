<?php
session_start();

if (!isset($_SESSION['student_id'])) {
    header("Location: login.php");
    exit();
}

include 'config/db.php';

$student_name = $_SESSION['student_name'];

// Count total courses
$course_query = "SELECT COUNT(*) AS total_courses FROM courses";
$course_result = mysqli_query($conn, $course_query);
$course_data = mysqli_fetch_assoc($course_result);

$total_courses = $course_data['total_courses'];
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Student Dashboard | Forces Academy LMS</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
background:#eef3f9;
}

/* Navbar */

.navbar{
background:linear-gradient(90deg,#0F4C81,#2563EB);
padding:15px 30px;
box-shadow:0 5px 15px rgba(0,0,0,.15);
}

.navbar-brand{
font-size:26px;
font-weight:700;
}

/* Sidebar */

.sidebar{
background:#173A72;
min-height:100vh;
padding-top:25px;
}

.sidebar h5{
color:white;
text-align:center;
margin-bottom:25px;
font-weight:600;
}

.sidebar a{
display:block;
color:white;
padding:15px 25px;
text-decoration:none;
font-size:17px;
transition:.3s;
}

.sidebar a i{
width:25px;
}

.sidebar a:hover{
background:#2563EB;
padding-left:35px;
}

/* Content */

.content{
padding:35px;
}

/* Welcome Card */

.welcome{
background:linear-gradient(135deg,#2563EB,#1E40AF);
color:white;
padding:35px;
border-radius:20px;
box-shadow:0 10px 25px rgba(0,0,0,.15);
margin-bottom:35px;
}

.welcome h2{
font-weight:700;
}

.welcome p{
margin-top:10px;
font-size:16px;
}

/* Dashboard Cards */

.card{
border:none;
border-radius:18px;
padding:30px;
text-align:center;
box-shadow:0 10px 25px rgba(0,0,0,.08);
transition:.4s;
}

.card:hover{
transform:translateY(-8px);
}

.card i{
font-size:45px;
margin-bottom:15px;
color:#2563EB;
}

.card h4{
font-size:22px;
font-weight:600;
margin-bottom:10px;
color:#173A72;
}

.card p{
color:#666;
}

/* Footer */

.footer{
text-align:center;
margin-top:40px;
color:#777;
font-size:14px;
}

</style>

</head>

<body>

<nav class="navbar navbar-dark">
<div class="container-fluid">
<a class="navbar-brand" href="#">
<i class="fa-solid fa-graduation-cap"></i>
Forces Academy LMS
</a>
</div>
</nav>

<div class="container-fluid">

<div class="row">

<div class="col-lg-3 sidebar">

<h5>Student Panel</h5>

<a href="dashboard.php"><i class="fa-solid fa-house"></i> Dashboard</a>

<a href="courses.php"><i class="fa-solid fa-book-open"></i> My Courses</a>

<a href="assignments.php"><i class="fa-solid fa-file-lines"></i> Assignments</a>

<a href="results.php"><i class="fa-solid fa-chart-column"></i> My Results</a>

<a href="notices.php"><i class="fa-solid fa-bell"></i> Notices</a>

<a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>

</div>

<div class="col-lg-9 content">

<div class="welcome">

<h2>Welcome, <?php echo htmlspecialchars($student_name); ?> 👋</h2>

<p>We're happy to see you again. Continue your learning journey with Forces Academy LMS.</p>

</div>

<div class="row g-4">

<div class="col-md-6">

<div class="card">

<i class="fa-solid fa-book-open-reader"></i>

<h4>My Courses</h4>
<p>You are enrolled in <?php echo $total_courses; ?> courses.</p>

</div>

</div>

<div class="col-md-6">

<div class="card">

<i class="fa-solid fa-file-circle-check"></i>

<h4>Assignments</h4>

<p>No pending assignments.</p>

</div>

</div>

<div class="col-md-6">

<div class="card">

<i class="fa-solid fa-chart-line"></i>

<h4>Results</h4>

<p>Your results will appear here.</p>

</div>

</div>

<div class="col-md-6">

<div class="card">

<i class="fa-solid fa-bullhorn"></i>

<h4>Latest Notices</h4>

<p>No new notices available.</p>

</div>

</div>

</div>

<div class="footer">
© 2026 Forces Academy LMS | Student Dashboard
</div>

</div>

</div>

</div>

</body>
</html>