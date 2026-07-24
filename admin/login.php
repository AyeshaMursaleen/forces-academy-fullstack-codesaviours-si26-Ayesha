<?php
session_start();
require_once "../config/db.php";
/** @var mysqli $conn */
if (isset($_SESSION['admin_id'])) {
    header("Location: dashboard.php");
    exit();
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $sql = "SELECT * FROM admins WHERE email = ?";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {

        $admin = mysqli_fetch_assoc($result);

        // Agar password_hash() use kiya hai to ye line rakho
        if ($password == $admin['password']) { 

            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_username'] = $admin['username'];

            header("Location: dashboard.php");
            exit();

        } else {
            $error = "Invalid Password!";
        }

    } else {
        $error = "Admin not found!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">

<title>Admin Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<style>
body{
    margin:0;
    padding:0;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:linear-gradient(135deg,#0f2027,#203a43,#2c5364);
    font-family:Arial, Helvetica, sans-serif;
}

.login-card{
    width:420px;
    background:#fff;
    border-radius:20px;
    padding:35px;
    box-shadow:0 20px 40px rgba(0,0,0,.25);
}

.logo{
    width:80px;
    height:80px;
    background:#0d6efd;
    color:#fff;
    border-radius:50%;
    display:flex;
    justify-content:center;
    align-items:center;
    margin:auto;
    font-size:32px;
}

.form-control{
    border-radius:12px;
    height:50px;
}

.btn-login{
    background:#0d6efd;
    color:white;
    border:none;
    border-radius:12px;
    height:50px;
    font-weight:bold;
}

.btn-login:hover{
    background:#0b5ed7;
}

h2{
    font-weight:bold;
}
</style>

<div class="login-card">

<div class="text-center mb-4">

<h2 class="mt-3">Admin Login</h2>

<p class="text-muted">
Forces Academy LMS
</p>

</div>

<?php
if($error!=""){
echo "<div class='alert alert-danger'>$error</div>";
}
?>

<form method="POST">

<div class="mb-3">
<label>Email</label>

<input
type="email"
name="email"
class="form-control"
placeholder="Enter Email"
required>

</div>

<div class="mb-3">

<label>Password</label>

<input
type="password"
name="password"
class="form-control"
placeholder="Enter Password"
required>

</div>

<button class="btn btn-login w-100">
<i class="fa-solid fa-right-to-bracket"></i>
 Login
</button>

</form>

</div>

</body>

</button>

</form>

</div>

</div>

</div>

</div>

</div>

</body>

</html>