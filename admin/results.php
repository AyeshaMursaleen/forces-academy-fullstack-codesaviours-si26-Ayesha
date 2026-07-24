<?php

require_once "auth.php";
require_once "../config/db.php";
/** @var mysqli $conn */


/* Add Result */

if(isset($_POST['save_result'])){


$student_id = $_POST['student_id'];

$course_id = $_POST['course_id'];

$assignment_id = $_POST['assignment_id'];

$obtained_marks = $_POST['obtained_marks'];

$total_marks = $_POST['total_marks'];

$grade = $_POST['grade'];

$exam_type = $_POST['exam_type'];

$remarks = $_POST['remarks'];



mysqli_query($conn,"
INSERT INTO results
(student_id,course_id,assignment_id,obtained_marks,total_marks,grade,exam_type,remarks)

VALUES

('$student_id','$course_id','$assignment_id','$obtained_marks','$total_marks','$grade','$exam_type','$remarks')

");



header("Location: results.php?success=1");

exit();

}



/* Students */

$students = mysqli_query($conn,"
SELECT * FROM students ORDER BY full_name ASC
");



/* Courses */

$courses = mysqli_query($conn,"
SELECT * FROM courses ORDER BY course_name ASC
");



/* Assignments */

$assignments = mysqli_query($conn,"
SELECT * FROM assignments ORDER BY id DESC
");



/* Results List */

$results = mysqli_query($conn,"
SELECT 
results.*,
students.full_name,
courses.course_name,
assignments.title

FROM results

JOIN students 
ON results.student_id = students.id

JOIN courses
ON results.course_id = courses.id

JOIN assignments
ON results.assignment_id = assignments.id

ORDER BY results.id DESC

");

?>
<!-- Main Content Start -->

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Upload Results</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">


<style>

body{

background:#f4f7fc;
font-family:Arial;

}


.container-box{

margin-left:250px;
padding:30px;

}


.card-box{

background:white;
padding:25px;
border-radius:15px;
box-shadow:0 5px 15px rgba(0,0,0,.08);

}


</style>


</head>


<body>



<div class="container-box">



<?php if(isset($_GET['success'])){ ?>

<div class="alert alert-success">

Result uploaded successfully!

</div>

<?php } ?>



<div class="card-box">


<h3 class="mb-4">

<i class="fa fa-chart-column"></i>

Upload Result

</h3>



<form method="POST">



<div class="row">



<div class="col-md-6 mb-3">


<label>
Select Student
</label>


<select name="student_id" class="form-control" required>


<option value="">
Select Student
</option>



<?php

while($student=mysqli_fetch_assoc($students)){


?>


<option value="<?php echo $student['id']; ?>">


<?php echo $student['full_name']; ?>


</option>



<?php } ?>



</select>


</div>






<div class="col-md-6 mb-3">


<label>
Select Course
</label>


<select name="course_id" class="form-control" required>



<option value="">
Select Course
</option>



<?php


while($course=mysqli_fetch_assoc($courses)){


?>


<option value="<?php echo $course['id']; ?>">


<?php echo $course['course_name']; ?>


</option>



<?php } ?>



</select>


</div>





<div class="col-md-6 mb-3">


<label>
Select Subject / Assignment
</label>


<select name="assignment_id" class="form-control" required>



<option value="">
Select Assignment
</option>



<?php


while($assignment=mysqli_fetch_assoc($assignments)){


?>


<option value="<?php echo $assignment['id']; ?>">


<?php echo $assignment['title']; ?>


</option>



<?php } ?>



</select>


</div>






<div class="col-md-3 mb-3">


<label>
Obtained Marks
</label>


<input
type="number"
name="obtained_marks"
class="form-control"
required>



</div>





<div class="col-md-3 mb-3">


<label>
Total Marks
</label>


<input
type="number"
name="total_marks"
class="form-control"
required>


</div>






<div class="col-md-6 mb-3">


<label>
Grade
</label>


<input
type="text"
name="grade"
class="form-control"
placeholder="A, B, C">


</div>







<div class="col-md-6 mb-3">


<label>
Exam Type
</label>


<select name="exam_type" class="form-control" required>


<option value="">
Select Exam Type
</option>


<option value="Mid Term">
Mid Term
</option>


<option value="Final">
Final
</option>


<option value="Assignment">
Assignment
</option>


<option value="Quiz">
Quiz
</option>


</select>


</div>






<div class="col-md-12 mb-3">


<label>
Remarks
</label>


<textarea
name="remarks"
class="form-control"
rows="3"></textarea>


</div>



</div>



<button 
class="btn btn-primary"
name="save_result">


<i class="fa fa-save"></i>

Save Result


</button>



</form>


</div>
<br>


<div class="card-box">


<h3 class="mb-3">

<i class="fa fa-list"></i>

Recently Uploaded Results

</h3>



<div class="table-responsive">


<table class="table table-bordered table-hover">


<thead>

<tr>

<th>ID</th>

<th>Student</th>

<th>Course</th>

<th>Subject</th>

<th>Marks</th>

<th>Grade</th>

<th>Exam Type</th>

<th>Remarks</th>

</tr>

</thead>



<tbody>



<?php


if(mysqli_num_rows($results) > 0){


while($row=mysqli_fetch_assoc($results)){


?>



<tr>


<td>

<?php echo $row['id']; ?>

</td>



<td>

<?php echo $row['full_name']; ?>

</td>



<td>

<?php echo $row['course_name']; ?>

</td>



<td>

<?php echo $row['title']; ?>

</td>



<td>

<?php echo $row['obtained_marks']; ?>

/

<?php echo $row['total_marks']; ?>

</td>



<td>

<?php echo $row['grade']; ?>

</td>



<td>

<?php echo $row['exam_type']; ?>

</td>



<td>

<?php echo $row['remarks']; ?>

</td>



</tr>



<?php


}


}else{


?>


<tr>

<td colspan="8" class="text-center text-danger">

No Results Uploaded

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


</body>

</html>