<?php
require_once "auth.php";
require_once "../config/db.php";
/** @var mysqli $conn */

// Total Students
$students = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM students"))['total'];

// Total Courses
$courses = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM courses"))['total'];

// Total Assignments
$assignments = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM assignments"))['total'];

// Total Notices
$notices = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM notices"))['total'];
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Admin Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial, Helvetica, sans-serif;
}

body{
background:#f4f7fc;
}

/* Sidebar */

.sidebar{
position:fixed;
left:0;
top:0;
width:250px;
height:100vh;
background:#0f172a;
padding-top:20px;
}

.sidebar h3{
color:#fff;
text-align:center;
margin-bottom:30px;
font-weight:bold;
}

.sidebar a{
display:block;
color:#cbd5e1;
padding:15px 25px;
text-decoration:none;
font-size:17px;
transition:.3s;
}

.sidebar a i{
margin-right:10px;
width:25px;
}

.sidebar a:hover{
background:#2563eb;
color:#fff;
padding-left:35px;
}

.sidebar .active{
background:#2563eb;
color:#fff;
}

/* Main */

.main{
margin-left:250px;
}

/* Navbar */

.topbar{
height:70px;
background:#fff;
display:flex;
justify-content:space-between;
align-items:center;
padding:0 30px;
box-shadow:0 2px 10px rgba(0,0,0,.1);
}

.topbar h4{
margin:0;
font-weight:bold;
}

.logout-btn{
background:#dc3545;
color:#fff;
padding:10px 18px;
text-decoration:none;
border-radius:8px;
transition:.3s;
}

.logout-btn:hover{
background:#bb2d3b;
color:#fff;
}

/* Content */

.content{
padding:30px;
}

.welcome{
background:linear-gradient(135deg,#2563eb,#0ea5e9);
color:#fff;
padding:30px;
border-radius:20px;
margin-bottom:30px;
box-shadow:0 10px 25px rgba(0,0,0,.15);
}

.card-box{
border:none;
border-radius:18px;
padding:30px;
background:#fff;
box-shadow:0 5px 20px rgba(0,0,0,.08);
transition:.3s;
height:100%;
}

.card-box:hover{
transform:translateY(-8px);
}

.card-box i{
font-size:45px;
margin-bottom:15px;
}

.students{
color:#2563eb;
}

.courses{
color:#16a34a;
}

.assignments{
color:#f59e0b;
}

.notices{
color:#ef4444;
}

.count{
font-size:38px;
font-weight:bold;
}

.title{
font-size:18px;
color:#666;
}

</style>

</head>

<body>

<!-- Sidebar -->

<div class="sidebar">

<h3>Forces LMS</h3>

<a href="dashboard.php" class="active">
<i class="fa-solid fa-house"></i>
Dashboard
</a>

<a href="students.php">
<i class="fa-solid fa-users"></i>
Students
</a>

<a href="courses.php">
<i class="fa-solid fa-book"></i>
Courses
</a>

<a href="Assignments.php">
<i class="fa-solid fa-file-lines"></i>
Assignments
</a>

<a href="notices.php">
<i class="fa-solid fa-bullhorn"></i>
Notices
</a>

<a href="results.php">
<i class="fa-solid fa-chart-column"></i>
Results
</a>

<a href="logout.php">
<i class="fa-solid fa-right-from-bracket"></i>
Logout
</a>

</div>

<div class="main">

<div class="topbar">

<h4>
Welcome,
<?php echo $_SESSION['admin_username']; ?>
</h4>

<a href="logout.php" class="logout-btn">
Logout
</a>

</div>

<div class="content">

<div class="welcome">

<h2>Admin Dashboard</h2>

<p>
Welcome to Forces Academy LMS Administration Panel.
Manage Students, Courses, Assignments, Notices and Results from one place.
</p>

</div>

<div class="row g-4">
    <div class="col-md-3">

<div class="card-box text-center">

<i class="fa-solid fa-users students"></i>

<div class="count">
<?php echo $students; ?>
</div>

<div class="title">
Total Students
</div>

</div>

</div>

<div class="col-md-3">

<div class="card-box text-center">

<i class="fa-solid fa-book courses"></i>

<div class="count">
<?php echo $courses; ?>
</div>

<div class="title">
Total Courses
</div>

</div>

</div>

<div class="col-md-3">

<div class="card-box text-center">

<i class="fa-solid fa-file-lines assignments"></i>

<div class="count">
<?php echo $assignments; ?>
</div>

<div class="title">
Total Assignments
</div>

</div>

</div>

<div class="col-md-3">

<div class="card-box text-center">

<i class="fa-solid fa-bullhorn notices"></i>

<div class="count">
<?php echo $notices; ?>
</div>

<div class="title">
Total Notices
</div>

</div>

</div>

</div>

<br><br>

<div class="row">

<div class="col-md-12">

<div class="card-box">

<h4 class="mb-3">
<i class="fa-solid fa-chart-line"></i>
 Quick Overview
</h4>

<p style="font-size:17px;color:#555;line-height:32px;">

Welcome to the <strong>Forces Academy LMS Admin Panel</strong>.
From here you can manage students, courses, assignments, notices and results.

Use the left sidebar to navigate through different modules of the system.

</p>

</div>

</div>

</div>

<br>

<div class="row">

<div class="col-md-6">

<div class="card-box">

<h5>
<i class="fa-solid fa-user-graduate text-primary"></i>
 Students
</h5>

<hr>

<p>Total Registered Students</p>

<h2 class="text-primary">
<?php echo $students; ?>
</h2>

</div>

</div>

<div class="col-md-6">

<div class="card-box">

<h5>
<i class="fa-solid fa-book-open text-success"></i>
 Courses
</h5>

<hr>

<p>Total Available Courses</p>

<h2 class="text-success">
<?php echo $courses; ?>
</h2>

</div>

</div>

</div>

<br>

<div class="row">

<div class="col-md-6">

<div class="card-box">

<h5>
<i class="fa-solid fa-file-circle-check text-warning"></i>
 Assignments
</h5>

<hr>

<p>Total Assignments Uploaded</p>

<h2 class="text-warning">
<?php echo $assignments; ?>
</h2>

</div>

</div>

<div class="col-md-6">

<div class="card-box">

<h5>
<i class="fa-solid fa-bullhorn text-danger"></i>
 Notices
</h5>

<hr>

<p>Total Notices Posted</p>

<h2 class="text-danger">
<?php echo $notices; ?>
</h2>

</div>

</div>

</div>
<br>

<div class="card-box">

<h4 class="mb-3">
<i class="fa-solid fa-circle-info"></i>
 System Information
</h4>

<table class="table table-bordered mt-3">

<tr>
<th width="35%">Administrator</th>
<td><?php echo $_SESSION['admin_username']; ?></td>
</tr>

<tr>
<th>Total Students</th>
<td><?php echo $students; ?></td>
</tr>

<tr>
<th>Total Courses</th>
<td><?php echo $courses; ?></td>
</tr>

<tr>
<th>Total Assignments</th>
<td><?php echo $assignments; ?></td>
</tr>

<tr>
<th>Total Notices</th>
<td><?php echo $notices; ?></td>
</tr>

<tr>
<th>System</th>
<td>Forces Academy LMS</td>
</tr>

</table>

</div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>