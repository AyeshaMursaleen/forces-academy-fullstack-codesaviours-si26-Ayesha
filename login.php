<?php
session_start();
require_once "config/db.php";


$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {

        $error = "Please fill in all fields.";

    } else {

        $sql = "SELECT id, full_name, password FROM students WHERE email = ?";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "s", $email);

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) == 1) {

            $student = mysqli_fetch_assoc($result);

            if (password_verify($password, $student['password'])) {

                $_SESSION['student_id'] = $student['id'];
                $_SESSION['student_name'] = $student['full_name'];

                header("Location: dashboard.php");
                exit();

            } else {

                $error = "Invalid email or password.";

            }

        } else {

            $error = "Invalid email or password.";

        }

    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Student Login | Forces Academy LMS</title>

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

.login-box{
width:450px;
background:#fff;
background:rgba(255,255,255,.95);
backdrop-filter:blur(10px);
padding:40px;
border-radius:20px;
box-shadow:0 15px 35px rgba(0,0,0,.25);
animation:fadeIn .8s ease;
}
.login-box h2{

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

.btn-primary:hover{

background:#163172;

}

a{

text-decoration:none;

}

</style>

</head>

<body>

<div class="login-box">

<h2>Student Login</h2>

<?php if($error!=""){ ?>

<div class="alert alert-danger">

<?php echo $error; ?>

</div>

<?php } ?>

<form method="POST">

<div class="mb-3">

<label class="form-label">Email</label>

<input
type="email"
name="email"
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

<div class="d-grid">

<button class="btn btn-primary btn-lg">

Login

</button>

</div>

<div class="text-center mt-3">

Don't have an account?

<a href="register.php">

Register Here

</a>

</div>

</form>

</div>

</body>

</html>
