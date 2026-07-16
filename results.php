<?php
require_once 'config/db.php'; // Change the path if your db.php is in another folder
if(isset($_POST['save_result'])){

    $student_id = $_POST['student_id'];
    $course_id = $_POST['course_id'];
    $assignment_id = $_POST['assignment_id'];
    $obtained_marks = $_POST['marks_obtained'];
    $total_marks = $_POST['total_marks'];
    $grade = $_POST['grade'];
    $remarks = $_POST['remarks'];

    $insert = mysqli_query($conn, "
        INSERT INTO results
        (student_id, course_id, assignment_id, obtained_marks, total_marks, grade, remarks)
        VALUES
        ('$student_id','$course_id','$assignment_id','$obtained_marks','$total_marks','$grade','$remarks')
    ");

    if($insert){
        echo "<script>alert('Result Added Successfully'); window.location='results.php';</script>";
    }else{
        echo mysqli_error($conn);
    }
}
// Fetch Students
$students = mysqli_query($conn, "SELECT id, full_name FROM students");

// Fetch Courses
$courses = mysqli_query($conn, "SELECT id, course_name FROM courses");

// Fetch Assignments
$assignments = mysqli_query($conn, "SELECT id, title FROM assignments");
$showResults = mysqli_query($conn, "
SELECT
    results.id,
    students.full_name,
    courses.course_name,
    assignments.title,
    results.obtained_marks AS marks_obtained,
    results.total_marks,
    results.grade,
    results.remarks
FROM results
JOIN students ON results.student_id = students.id
JOIN courses ON results.course_id = courses.id
JOIN assignments ON results.assignment_id = assignments.id
ORDER BY results.id DESC
");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Result</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Add Student Result</h3>
        </div>

        <div class="card-body">

            <form method="POST">

                <!-- Student -->
                <div class="mb-3">
                    <label class="form-label">Student</label>
                    <select name="student_id" class="form-control" required>
                        <option value="">Select Student</option>

                        <?php while($student = mysqli_fetch_assoc($students)) { ?>
                            <option value="<?= $student['id']; ?>">
                                <?= $student['full_name']; ?>
                            </option>
                        <?php } ?>

                    </select>
                </div>

                <!-- Course -->
                <div class="mb-3">
                    <label class="form-label">Course</label>
                    <select name="course_id" class="form-control" required>
                        <option value="">Select Course</option>

                        <?php while($course = mysqli_fetch_assoc($courses)) { ?>
                            <option value="<?= $course['id']; ?>">
                                <?= $course['course_name']; ?>
                            </option>
                        <?php } ?>

                    </select>
                </div>

                <!-- Assignment -->
                <div class="mb-3">
                    <label class="form-label">Assignment</label>
                    <select name="assignment_id" class="form-control">
                        <option value="">Select Assignment</option>

                        <?php while($assignment = mysqli_fetch_assoc($assignments)) { ?>
                            <option value="<?= $assignment['id']; ?>">
                                <?= $assignment['title']; ?>
                            </option>
                        <?php } ?>

                    </select>
                </div>

                <!-- Obtained Marks -->
                <div class="mb-3">
                    <label class="form-label">Obtained Marks</label>
                    <input type="number" name="marks_obtained" class="form-control" required>
                </div>

                <!-- Total Marks -->
                <div class="mb-3">
                    <label class="form-label">Total Marks</label>
                    <input type="number" name="total_marks" class="form-control" required>
                </div>

                <!-- Grade -->
                <div class="mb-3">
                    <label class="form-label">Grade</label>
                    <input type="text" name="grade" class="form-control" placeholder="A+, A, B..." required>
                </div>

                <!-- Remarks -->
                <div class="mb-3">
                    <label class="form-label">Remarks</label>
                    <textarea name="remarks" class="form-control" rows="3"></textarea>
                </div>

                <button type="submit" name="save_result" class="btn btn-success">
    Save Result
</button>

            </form>
            <hr class="my-5">

<h3 class="mb-3">All Results</h3>

<table class="table table-bordered table-hover">

    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Student</th>
            <th>Course</th>
            <th>Assignment</th>
            <th>Obtained</th>
            <th>Total</th>
            <th>Grade</th>
            <th>Remarks</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>

    <?php
    $count = 1;
    while($row = mysqli_fetch_assoc($showResults)){
    ?>

    <tr>

        <td><?= $count++; ?></td>

        <td><?= $row['full_name']; ?></td>

        <td><?= $row['course_name']; ?></td>

        <td><?= $row['title']; ?></td>

        <td><?= $row['marks_obtained']; ?></td>

        <td><?= $row['total_marks']; ?></td>

        <td><?= $row['grade']; ?></td>

        <td><?= $row['remarks']; ?></td>

        <td>
            <a href="edit_result.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">
                Edit
            </a>

            <a href="delete_result.php?id=<?= $row['id']; ?>"
               class="btn btn-danger btn-sm"
               onclick="return confirm('Are you sure you want to delete this result?');">
                Delete
            </a>
        </td>

    </tr>

    <?php } ?>

    </tbody>

</table>

        </div>
    </div>
</div>

</body>
</html>