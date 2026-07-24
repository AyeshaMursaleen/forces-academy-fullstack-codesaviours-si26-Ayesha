<?php
require_once "auth.php";
require_once "../config/db.php";
/** @var mysqli $conn */

/* Add Course */

if(isset($_POST['add_course'])){

    $course_name = mysqli_real_escape_string($conn,$_POST['course_name']);
    $description = mysqli_real_escape_string($conn,$_POST['description']);
    $teacher_name = mysqli_real_escape_string($conn,$_POST['teacher_name']);

    mysqli_query($conn,"INSERT INTO courses(course_name,description,teacher_name)
    VALUES('$course_name','$description','$teacher_name')");

    header("Location: courses.php");
    exit();
}

/* Delete Course */

if(isset($_GET['delete'])){

    $id = (int)$_GET['delete'];


    // Check course is used or not

    $check = mysqli_query($conn,"
    SELECT * FROM assignments WHERE course_id='$id'
    ");


    if(mysqli_num_rows($check) > 0){

        echo "
        <script>
        alert('This course cannot be deleted because assignments exist for this course.');
        window.location='courses.php';
        </script>
        ";

        exit();

    }



    mysqli_query($conn,"
    DELETE FROM courses WHERE id='$id'
    ");



    header("Location: courses.php");

    exit();

}

$result = mysqli_query($conn,"SELECT * FROM courses ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Manage Courses</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial;
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
height:100%;
background:#0f172a;
padding-top:20px;
}

.sidebar h3{
color:#fff;
text-align:center;
margin-bottom:30px;
}

.sidebar a{
display:block;
padding:15px 25px;
color:#cbd5e1;
text-decoration:none;
transition:.3s;
}

.sidebar a:hover,
.sidebar .active{
background:#2563eb;
color:#fff;
padding-left:35px;
}

.sidebar i{
margin-right:10px;
}

.main{
margin-left:250px;
}

.topbar{
height:70px;
background:#fff;
display:flex;
justify-content:space-between;
align-items:center;
padding:0 30px;
box-shadow:0 2px 10px rgba(0,0,0,.1);
}

.content{
padding:30px;
}

.card-box{
background:#fff;
padding:25px;
border-radius:15px;
box-shadow:0 5px 15px rgba(0,0,0,.08);
}

.table th{
background:#0d6efd;
color:#fff;
}

</style>

</head>

<body>

<div class="sidebar">

<h3>Forces LMS</h3>

<a href="dashboard.php">
<i class="fa fa-house"></i>
Dashboard
</a>

<a href="students.php">
<i class="fa fa-users"></i>
Students
</a>

<a href="courses.php" class="active">
<i class="fa fa-book"></i>
Courses
</a>

<a href="Assignments.php">
<i class="fa fa-file"></i>
Assignments
</a>

<a href="notices.php">
<i class="fa fa-bullhorn"></i>
Notices
</a>

<a href="results.php">
<i class="fa fa-chart-column"></i>
Results
</a>

<a href="logout.php">
<i class="fa fa-right-from-bracket"></i>
Logout
</a>

</div>

<div class="main">

<div class="topbar">

<h4>Manage Courses</h4>

<strong>
<?php echo $_SESSION['admin_username']; ?>
</strong>

</div>

<div class="content">

<div class="card-box">

<h3 class="mb-4">
Add New Course
</h3>

<form method="POST">

<div class="mb-3">

<label>Course Name</label>

<input
type="text"
name="course_name"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Description</label>

<textarea
name="description"
class="form-control"
rows="4"
required></textarea>

</div>

<div class="mb-3">

<label>Teacher Name</label>

<input
type="text"
name="teacher_name"
class="form-control"
required>

</div>

<button
class="btn btn-primary"
name="add_course">

Add Course

</button>

</form>

</div>

<br>

<div class="card-box">

<h3 class="mb-3">

All Courses

</h3>

<div class="table-responsive">

<table class="table table-bordered table-hover">

<thead>

<tr>

<th>ID</th>
<th>Course</th>
<th>Description</th>
<th>Teacher</th>
<th width="180">Action</th>

</tr>

</thead>

<tbody>
    <?php

if(mysqli_num_rows($result) > 0){

while($row = mysqli_fetch_assoc($result)){

?>

<tr>

<td>

<?php

echo substr($row['description'],0,50);

if(strlen($row['description']) > 50){

echo "...";

}

?>

</td>

<td><?php echo $row['course_name']; ?></td>

<td><?php echo $row['description']; ?></td>

<td><?php echo $row['teacher_name']; ?></td>

<td>

<a href="edit_course.php?id=<?php echo $row['id']; ?>"
class="btn btn-success btn-sm">

<i class="fa-solid fa-pen-to-square"></i>
Edit

</a>

<a href="courses.php?delete=<?php echo $row['id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Are you sure you want to delete this course?');">

<i class="fa-solid fa-trash"></i>
Delete

</a>

</td>

</tr>

<?php

}

}else{

?>

<tr>

<td colspan="5" class="text-center text-danger">

No Courses Found

</td>

</tr>

<?php

}

?>

</tbody>

</table>

</div>

</div>

<br>

<div class="card-box">

<h4 class="mb-3">
<i class="fa-solid fa-circle-info"></i>
 Course Information
</h4>

<p>

From this page, the administrator can:

</p>

<ul>

<li>Add new courses</li>

<li>Edit existing courses</li>

<li>Delete courses</li>

<li>Manage all course records</li>

</ul>

</div>