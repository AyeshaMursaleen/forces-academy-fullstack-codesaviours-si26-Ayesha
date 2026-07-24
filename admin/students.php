<?php
require_once "auth.php";
require_once "../config/db.php";
/** @var mysqli $conn */
// Delete Student
if (isset($_GET['delete'])) {

    $id = (int)$_GET['delete'];

    $delete = mysqli_query($conn, "DELETE FROM students WHERE id='$id'");

    if ($delete) {
        echo "<script>
                alert('Student deleted successfully!');
                window.location='students.php';
              </script>";
        exit();
    } else {
        echo "<script>alert('Unable to delete student.');</script>";
    }
}

// Search
$search = "";

if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);

    $sql = "SELECT * FROM students
            WHERE full_name LIKE '%$search%'
            OR roll_number LIKE '%$search%'
            ORDER BY id DESC";
} else {
    $sql = "SELECT * FROM students ORDER BY id DESC";
}

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Manage Students</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

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
color:#cbd5e1;
padding:15px 25px;
text-decoration:none;
transition:.3s;
}

.sidebar a i{
margin-right:10px;
}

.sidebar a:hover,
.sidebar .active{
background:#2563eb;
color:#fff;
padding-left:35px;
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

.page-title{
font-size:28px;
font-weight:bold;
margin-bottom:20px;
}

.card-box{
background:#fff;
border-radius:15px;
padding:25px;
box-shadow:0 5px 20px rgba(0,0,0,.08);
}

.search-box{
display:flex;
gap:10px;
margin-bottom:20px;
}

.table th{
background:#0d6efd;
color:white;
}

.btn{
border-radius:8px;
}

</style>

</head>

<body>

<!-- Sidebar -->

<div class="sidebar">

<h3>Forces LMS</h3>

<a href="dashboard.php">
<i class="fa-solid fa-house"></i>
Dashboard
</a>

<a href="students.php" class="active">
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

<!-- Main -->

<div class="main">

<div class="topbar">

<h4>Manage Students</h4>

<div>

Welcome,
<strong><?php echo $_SESSION['admin_username']; ?></strong>

</div>

</div>

<div class="content">

<div class="card-box">

<h3 class="page-title">
Student Management
</h3>

<form method="GET">

<div class="search-box">

<input
type="text"
name="search"
class="form-control"
placeholder="Search by Name or Roll Number"
value="<?php echo $search; ?>">

<button class="btn btn-primary">

<i class="fa fa-search"></i>
 Search

</button>

</div>

</form>

<div class="table-responsive">

<table class="table table-bordered table-hover align-middle">

<thead>

<tr>

<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Roll No</th>
<th>Class</th>
<th>Registered</th>
<th width="180">Action</th>

</tr>

</thead>

<tbody>
    <?php

if(mysqli_num_rows($result) > 0){

while($row = mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['full_name']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['roll_number']; ?></td>

<td><?php echo $row['class']; ?></td>

<td><?php echo date("d M Y", strtotime($row['created_at'])); ?></td>

<td>

<a href="view_student.php?id=<?php echo $row['id']; ?>"
class="btn btn-info btn-sm">

<i class="fa-solid fa-eye"></i>
View

</a>

<a href="students.php?delete=<?php echo $row['id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Are you sure you want to delete this student?');">

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

<td colspan="7" class="text-center text-danger">

No Students Found

</td>

</tr>

<?php

}

?>

</tbody>

</table>

</div>

</div>

</div>
</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>