
<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "forces_academy_lms"
);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

?>
