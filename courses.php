
<?php
session_start();
include 'config/db.php';

if (!isset($_SESSION['student_id'])) {
    header("Location: login.php");
    exit();
}

$student_name = $_SESSION['student_name'];

$sql = "SELECT * FROM courses ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>My Courses | Forces Academy LMS</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>

body{
    margin:0;
    background:#f4f6fb;
    font-family:Arial, Helvetica, sans-serif;
}

.header{
    background:linear-gradient(90deg,#184a9c,#3568e8);
    color:white;
    padding:18px 40px;
    font-size:32px;
    font-weight:bold;
}

.sidebar{
    width:250px;
    height:100vh;
    position:fixed;
    background:#173f8a;
    padding-top:30px;
}

.sidebar h4{
    color:white;
    text-align:center;
    margin-bottom:30px;
}

.sidebar a{
    display:block;
    color:white;
    text-decoration:none;
    padding:15px 30px;
    font-size:18px;
}

.sidebar a:hover{
    background:#2b5cc7;
}

.content{
    margin-left:250px;
    padding:35px;
}

.page-title{
    color:#173f8a;
    font-weight:bold;
}

.course-card{
    border:none;
    border-radius:18px;
    transition:0.3s;
}

.course-card:hover{
    transform:translateY(-6px);
}

.teacher{
    color:#173f8a;
    font-weight:bold;
}

.date{
    font-size:14px;
    color:gray;
}

</style>

</head>

<body>

<div class="header">

<i class="fas fa-graduation-cap"></i>

Forces Academy LMS

</div>

<div class="sidebar">

<h4>Student Panel</h4>

<a href="dashboard.php">
<i class="fas fa-home"></i>
Dashboard
</a>

<a href="courses.php">
<i class="fas fa-book-open"></i>
My Courses
</a>

<a href="assignments.php">
<i class="fas fa-file-alt"></i>
Assignments
</a>

<a href="results.php">
<i class="fas fa-chart-line"></i>
My Results
</a>

<a href="notices.php">
<i class="fas fa-bullhorn"></i>
Notices
</a>

<a href="logout.php">
<i class="fas fa-sign-out-alt"></i>
Logout
</a>

</div>

<div class="content">

<h2 class="page-title">

Welcome,
<?php echo htmlspecialchars($student_name); ?>

</h2>

<p class="text-muted mb-4">
Here are your available courses.
</p>

<div class="row">

<?php

if(mysqli_num_rows($result)>0){

while($row=mysqli_fetch_assoc($result)){

?>

<div class="col-lg-4 col-md-6 mb-4">

<div class="card shadow course-card h-100">

<div class="card-body">

<h4 class="text-primary">

<?php echo htmlspecialchars($row['course_name']); ?>

</h4>

<hr>

<p>

<?php echo htmlspecialchars($row['description']); ?>

</p>

<p class="teacher">

<i class="fas fa-user"></i>

Teacher:
<?php echo htmlspecialchars($row['teacher_name']); ?>

</p>

<p class="date">

<i class="fas fa-calendar"></i>

Added on:
<?php echo date("d M Y", strtotime($row['created_at'])); ?>

</p>

</div>

</div>

</div>

<?php

}

}else{

?>

<div class="col-12">

<div class="alert alert-info text-center p-4">

<h4>No Courses Available</h4>

<p class="mb-0">
There are no courses in the database yet.
Please add some  courses in phpMyAdmin.
</p>

</div>

</div>

<?php

}

?>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>