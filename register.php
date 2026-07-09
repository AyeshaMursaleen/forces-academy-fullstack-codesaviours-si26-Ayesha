<?php
session_start();
require_once "config/db.php";

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $roll_number = trim($_POST['roll_number']);
    $class = trim($_POST['class']);

    if (
        empty($full_name) ||
        empty($email) ||
        empty($password) ||
        empty($confirm_password) ||
        empty($roll_number) ||
        empty($class)
    ) {
        $error = "All fields are required!";
    }

    elseif ($password != $confirm_password) {
        $error = "Passwords do not match!";
    }

    else {

        $check = "SELECT id FROM students WHERE email=? OR roll_number=?";
        $stmt = mysqli_prepare($conn, $check);
        mysqli_stmt_bind_param($stmt,"ss",$email,$roll_number);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if(mysqli_stmt_num_rows($stmt)>0){

            $error="Email or Roll Number already exists.";

        }else{

            $hashed_password = password_hash($password,PASSWORD_DEFAULT);

            $sql="INSERT INTO students(full_name,email,password,roll_number,class)
            VALUES(?,?,?,?,?)";

            $stmt=mysqli_prepare($conn,$sql);

            mysqli_stmt_bind_param(
                $stmt,
                "sssss",
                $full_name,
                $email,
                $hashed_password,
                $roll_number,
                $class
            );

            if(mysqli_stmt_execute($stmt)){

                header("Location: login.php?registered=1");
                exit();

            }else{

                $error="Registration Failed.";

            }

        }

    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Student Registration | Forces Academy LMS</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Poppins,sans-serif;
}

body{

background:linear-gradient(135deg,#0F172A,#2563EB);
height:100vh;
display:flex;
justify-content:center;
align-items:center;

}

.register-box{

width:500px;
background:#fff;
padding:40px;
border-radius:20px;
box-shadow:0 10px 25px rgba(0,0,0,.2);

}

.register-box h2{

text-align:center;
font-weight:700;
margin-bottom:25px;
color:#1E3A8A;

}

.btn-primary{
    background:linear-gradient(90deg,#1E3A8A,#2563EB);
    border:none;
    border-radius:12px;
    font-weight:600;
    transition:.3s;
}

.btn-primary:hover{
    transform:translateY(-2px);
    background:linear-gradient(90deg,#163172,#1E40AF);
}


a{

text-decoration:none;

}

</style>

</head>

<body>

<div class="register-box">

<h2>Student Registration</h2>

<?php if($error!=""){ ?>

<div class="alert alert-danger">

<?php echo $error; ?>

</div>

<?php } ?>

<form method="POST">

<div class="mb-3">

<label class="form-label">Full Name</label>

<input
type="text"
name="full_name"
class="form-control"
required>

</div>

<div class="mb-3">

<label class="form-label">Email</label>

<input
type="email"
name="email"
class="form-control"
required>

</div>

<div class="mb-3">

<label class="form-label">Roll Number</label>

<input
type="text"
name="roll_number"
class="form-control"
required>

</div>

<div class="mb-3">

<label class="form-label">Class</label>

<input
type="text"
name="class"
class="form-control"
required>

</div>

<div class="mb-3">

<label class="form-label">Password</label>

<input
type="password"
name="password"
class="form-control"
required>

</div>

<div class="mb-3">

<label class="form-label">Confirm Password</label>

<input
type="password"
name="confirm_password"
class="form-control"
required>

</div>

<div class="d-grid">

<button class="btn btn-primary btn-lg">

Register

</button>

</div>

<div class="text-center mt-3">

Already have an account?

<a href="login.php">

Login Here

</a>

</div>

</form>

</div>

</body>

</html>