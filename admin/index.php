<?php 
require_once '../config.php';
if(isset($_SESSION['login']) && $_SESSION['login']) {
    switch($_SESSION['user_type']) {
        case 'staff':
            header('location: ../staff');
            break;
        case 'client':
            header('location: ../client');
            break;
    }
} else header('location: ../');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin | Calintaan Occidental mindoro Municipal Grand Council</title>
    <link rel="icon" href="../src/assets/logo.png" type="image/x-icon" />

    <!-- Jquery -->
    <script src="../src/jquery/jquery.min.js"></script>

    <!-- sweet alert -->
    <script src="../src/sweetalert2/sweetalert2.all.min.js"></script>

    <!-- axios -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"
        integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- w3JS -->
    <script src="https://www.w3schools.com/lib/w3.js"></script>

    <!-- fotn-awesome -->
    <link rel="stylesheet" href="../src/fontawesome/css/all.min.css" />

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />

    <!-- Poppins font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />

    <!-- google icons -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <!-- custom styles -->
    <style>
    * {
        font-family: "Poppins", sans-serif;
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    body::-webkit-scrollbar {
        width: 0;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end py-3 px-2" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active d-flex align-items-center justify-content-start gap-2 text-light mx-3"
                        href="./">
                        <span class="material-symbols-outlined">home</span> Home</a>
                    <a class="nav-link d-flex align-items-center justify-content-start gap-2 text-light mx-3"
                        href="#">
                        <span class="material-symbols-outlined">campaign</span>
                        Announcement</a>
                    <a class="nav-link d-flex align-items-center justify-content-start gap-2 text-light mx-3"
                        href="#">
                        <span class="material-symbols-outlined">call</span> Contact</a>
                    <a class="nav-link d-flex align-items-center justify-content-start gap-2 text-light mx-3"
                        href="./about.html">
                        <span class="material-symbols-outlined">info</span> About us</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="d-flex align-items-center justify-content-between p-3 bg-warning position-relative">
        <div class="col-4 d-flex align-items-center justify-content-start gap-3 text-white" style="height: 48px;">
            <img src="../src/assets/logo.png" width="120px" height="120px" class="rounded-circle"
                style="position: absolute; left: 0; z-index: 10" />
            <h1 class="fw-bold fs-2 mt-1" style="margin-left: 7rem">
                Calintaan Occidental midoro Municipal Grand Council
            </h1>
        </div>
        <div class="col-3 text-end text-white d-flex align-items-center justify-content-end">
            <h6 class="mt-2">
                <?php echo $_SESSION['fullname'] ?>
            </h6>

            <div class="dropdown">
                <img src="../src/assets/profile-avatar.png" alt="" height="50px" style="cursor: pointer;"
                    class="rounded-circle hover" data-bs-toggle="dropdown" aria-expanded="false">
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item hover d-flex align-items-center justify-content-start gap-2"
                            href="#"><span class="material-symbols-outlined">person</span> Profile</a>
                    </li>
                    <li><a class="dropdown-item hover d-flex align-items-center justify-content-start gap-2"
                            href="../logout.php"><span class="material-symbols-outlined">logout</span> Logout</a></li>
                </ul>
            </div>
        </div>
    </div>




    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .sidebar {
            width: 250px;
            background: #343a40;
            height: 100vh;
            position: fixed;
            padding-top: 1rem;
            color: white;
        }
        .sidebar a {
            text-decoration: none;
            color: white;
            display: block;
            padding: 10px 20px;
            border-radius: 5px;
        }
        .sidebar a:hover {
            background: #495057;
        }
        .content {
            margin-left: 260px;
            padding: 20px;
        }
        .card {
            border-radius: 10px;
            transition: all 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        .nav-header {
            font-weight: bold;
            color: gold;
        }
        .header-title {
            font-weight: bold;
            font-size: 1.5rem;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h4 class="text-center nav-header">Admin Dashboard</h4>
        <hr class="bg-light">
        <a href="#"><span class="material-icons">dashboard</span> Dashboard</a>
        <a href="#"><span class="material-icons">group</span> Members</a>
        <a href="#"><span class="material-icons">analytics</span> Reports</a>
        <a href="#"><span class="material-icons">settings</span> Settings</a>
        <a href="#"><span class="material-icons">logout</span> Logout</a>
    </div>

    <div class="content">
        <div class="container-fluid">
            <h1 class="header-title">Calintaan Occidental Mindoro Municipal Grand Council</h1>
            <p>Welcome to the Online Registration Information System Dashboard</p>
            
            <!-- Dashboard Stats -->
            <div class="row my-4">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card bg-primary text-white text-center">
                        <div class="card-body">
                            <h2>200</h2>
                            <p>Total Registrations</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card bg-success text-white text-center">
                        <div class="card-body">
                            <h2>150</h2>
                            <p>Approved Members</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card bg-warning text-white text-center">
                        <div class="card-body">
                            <h2>30</h2>
                            <p>Pending Applications</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card bg-danger text-white text-center">
                        <div class="card-body">
                            <h2>20</h2>
                            <p>Rejected Applications</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Members Management Table -->
            <div class="card">
                <div class="card-header bg-dark text-white">
                    Members Management
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Juan Dela Cruz</td>
                                <td>juan.delacruz@gmail.com</td>
                                <td><span class="badge bg-success">Approved</span></td>
                                <td>
                                    <button class="btn btn-primary btn-sm">Edit</button>
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Maria Clara</td>
                                <td>maria.clara@gmail.com</td>
                                <td><span class="badge bg-warning">Pending</span></td>
                                <td>
                                    <button class="btn btn-primary btn-sm">Edit</button>
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Jose Rizal</td>
                                <td>jose.rizal@gmail.com</td>
                                <td><span class="badge bg-danger">Rejected</span></td>
                                <td>
                                    <button class="btn btn-primary btn-sm">Edit</button>
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <script>
    $(document).ready(function() {
        // Your custom JavaScript here
    });
    </script>
</body>

</html>