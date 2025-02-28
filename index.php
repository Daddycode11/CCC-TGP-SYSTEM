<?php 
require_once './config.php';
if(isset($_SESSION['login']) && $_SESSION['login']) {
    switch($_SESSION['user_type']) {
        case 'admin':
            header('location: ./admin');
            break;
        case 'client':
            header('location: ./client');
            break;
        default:
            header('location: ./staff');
            break;
    }
}
?>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Calintaan Occidental Mindoro Municipal Grand Council</title>
    <link rel="icon" href="./src/assets/logo.png" type="image/x-icon" />
    <!-- Jquery -->
    <script src="./src/jquery/jquery.min.js"></script>

    <!-- Sweet Alert -->
    <script src="./src/sweetalert2/sweetalert2.all.min.js"></script>

    <!-- Axios -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js" integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- W3JS -->
    <script src="https://www.w3schools.com/lib/w3.js"></script>

    <!-- Font-awesome -->
    <link rel="stylesheet" href="./src/fontawesome/css/all.min.css" />

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <!-- Poppins font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />

    <!-- Google Icons -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <!-- Custom styles -->
    <style>
        * {
            font-family: "Poppins", sans-serif;
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            transition: all 0.5s;
        }

        body::-webkit-scrollbar {
            width: 0;
        }

        .header {
            text-align: center;
            padding: 40px 0;
        }

        .header img {
            width: 350px;
            height: auto;
        }

        .header h1 {
            font-size: 2.5rem;
            font-weight: 600;
            margin-top: 20px;
        }

        .header h3 {
            font-size: 1.5rem;
            margin-top: 10px;
        }

        .filter-btn-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }

        .filter-btn {
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 500;
            transition: background 0.3s;
        }

        .filter-btn.bg-yellow {
            background-color: #fbbf24;
        }

        .filter-btn.bg-blue {
            background-color: #fbbf24;
        }

        .filter-btn.bg-gray {
            background-color: #374151;
        }

        .filter-btn:hover {
            opacity: 0.8;
        }

        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 40px;
        }

        .service-card {
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .service-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .service-card .content {
            padding: 20px;
        }

        .service-card .content h2 {
            font-size: 1.25rem;
            font-weight: 600;
        }

        .service-card .content p {
            font-size: 1rem;
            color: #fbbf24;
            margin-top: 10px;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
        }

        .see-all-btn {
            display: block;
            width: 15%;
            padding: 10px;
            margin-top: 30px;
            background-color: #16a34a;
            color: white;
            text-align: center;
            border-radius: 8px;
            font-size: 1.10rem;
            font-weight: 400;
            transition: background-color 0.3s;
        }

        .see-all-btn:hover {
            background-color: #15803d;
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
                        href="./Announcement.php">
                        <span class="material-symbols-outlined">campaign</span>
                        Announcement</a>
                    <a class="nav-link d-flex align-items-center justify-content-start gap-2 text-light mx-3"
                        href="#">
                        <span class="material-symbols-outlined">call</span> Contact</a>
                    <a class="nav-link d-flex align-items-center justify-content-start gap-2 text-light mx-3"
                        href="./about.php">
                        <span class="material-symbols-outlined">info</span> About us</a>

                    <a onclick="w3.toggleShow('#login_form')"
                        class="nav-link d-md-none d-flex align-items-center justify-content-start gap-2 text-success mx-3"
                        href="#">
                        <span class="material-symbols-outlined">login</span> Login</a>
                    <a class="nav-link d-md-none d-flex align-items-center justify-content-start gap-2 text-success mx-3"
                        href="#" data-bs-toggle="modal" data-bs-target="#register">
                        <span class="material-symbols-outlined">add</span> Register</a>
                </div>
            </div>
        </div>
    </nav>
<div class="d-flex align-items-center justify-content-between p-3 bg-warning">
    <div class="container d-flex align-items-center justify-content-center gap-3 flex-wrap">
        <!-- Left Logo -->
        <img src="./src/assets/logo.png" width="90" height="90" class="rounded-circle flex-shrink-0" />

        <!-- Text -->
        <h1 class="fw-bold fs-4 text-center text-dark m-0 flex-grow-1">
            Calintaan Occidental Mindoro Municipal Grand Council
        </h1>

        <!-- Right Logo -->
        <img src="./src/assets/tgp-global.png" width="90" height="90" class="rounded-circle flex-shrink-0" />
    </div>

    <!-- Buttons (Login and Register) -->
    <div class="col-3 text-end d-none d-md-block">
        <button onclick="w3.toggleShow('#login_form')" class="btn btn-success text-white btn-sm px-3">Login</button>
        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#register" class="btn btn-light btn-sm px-4">Register</a>
    </div>
</div>
    <style>
@keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }

    @keyframes bounceIn {
      0% {
        opacity: 0;
        transform: scale(0.7);
      }
      60% {
        opacity: 1;
        transform: scale(1.1);
      }
      100% {
        transform: scale(1);
      }
    }

    .cloud-background {
      text-align: center;
      padding: 50px 20px;
      background: linear-gradient(180deg, #ffffff, #f0f0f0);
    }

    .logo {
      height: 150px;
      width: auto;
      margin-right: 10px;
      animation: bounceIn 1s ease-out;
    }

    .title {
      font-family: 'Times New Roman', Times, serif;
      font-weight: bold;
      color: gold;
      font-size: 4rem;
      text-shadow: 1px 1px 2px #000, -1px -1px 2px #fff;
      opacity: 0;
      animation: fadeInUp 1s ease-out 0.5s forwards;
    }

    .advocacy-text {
      font-weight: bold;
      font-size: 1.5rem;
      color: #333;
      margin: 10px 0;
      opacity: 0;
      animation: fadeIn 1s ease-out 1s forwards;
    }

    .btn-warning, .btn-primary {
      display: inline-block;
      padding: 10px 20px;
      font-size: 1.2rem;
      border-radius: 5px;
      text-decoration: none;
      transition: all 0.3s ease-in-out;
    }

    .btn-warning {
      background-color: #ffc107;
      color: #000;
    }

    .btn-primary {
      background-color: #007bff;
      color: #fff;
      font-weight: bold;
    }

    .btn-warning:hover, .btn-primary:hover {
      transform: scale(1.1);
    }
   </style>
</head>
<body>

<div class="cloud-background">
  <img src="./src/assets/Tgp-Logo.png" alt="Logo" class="logo">
  
  <h1 class="title">
    <span>TAU GAMMA PHI</span><br>
    <span>TRISKELIONS' GRAND FRATERNITY</span>
  </h1>

  <h1 class="advocacy-text">SUPPORT ADVOCACY, PROMOTE INTEGRITY</h1>
  <h1 class="advocacy-text">BE THE CHANGE</h1>
  <h1 class="advocacy-text">SAY NO TO HAZING</h1>

  <div class="mt-3">
    <span class="advocacy-text">REPUBLIC ACT 11053</span>
    <a href="https://elibrary.judiciary.gov.ph/thebookshelf/showdocs/2/85055" target="_blank" class="btn btn-warning">Read More</a>
  </div>

  <div class="mt-3">
    <a href="https://www.taugammaphi.global/register" target="_blank" class="btn btn-primary">TRISKELION REGISTRATION</a>
  </div>
</div>

<style>
  .cloud-background {
    background: url('https://www.transparenttextures.com/patterns/clouds.png'), linear-gradient(to bottom, #e0f7fa, #80deea);
    background-size: cover;
    padding: 50px;
    border-radius: 10px;
  }

  .btn-primary:hover {
    background-color: gold !important;
    color: black !important;
  }
  .cloud-background {
  background: linear-gradient(to bottom, #e0f7fa, #80deea, #b3e5fc);
  padding: 50px;
  border-radius: 10px;
}
</style>

</div>
    <div style="
        min-height: 100vh;
        background: url(./src/assets/bg_council.jpg);
        background-repeat: no-repeat;
        background-size: 100% 112%;
        filter: brightness(80%);
      " class="w-full d-flex align-items-center justify-content-center position-relative">
    <h1 class="text-center p-5 text-white text-uppercase font-weight-bolder shadow-lg rounded"
        style="background: rgba(0, 0, 0, 0.7); font-size: 3rem; letter-spacing: 2px; line-height: 1.4;">
        Calintaan Occidental Mindoro Municipal Grand Council  
        Online Registration Information System For Incoming Members
    </h1>
</div>

<!-- login form -->
<form id="login_form" action="javascript:void(0)" method="POST"
    class="col-12 shadow-lg col-md-4 bg-light p-4 position-absolute"
    style="left: 0; top: 0; height: 100%; display: none;">
    <div class="text-center mb-4">
        <img src="./src/assets/WATER MARK.png" alt="Logo" style="height: 80px; width: auto;" />
    </div>
    <h1 class="p-2 mt-4 fw-bold fs-4 text-dark" style="border-left: 5px solid gold;">Login Account</h1>
    <!-- message container -->
    <div id="msg_container_login"></div>
    <div class="form-group mt-3">
        <label for="">Email address</label>
        <input required type="email" class="form-control form-control-md" name="email"
            placeholder="Your email address">
    </div>
    <div class="form-group mt-3">
        <label for="">Password</label>
        <input required type="password" class="form-control form-control-md" name="password"
            placeholder="Your password">
    </div>
    <div class="row py-2">
        <div class="col">
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input p-2" name="show">
                    Remember me
                </label>
            </div>
        </div>
        <div class="col text-end">
            <a href="#" class="nav-link text-primary">Forgot password?</a>
        </div>
    </div>
    <div class="text-center mt-3">
        <button type="submit" class="btn btn-warning px-4 btn_login">Login</button>
        <button type="button" data-bs-toggle="modal" data-bs-target="#register"
            class="btn btn-dark px-4">Signup</button><br><br>
    </div>
</form>
</div>
<!-- Modal -->
<form method="POST" action="javascript:void(0)" class="modal fade" id="register" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content rounded-0 border border-5" style="border-color: gold;">
            <div class="modal-header" style="background-color: gold;">
                 <img src="./src/assets/logo.png" alt="Logo" style="height: 80px; width: auto;" />
                
               <h1 class="modal-title text-center w-100 text-black fw-bold" id="staticBackdropLabel" 
    style="font-size: 2rem; letter-spacing: 1px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);">
    REGISTRATION FORM
</h1>
            <button type="reset" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
    style="background: success; border: none; font-size: 1.5rem; color: #721c24; transition: color 0.3s ease;">
    <i class="bi bi-x-lg"></i>
</button>

            </div>
            <div class="modal-body">
                <!-- message container -->
                <div id="msg_container"></div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Full Name:</label>
                            <input required type="text" class="form-control form-control-md" name="fullname" />
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Contact Number:</label>
                            <input required type="text" class="form-control form-control-md" name="contact_no"
                                pattern="\d{11}" title="Please enter a 11-digit cellphone number" />
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Gender:</label>
                            <select required name="gender" class="form-select">
                                <option disabled selected class="d-none"></option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Email:</label>
                            <input required type="email" class="form-control form-control-md" name="email" />
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Address:</label>
                            <input required type="address" class="form-control form-control-md" name="address" />
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Age:</label>
                            <input required type="number" class="form-control form-control-md" name="age" />
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Password:</label>
                            <input required type="password" class="form-control form-control-md" name="password" />
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Birthday:</label>
                            <input required type="date" class="form-control form-control-md" name="birthday" />
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Status:</label>
                            <select required name="status" class="form-select">
                                <option disabled selected class="d-none"></option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="background-color: gold;">
                <button type="reset" class="btn btn-danger btn_cancel" data-bs-dismiss="modal">
                    Cancel
                </button>
                <button type="submit" class="btn btn-success btn_submit">
                    Submit
                </button>
            </div>
        </div>
    </div>
</form>
   </div>
<div
  class="row justify-content-center align-items-center"
  style="
    background-color: rgba(243, 247, 243, 0.23);
    background-image: url('assets/img/gallery/municipality bg.png');
    background-size: cover;
  "
>
  <div class="col-lg-7 text-center mb-6">
    <span
      style="
        color: #FFD700;
        font-family: 'Crotah free version', BCrotah free version;
        font-size: 45px;
      "
      class="fadeIn"
    >
      <span style="font-size: 70px">A</span><b>bout Calintaan Triskelion</b>
    </span>
    <span class="text-1200 fs--1 fw-normal"></span>
    <!-- Image 1 -->
    <img
      src="./src/assets/bG.jpg"
      alt="Your Image"
      style="display: block; margin: 10px auto; max-width: 100%; height: auto"
    />
  </div>
  <div class="col-lg-5 text-center">
    <!-- Image 2 -->
    <img
      src="../../assets/gewan 2 png.png"
      alt="Your Second Image"
      style="display: block; margin-top: 10px; width: 100%; height: auto"
    />
    <!-- Text below Image 2 -->
    <div
      style="
        margin-top: 8px;
        font-family: 'Comic Sans MS', sans-serif;
        text-align: justify;
      "
    >
      <p style="color: black">
      The term "Calintaan Triskelions" refers to members of the Calintaan 
      Occidental Mindoro Municipal Grand Council, which was established 
      on June 3, 2023. It is distinguished as the first council in 
      Occidental Mindoro to receive official recognition from any 
      Tau Gamma Phi council. The alignment of this council with T
      au Gamma Phi Global was the result of a collective decision, 
      grounded in thorough education and a steadfast commitment to 
      uphold the vision of the Founding Fathers, while faithfully 
      living the Triskelion way of life.
      </p>
      <!-- Learn More Button -->
      <a href="#" class="btn btn-success">Learn More</a>
    </div>
    <div></div>
  </div>
<br>
<br>
<br>
<body class="bg-gray-100">

    <div class="header">
        <img src="./src/assets/WATER MARK.png" alt="Logo">
        <h1>Calintaan Triskelion Community Services 2025</h1>
        <h3>(Kalikasan, Kalusugan at Kabataan)</h3>
    </div>

    <div class="filter-btn-container">
        <button class="filter-btn bg-yellow" data-category="all">All</button>
        <button class="filter-btn bg-gray" data-category="calintaan">Calintaan Community Chapter</button>
        <button class="filter-btn bg-gray" data-category="iriron">Barangay Iriron Community Chapter</button>
        <button class="filter-btn bg-gray" data-category="dagupan">Barangay Dagupan Community Chapter</button>
        <button class="filter-btn bg-gray" data-category="tanyag">Barangay Tanyag Community Chapter</button>
    </div>

    <div class="gallery">
        <!-- Calintaan Community Chapter -->
        <div class="service-card calintaan">
            <img src="./src/assets/clean up drive.jpg" alt="Clean-Up Drive">
            <div class="content">
                <h2>Clean-Up Drive</h2>
                <p>Organized by the Calintaan Community Chapter.</p>
            </div>
        </div>

        <div class="service-card calintaan">
            <img src="./src/assets/tree planting.jpg" alt="Tree Planting">
            <div class="content">
                <h2>Tree Planting Initiative</h2>
                <p>A greener future led by Calintaan Chapter.</p>
            </div>
        </div>

        <!-- Barangay Iriron Community Chapter -->
        <div class="service-card iriron">
            <img src="./src/assets/feeding program.jpg" alt="Feeding Program">
            <div class="content">
                <h2>Feeding Program</h2>
                <p>Led by Barangay Iriron Chapter.</p>
            </div>
        </div>

        <!-- Barangay Dagupan Community Chapter -->
        <div class="service-card dagupan">
            <img src="./src/assets/blood letting.jpg" alt="Blood Donation Drive">
            <div class="content">
                <h2>Blood Donation Drive</h2>
                <p>Barangay Dagupan Chapter's initiative.</p>
            </div>
        </div>

        <!-- Barangay Tanyag Community Chapter -->
        <div class="service-card tanyag">
            <img src="https://via.placeholder.com/400" alt="Medical Mission">
            <div class="content">
                <h2>Medical Mission</h2>
                <p>Organized by Barangay Tanyag Chapter.</p>
            </div>
        </div>
    </div>

    <a href="#" class="see-all-btn">See All Community Services</a>
</br>
</br>
</br>
<footer class="bg-dark text-light py-4">
  <div class="container">
    <div class="row">
      <!-- Logo & Motto -->
      <div class="col-md-4 text-center text-md-start mb-3">
        <img src="./src/assets/2nd water mark.png" alt="Tau Gamma Phi Logo" style="max-width: 450px;">
        <h5 class="mt-2 fw-bold text-warning">Tau Gamma Phi</h5>
        <p class="fst-italic">"A True Triskelion is Always a Triskelion"</p>
      </div>

      <!-- Quick Links -->
      <div class="col-md-4 text-center mb-3">
        <h5 class="text-warning">Quick Links</h5>
        <ul class="list-unstyled">
          <li><a href="#" class="text-light text-decoration-none">Home</a></li>
          <li><a href="#" class="text-light text-decoration-none">About Us</a></li>
          <li><a href="#" class="text-light text-decoration-none">Membership</a></li>
          <li><a href="#" class="text-light text-decoration-none">Contact</a></li>
        </ul>
      </div>

      <!-- Contact & Social Media -->
      <div class="col-md-4 text-center text-md-end mb-3">
        <h5 class="text-warning">Contact Us</h5>
        <p class="mb-1"><i class="fas fa-map-marker-alt text-warning"></i> Calintaan Occidental Mindoro Municipal Grand Council</p>
        <p class="mb-1"><i class="fas fa-envelope text-warning"></i> calintaantriskelion02@gmail.com</p>
        <p class="mb-1"><i class="fas fa-phone text-warning"></i> +63 9811152433</p>
        <div class="mt-3">
          <a href="#" class="text-light me-3"><i class="fab fa-facebook fa-lg"></i></a>
          <a href="#" class="text-light me-3"><i class="fab fa-twitter fa-lg"></i></a>
          <a href="#" class="text-light"><i class="fab fa-instagram fa-lg"></i></a>
        </div>
      </div>
    </div>

    <!-- Copyright -->
    <div class="text-center border-top pt-3 mt-3">
      <p class="mb-0">© 2025 Tau Gamma Phi. All Rights Reserved.</p>
    </div>
  </div>
</footer>

<!-- FontAwesome for icons (if not included already) -->
<script src="https://kit.fontawesome.com/YOUR-FONTAWESOME-KIT.js" crossorigin="anonymous"></script>

    <script>
        // JavaScript for filtering
        document.querySelectorAll('.filter-btn').forEach(button => {
            button.addEventListener('click', function () {
                const category = this.getAttribute('data-category');

                document.querySelectorAll('.filter-btn').forEach(btn => {
                    btn.classList.remove('bg-blue', 'bg-yellow'); // Remove active styles
                    btn.classList.add('bg-gray'); // Set inactive styles
                });

                this.classList.remove('bg-gray'); // Remove inactive style
                this.classList.add(category === "all" ? 'bg-yellow' : 'bg-blue'); // Set active style

                document.querySelectorAll('.service-card').forEach(card => {
                    if (category === "all") {
                        card.style.display = "block";
                    } else {
                        card.style.display = card.classList.contains(category) ? "block" : "none";
                    }
                });
            });
        });
    </script>
    
    <script>
    $(document).ready(function() {
        const abortController = new AbortController();
        $(".btn_cancel").on("click", function() {
            abortController.abort();
            setTimeout(function() {
                location.reload();
            }, 1000);
        });

        $("#register").on("submit", function(ev) {
            ev.preventDefault();
            const data = $(this).serialize();
            btnTrigger(
                ".btn_submit",
                true,
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Please wait..'
            );

            const signal = abortController.signal;
            axios
                .post("./handle_register.php", data, {
                    signal
                })
                .then(function(res) {
                    btnTrigger(".btn_submit", false, "Submit");
                    $("#msg_container").html(res.data);
                    if (res.data == '') {
                        Swal.fire(
                            "Congratulations!",
                            "You have successfully registered",
                            "success"
                        );

                        setTimeout(() => {
                            location.reload();
                        }, 2000);
                    }
                })
                .catch(function(error) {
                    if (error.name === "AbortError") {
                        btnTrigger(".btn_submit", false, "Submit");
                        $("#msg_container").html(error);
                        Swal.fire(
                            "The action you initiated has been revoked!",
                            "",
                            "success"
                        );
                    } else {
                        btnTrigger(".btn_submit", false, "Submit");
                        Swal.fire("Something went wrong!", "please try again", "error");
                    }
                });
        });


        $('#login_form').on('submit', function(e) {
            e.preventDefault();
            const data = $(this).serialize();
            btnTrigger(
                ".btn_login",
                true,
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Please wait..'
            );

            axios
                .post("./handle_login.php", data)
                .then(function(res) {
                    btnTrigger(".btn_login", false, "Login");
                    $("#msg_container_login").html(res.data);
                    if (res.data == '') {
                        Swal.fire(
                            "Congratulations!",
                            "Signed in successfully",
                            "success"
                        );
                        setTimeout(() => {
                            location.reload();
                        }, 2000);
                    }
                })
                .catch(function(error) {
                    btnTrigger(".btn_login", false, "Login");
                    Swal.fire("Something went wrong!", "please try again", "error");
                });
        })

        function btnTrigger(s, disabled, str) {
            $(s).html(str);
            $(s).prop("disabled", disabled);
        }
    });
    </script>
</body>

</html>