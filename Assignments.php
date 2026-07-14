<?php
session_start();
require_once "config/db.php";

// Check if student is logged in
if (!isset($_SESSION['student_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch assignments with course names
$sql = "SELECT assignments.*, courses.course_name
        FROM assignments
        JOIN courses ON assignments.course_id = courses.id
        ORDER BY assignments.due_date ASC";

$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignments | Forces Academy LMS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <h2 class="mb-4">Assignments</h2>

    <div class="row">

        <?php while($assignment = mysqli_fetch_assoc($result)) { ?>
        <?php

$student_id = $_SESSION['student_id'];
$assignment_id = $assignment['id'];

$checkQuery = "SELECT id FROM submissions
               WHERE assignment_id = ? AND student_id = ?";

$stmt = mysqli_prepare($conn, $checkQuery);
mysqli_stmt_bind_param($stmt, "ii", $assignment_id, $student_id);
mysqli_stmt_execute($stmt);

$checkResult = mysqli_stmt_get_result($stmt);

$isSubmitted = mysqli_num_rows($checkResult) > 0;

?>

            <div class="col-md-6 mb-4">

                <div class="card shadow-sm">

                    <div class="card-body">

                        <h4><?php echo $assignment['title']; ?></h4>

                        <p><strong>Course:</strong> <?php echo $assignment['course_name']; ?></p>

                        <p><?php echo $assignment['description']; ?></p>

                        <p>
                            <strong>Due Date:</strong>
                            <?php echo $assignment['due_date']; ?>
                        </p>

                        <?php if($isSubmitted){ ?>

    <span class="badge bg-success fs-6">
        Submitted
    </span>

<?php } else { ?>

<form action="upload.php" method="POST" enctype="multipart/form-data">

    <input type="hidden"
           name="assignment_id"
           value="<?php echo $assignment['id']; ?>">

    <input type="file"
           name="assignment_file"
           class="form-control mb-2"
           required>

    <button
        type="submit"
        name="submit_assignment"
        class="btn btn-primary">
        Submit Assignment
    </button>

</form>

<?php } ?>

                    </div>

                </div>

            </div>

        <?php } ?>

    </div>

</div>

</body>
</html>