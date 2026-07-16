<?php
require_once 'config/db.php'; // Change the path if your db.php is in another folder

// Fetch Students
$students = mysqli_query($conn, "SELECT id, full_name FROM students");

// Fetch Courses
$courses = mysqli_query($conn, "SELECT id, course_name FROM courses");

// Fetch Assignments
$assignments = mysqli_query($conn, "SELECT id, title FROM assignments");
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

                <button type="submit" class="btn btn-success">
                    Save Result
                </button>

            </form>

        </div>
    </div>
</div>

</body>
</html>