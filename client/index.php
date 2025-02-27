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
    <div class="container mt-4">
    <div class="d-flex flex-column justify-content-center align-items-center p-4 text-center border border-secondary rounded" style="min-height: 30vh;">
        <div class="d-flex align-items-center">
            <!-- Left Logo -->
            <img src="../src/assets/TGP logo.png" alt="Left Logo" class="me-3" style="height: 120px;">

            <!-- Text Content with Animated Typing Effect -->
            <div class="text-center">
                <h2 class="fw-bold typing-effect">WELCOME</h2>
                <h2 class="fw-bold typing-effect">Select Chapter address for</h2>
                <h2 class="fw-bold typing-effect">Online Registration System</h2>
                <h4 class="fw-bold typing-effect">(TDAP)</h4>
            </div>

            <!-- Right Logo -->
            <img src="../src/assets/tgp-global.png" alt="Right Logo" class="ms-3" style="height: 120px;">
        </div>
    </div>
</div>

<style>
/* Fade-in Animation for Container */
.animated-container {
  opacity: 0;
  animation: fadeInContainer 1.5s ease-out forwards;
}

@keyframes fadeInContainer {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}

/* Slide-in Animation for Left Logo */
.animated-logo-left {
  opacity: 0;
  transform: translateX(-50px);
  animation: slideInLeft 1s ease-out forwards;
}

@keyframes slideInLeft {
  0% {
    opacity: 0;
    transform: translateX(-50px);
  }
  100% {
    opacity: 1;
    transform: translateX(0);
  }
}

/* Slide-in Animation for Right Logo */
.animated-logo-right {
  opacity: 0;
  transform: translateX(50px);
  animation: slideInRight 1s ease-out forwards;
}

@keyframes slideInRight {
  0% {
    opacity: 0;
    transform: translateX(50px);
  }
  100% {
    opacity: 1;
    transform: translateX(0);
  }
}

/* Text Fade-in Animation */
.animated-text h2, .animated-text h4 {
  opacity: 0;
  transform: translateY(30px);
  animation: fadeInText 1s ease-out forwards;
}

@keyframes fadeInText {
  0% {
    opacity: 0;
    transform: translateY(30px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Delay for Text Animation */
.animated-text h2:nth-child(1) {
  animation-delay: 0.3s;
}

.animated-text h2:nth-child(2) {
  animation-delay: 0.5s;
}

.animated-text h2:nth-child(3) {
  animation-delay: 0.7s;
}

.animated-text h4 {
  animation-delay: 1s;
}

/* Hover Effect for Logos */
.animated-logo-left:hover, .animated-logo-right:hover {
  transform: scale(1.1);
  transition: transform 0.3s ease-in-out;
}
/* Keyframes for Typing Animation */
@keyframes typing {
  0% {
    width: 0;
  }
  100% {
    width: 100%;
  }
}

/* Setting up typing effect for the text */
.typing-effect {
  display: inline-block;
  overflow: hidden;
  white-space: nowrap;
  border-right: 3px solid #000; /* Cursor effect */
  width: 0;
  animation: typing 4s steps(30) 1s forwards, blink-caret 0.75s step-end infinite;
}

/* Blinking cursor effect */
@keyframes blink-caret {
  50% {
    border-color: transparent;
  }
}

/* Optional - Adjust the timing and delay */
.typing-effect:nth-child(1) {
  animation-duration: 4s;
}

.typing-effect:nth-child(2) {
  animation-duration: 5s;
  animation-delay: 4s;
}

.typing-effect:nth-child(3) {
  animation-duration: 5s;
  animation-delay: 9s;
}

.typing-effect:nth-child(4) {
  animation-duration: 3s;
  animation-delay: 14s;
}

/* Increase space between logos */
.me-5 {
  margin-right: 50px; /* Increase space between the left logo and the text */
}

.ms-5 {
  margin-left: 50px; /* Increase space between the right logo and the text */
}

</style>
<div class="container mt-4">
  <div class="d-flex flex-wrap justify-content-center gap-3">
    <a href="./Calintaan_com_chapter.php" class="btn btn-warning text-white p-4 text-center rounded animated-card" style="width: 250px;">
      <img src="../src/assets/ccc.png" class="rounded-circle border animated-img" style="height: 150px; width: 150px;" alt="Calintaan_com_chapter" />
      <h4 class="mt-3 animated-text">CALINTAAN COMMUNITY CHAPTER</h4>
    </a>
    <a href="./Iriron_com_chapter.php" class="btn btn-warning text-white p-4 text-center rounded animated-card" style="width: 250px;">
      <img src="../src/assets/iriron.jpg" class="rounded-circle border animated-img" style="height: 150px; width: 150px;" alt="Iriron Chapter" />
      <h4 class="mt-3 animated-text">Brgy. IRIRON COMMUNITY CHAPTER</h4>
    </a>
    <a href="#" class="btn btn-warning text-white p-4 text-center rounded animated-card" style="width: 250px;">
      <img src="../src/assets/dagupan.jpg" class="rounded-circle border animated-img" style="height: 150px; width: 150px;" alt="Dagupan Chapter" />
      <h4 class="mt-3 animated-text">Brgy. DAGUPAN COMMUNITY CHAPTER</h4>
    </a>
    <a href="#" class="btn btn-warning text-white p-4 text-center rounded animated-card" style="width: 250px;">
      <img src="../src/assets/tanyag.jpg" class="rounded-circle border animated-img" style="height: 150px; width: 150px;" alt="Tanyag Chapter" />
      <h4 class="mt-3 animated-text">Brgy. TANYAG COMMUNITY CHAPTER</h4>
    </a>
  </div>
</div>
<style>
/* Scale and fade-in animation for each card with a longer duration */
.animated-card {
  opacity: 0;
  transform: scale(0.95);
  animation: fadeInCard 1.5s ease-out forwards; /* Increased time */
  transition: transform 0.5s ease-in-out; /* Increased transition time */
}

/* Animation for Image with a longer duration */
.animated-img {
  opacity: 0;
  transform: scale(0.8);
  animation: fadeInImage 1.5s ease-out forwards; /* Increased time */
}

/* Animation for Text with a longer duration */
.animated-text {
  opacity: 0;
  transform: translateY(30px);
  animation: fadeInText 1.5s ease-out forwards; /* Increased time */
}

/* Fade-in effect for the card with a longer duration */
@keyframes fadeInCard {
  0% {
    opacity: 0;
    transform: scale(0.95);
  }
  100% {
    opacity: 1;
    transform: scale(1);
  }
}

/* Fade-in effect for the image with a longer duration */
@keyframes fadeInImage {
  0% {
    opacity: 0;
    transform: scale(0.8);
  }
  100% {
    opacity: 1;
    transform: scale(1);
  }
}

/* Fade-in effect for the text with a longer duration */
@keyframes fadeInText {
  0% {
    opacity: 0;
    transform: translateY(30px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Hover effect for cards (scale and shadow) */
.animated-card:hover {
  transform: scale(1.05);
  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);
  transition: transform 0.5s ease; /* Longer transition */
}

/* Hover effect for images */
.animated-img:hover {
  transform: scale(1.1);
  transition: transform 0.4s ease; /* Longer transition */
}

/* Hover effect for text */
.animated-text:hover {
  color: #f1f1f1;
  transition: color 0.4s ease; /* Longer transition */
}

</style>


</div>
<br>
<br>
    <script>
    $(document).ready(function() {

    });
    </script>
</body>

</html>