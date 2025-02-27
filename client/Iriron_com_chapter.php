<?php 
require_once '../config.php';
if(isset($_SESSION['login']) && $_SESSION['login']) {
    switch($_SESSION['user_type']) {
        case 'staff':
            header('location: ../staff');
            break;
        case 'admin':
            header('location: ../admin');
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
    <title>Client | Calintaan Occidental midoro Municipal Grand Council</title>
    <link rel="icon" href="../src/assets/logo.png" type="image/x-icon" />
    <script src="../src/jquery/jquery.min.js"></script>
    <script src="../src/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"
        integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://www.w3schools.com/lib/w3.js"></script>
    <link rel="stylesheet" href="../src/fontawesome/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
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
    body {
    background-color: #121212;
    color: white;
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
    <div class="d-flex align-items-center gap-3 text-dark flex-grow-1">
        <img src="../src/assets/logo.png" class="rounded-circle position-absolute" 
            style="width: 90px; height: 90px; left: 15px; z-index: 10;" />
        <h1 class="fw-bold fs-4 text-center text-md-start flex-grow-1" 
            style="margin-left: 6rem; max-width: calc(100% - 100px);">
            Calintaan Occidental Mindoro Municipal Grand Council
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

    <div style="
        min-height: 80vh;
      " class="container-fluid p-4 text-center">
        <button class="btn btn-lg px-5 py-3 border-0 fw-bold rounded-0 col-4"
            style="background-image: linear-gradient(white, rgb(216, 210, 30));">Barangay Iriron Community Chapter</button><br><br>
            <h4 class="text-start fw-bold">ONLINE PROCESS REGISTRATIONS:</h4>
        <br>
        <div class="container mt-4">
    <h2 class="text-center">Neophyte Triskelion Application Form</h2>
    <form>
        <!-- Personal Information -->
        <div class="row text-start mt-4 gap-3 justify-content-center">
            <div class="col-md-6 border border-success p-4 rounded">
                <h4>1. Personal Information</h4>
                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Age</label>
                    <input type="number" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Gender</label>
                    <select class="form-control">
                        <option>Male</option>
                        <option>Female</option>
                        <option>Other</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Contact Number</label>
                    <input type="text" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Residential Address</label>
                    <textarea class="form-control" rows="2" required></textarea>
                </div>
            </div>

            <!-- Requirements Checklist -->
            <div class="col-md-5 border border-success p-4 rounded">
                <h4>2. Requirements Checklist</h4>
                <p>Please attach each of the following required documents:</p>
                
                <div class="mb-2">
                    <label class="form-label"><i class="fa fa-check"></i> PSA/Birth Certificate</label>
                    <input type="file" class="form-control">
                </div>
                <div class="mb-2">
                    <label class="form-label"><i class="fa fa-check"></i> 2x2 Picture</label>
                    <input type="file" class="form-control">
                </div>
                <div class="mb-2">
                    <label class="form-label"><i class="fa fa-check"></i> Barangay Certificate</label>
                    <input type="file" class="form-control">
                </div>

                <!-- Progress Bar -->
                <div class="progress my-3" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="height: 25px">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 0%">Uploading 0%</div>
                </div>
            </div>
        </div>

        <!-- Applicant Declaration -->
        <div class="row justify-content-center mt-3">
            <div class="col-md-6 border border-success p-4 rounded">
                <h4>3. Applicant Declaration</h4>
                <p>
                    By signing below, I confirm that all information provided is accurate and complete, and I agree to abide by the principles and regulations set forth by Triskelion.
                </p>
                <div class="mb-3">
                    <label class="form-label">Applicant’s Signature</label>
                    <input type="text" class="form-control" placeholder="Type your full name as a signature" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Date of Application</label>
                    <input type="date" class="form-control" required>
                </div>
            </div>
        </div>

        <!-- Approval Section -->
        <div class="row justify-content-center mt-3">
            <div class="col-md-6 border border-warning p-4 rounded">
                <h4>4. Approval Section (For Official Use Only)</h4>
                <div class="mb-3">
                    <label class="form-label">Approval Status</label>
                    <select class="form-control">
                        <option>PENDING</option>
                        <option>APPROVED</option>
                        <option>REJECTED</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Approval Date</label>
                    <input type="date" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Grand Triskelion Name</label>
                    <input type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Signature</label>
                    <input type="text" class="form-control">
                </div>
            </div>
        </div>

        <!-- Submit and Reset Buttons -->
        <div class="text-center my-4">
            <button type="submit" class="btn btn-success">Submit Application</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </div>
    </form>
</div>

    <h4 class="text-start fw-bold">PROCESS OF WALK IN REGISTRATIONS:</h4>
        <div class="row text-white justify-content-around gap-3">
            <div class="col col-md-2 bg-success p-5">
                <h5 class="fw-bold">step 1: </h5>
                <p class="px-2 text-start">
                    <i class="fa fa-check"></i> Go to the Calintaan community chapter Frat kubo or Officer
                </p>
            </div>
            <div class="col col-md-2 bg-success p-5">
                <h5 class="fw-bold">step 2: </h5>
                <p class="px-2 text-start">
                    <i class="fa fa-check"></i> Present ID and state your purpose
                </p>
            </div>
            <div class="col col-md-2 bg-success p-5">
                <h5 class="fw-bold">step 3: </h5>
                <p class="px-2 text-start">
                    <i class="fa fa-check"></i> Provide VALID Information
                </p>
            </div>
            <div class="col col-md-2 bg-success p-5">
                <h5 class="fw-bold">step 4: </h5>
                <p class="px-2 text-start">
                    <i class="fa fa-check"></i> Sign in to log book
                </p>
            </div>
        </div>
    <script>
    $(document).ready(function() {

    });
    </script>
</body>

</html>