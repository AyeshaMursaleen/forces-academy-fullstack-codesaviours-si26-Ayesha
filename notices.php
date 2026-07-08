<?php
session_start();

if (!isset($_SESSION['student_name'])) {
    header("Location: login.php");
    exit();
}

include("config/db.php");

// Fetch notices
$sql = "SELECT * FROM notices ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notice Board</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>

        body{
            background:linear-gradient(to right,#eef2ff,#f8fbff);
            font-family:Arial, Helvetica, sans-serif;
        }

        /* Sidebar */

        .sidebar{
            width:250px;
            height:100vh;
            background:#212529;
            position:fixed;
            top:0;
            left:0;
        }

        .sidebar h3{
            color:white;
            text-align:center;
            padding:20px;
            border-bottom:1px solid rgba(255,255,255,.2);
        }

        .sidebar a{
            color:white;
            text-decoration:none;
            display:block;
            padding:15px 20px;
            transition:.3s;
        }

        .sidebar a:hover{
            background:#0d6efd;
            padding-left:30px;
        }

        .sidebar a.active{
            background:#0d6efd;
        }

        /* Content */

        .content{
    margin-left:250px;
    padding:40px;
    max-width:1100px;
}
.sidebar{
    background:linear-gradient(180deg,#212529,#111827);
}
.card{
    overflow:hidden;
    position:relative;
}

.card::before{
    content:"";
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:4px;
    background:#0d6efd;
}

        h2{
    color:#0d6efd;
    font-weight:bold;
    text-shadow:1px 1px 2px rgba(0,0,0,.15);
}

        /* Cards */

        .card{
            border:none;
            border-left:6px solid #0d6efd;
            border-radius:12px;
            box-shadow:0 8px 20px rgba(0,0,0,.08);
            transition:.3s;
        }

        .card:hover{
            transform:translateY(-5px);
            box-shadow:0 12px 25px rgba(0,0,0,.15);
        }

        .card h4{
            color:#0d6efd;
            font-weight:bold;
        }

        .card p{
            color:#555;
            font-size:16px;
        }

        .badge{
            font-size:14px;
            padding:8px 12px;
        }

    </style>

</head>

<body>


<!-- Content -->

<div class="content">

    <h2>
        <i class="fa-solid fa-bullhorn text-warning"></i>
        Notice Board
    </h2>

    <?php

    if(mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_assoc($result)){

    ?>

    <div class="card mb-4">

        <div class="card-body">

            <h4>
                <i class="fa-solid fa-circle-info text-primary"></i>
                <?php echo htmlspecialchars($row['title']); ?>
            </h4>

            <p class="mt-3">
                <?php echo htmlspecialchars($row['content']); ?>
            </p>

            <p>
                <span class="badge bg-primary me-2">
    <i class="fa-solid fa-user"></i> Posted By
</span>

<strong><?php echo $row['posted_by']; ?></strong>
<span class="badge bg-light text-dark border">
    <i class="fa-solid fa-calendar-days"></i>
    <?php echo date("d M Y", strtotime($row['created_at'])); ?>
</span>
               
            </p>

            
        </div>

    </div>

    <?php

        }

    }else{

    ?>

        <div class="alert alert-info text-center">
            <i class="fa-solid fa-circle-info"></i>
            No notices available.
        </div>

    <?php

    }

    ?>

</div>

</body>
</html>