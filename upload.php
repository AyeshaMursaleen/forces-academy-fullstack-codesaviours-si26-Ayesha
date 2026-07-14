<?php
session_start();
require_once "config/db.php";

if (!isset($_SESSION['student_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['submit_assignment'])) {

    $assignment_id = $_POST['assignment_id'];
    $student_id = $_SESSION['student_id'];

    if (isset($_FILES['assignment_file']) && $_FILES['assignment_file']['error'] == 0) {

        $allowed = ['pdf', 'jpg', 'jpeg', 'png'];

        $fileName = $_FILES['assignment_file']['name'];
        $fileTmp = $_FILES['assignment_file']['tmp_name'];

        $extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (in_array($extension, $allowed)) {

            $newFileName = time() . "_" . $fileName;

            $uploadPath = "uploads/" . $newFileName;

            move_uploaded_file($fileTmp, $uploadPath);

            $sql = "INSERT INTO submissions (assignment_id, student_id, file_path)
                    VALUES (?, ?, ?)";

            $stmt = mysqli_prepare($conn, $sql);

            mysqli_stmt_bind_param($stmt, "iis",
                $assignment_id,
                $student_id,
                $uploadPath
            );

            mysqli_stmt_execute($stmt);

            echo "<script>
                    alert('Assignment Submitted Successfully');
                    window.location='assignments.php';
                  </script>";

        } else {

            echo "<script>alert('Only PDF, JPG, JPEG and PNG files are allowed.');</script>";

        }

    }

}
?>