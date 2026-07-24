<?php

require_once "auth.php";
require_once "../config/db.php";
/** @var mysqli $conn */


/* Check ID */

if(!isset($_GET['id'])){

    header("Location: courses.php");
    exit();

}


$id = (int)$_GET['id'];



/* Fetch Course */

$query = mysqli_query($conn,"SELECT * FROM courses WHERE id='$id'");

$course = mysqli_fetch_assoc($query);


if(!$course){

    echo "Course not found";
    exit();

}



/* Update Course */

if(isset($_POST['update_course'])){


    $course_name = mysqli_real_escape_string($conn,$_POST['course_name']);

    $description = mysqli_real_escape_string($conn,$_POST['description']);

    $teacher_name = mysqli_real_escape_string($conn,$_POST['teacher_name']);



    mysqli_query($conn,"
    
    UPDATE courses SET

    course_name='$course_name',

    description='$description',

    teacher_name='$teacher_name'


    WHERE id='$id'
    
    ");



    header("Location: courses.php");

    exit();

}


?>



<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Edit Course</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">



<style>


body{

background:#f4f7fc;

font-family:Arial;

}



.container-box{

width:600px;

margin:60px auto;

background:white;

padding:30px;

border-radius:15px;

box-shadow:0 5px 15px rgba(0,0,0,.1);

}



h3{

text-align:center;

margin-bottom:25px;

}



</style>


</head>


<body>



<div class="container-box">


<h3>

<i class="fa-solid fa-pen-to-square"></i>

Edit Course

</h3>



<form method="POST">


<div class="mb-3">

<label>
Course Name
</label>


<input 
type="text"
name="course_name"
class="form-control"
value="<?php echo $course['course_name']; ?>"
required>


</div>




<div class="mb-3">

<label>
Description
</label>


<textarea
name="description"
class="form-control"
rows="4"
required><?php echo $course['description']; ?></textarea>


</div>




<div class="mb-3">

<label>
Teacher Name
</label>


<input
type="text"
name="teacher_name"
class="form-control"
value="<?php echo $course['teacher_name']; ?>"
required>


</div>



<button 
name="update_course"
class="btn btn-primary">

<i class="fa-solid fa-save"></i>

Update Course

</button>



<a href="courses.php"
class="btn btn-secondary">

Back

</a>



</form>


</div>



</body>

</html>