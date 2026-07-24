<?php

require_once "auth.php";
require_once "../config/db.php";
/** @var mysqli $conn */


/* Add Notice */

if(isset($_POST['add_notice'])){


    $title = mysqli_real_escape_string($conn,$_POST['title']);

    $content = mysqli_real_escape_string($conn,$_POST['content']);


    mysqli_query($conn,"
    
    INSERT INTO notices(title,content)

    VALUES('$title','$content')

    ");


    header("Location: notices.php?success=1");

    exit();

}



/* Delete Notice */

if(isset($_GET['delete'])){


    $id = (int)$_GET['delete'];


    mysqli_query($conn,"
    
    DELETE FROM notices WHERE id='$id'

    ");


    header("Location: notices.php");

    exit();

}



/* Fetch Notices */

$result = mysqli_query($conn,"
SELECT * FROM notices ORDER BY id DESC
");


?>


<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Manage Notices</title>


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

color:white;
text-align:center;
margin-bottom:30px;

}


.sidebar a{

display:block;
padding:15px 25px;
color:#cbd5e1;
text-decoration:none;

}


.sidebar a:hover,
.sidebar .active{

background:#2563eb;
color:white;

}


.sidebar i{

margin-right:10px;

}




.main{

margin-left:250px;

}



.topbar{

height:70px;
background:white;
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

background:white;
padding:25px;
border-radius:15px;
box-shadow:0 5px 15px rgba(0,0,0,.08);

}



.table th{

background:#0d6efd;
color:white;

}


</style>


</head>


<body>



<div class="sidebar">


<h3>
Forces LMS
</h3>


<a href="dashboard.php">
<i class="fa fa-house"></i>
Dashboard
</a>


<a href="students.php">
<i class="fa fa-users"></i>
Students
</a>


<a href="courses.php">
<i class="fa fa-book"></i>
Courses
</a>


<a href="Assignments.php">
<i class="fa fa-file"></i>
Assignments
</a>


<a href="notices.php" class="active">
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


<h4>
Manage Notices
</h4>


<strong>
<?php echo $_SESSION['admin_username']; ?>
</strong>


</div>



<div class="content">


<?php if(isset($_GET['success'])){ ?>


<div class="alert alert-success">

Notice Posted Successfully!

</div>


<?php } ?>



<div class="card-box">


<h3 class="mb-4">

<i class="fa fa-bullhorn"></i>

Post New Notice

</h3>



<form method="POST">


<div class="mb-3">

<label>
Title
</label>


<input
type="text"
name="title"
class="form-control"
required>


</div>



<div class="mb-3">

<label>
Notice Content
</label>


<textarea
name="content"
rows="5"
class="form-control"
required></textarea>


</div>



<button
class="btn btn-primary"
name="add_notice">

Post Notice

</button>



</form>


</div>
<br>


<div class="card-box">


<h3 class="mb-3">

<i class="fa fa-list"></i>

All Notices

</h3>



<div class="table-responsive">


<table class="table table-bordered table-hover">


<thead>

<tr>

<th>ID</th>

<th>Title</th>

<th>Content</th>

<th>Action</th>

</tr>

</thead>



<tbody>



<?php


if(mysqli_num_rows($result) > 0){


while($row = mysqli_fetch_assoc($result)){


?>



<tr>


<td>

<?php echo $row['id']; ?>

</td>



<td>

<?php echo $row['title']; ?>

</td>



<td>

<?php echo $row['content']; ?>

</td>



<td>


<a href="notices.php?delete=<?php echo $row['id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Are you sure you want to delete this notice?');">


<i class="fa fa-trash"></i>

Delete


</a>



</td>


</tr>



<?php


}


}else{


?>


<tr>

<td colspan="4" class="text-center text-danger">

No Notices Found

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



</body>


</html>