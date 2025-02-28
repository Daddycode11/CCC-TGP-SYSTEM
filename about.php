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
            ABOUT US
        </h1>

        <!-- Right Logo -->
        <img src="./src/assets/tgp-global.png" width="90" height="90" class="rounded-circle flex-shrink-0" />
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

    <div
      style="min-height: 80vh;"
      class="w-full"
    >
    <div class="container-fluid">
      <div class="container p-5">
        <button class="btn btn-Warning  rounded-0 px-5">Welcome</button>
        <div class="container-fluid rounded border boder-2 border-Warning p-4">
          <p>Welcome to the official website of the Calintaan Triskelions!
             As a chartered chapter of Tau Gamma Phi Global, we proudly support 
             RA 11053, the Anti-Hazing Law. Our programs focus on empowering the 
             community through initiatives such as Calintaan Triskelions para sa Kalikasan, 
             Calintaan Triskelions para sa Kabataan, and Calintaan Triskelions para sa Kalusugan. 
Our council was Established on June 3, 2023, witnessed and signed by FF Talek Pablo and Global 
GT Jewelord Peralta. We are committed to honor, excellence, and the values outlined in the 
Tenets and Code of Conduct of Tau Gamma Phi. Thank you for visiting, and we invite you to 
be one of us and together let us make a positive impact!</p>
        </div>
      </div>
      <div class="container py-2 p-5">
        <button class="btn btn-warning rounded-0 px-5">VISSION</button>
        <div class="container-fluid rounded border boder-2 border-warning p-4">
          <p>A model ..................sample</p>
        </div>
      </div>
    </div>
    </div>

    <!-- Modal -->
    <form
      method="POST"
      action="javascript:void(0)"
      class="modal fade"
      id="register"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
      tabindex="-1"
      aria-labelledby="staticBackdropLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content rounded-0 border border-5 border-success">
          <div class="modal-header">
            <h1 class="modal-title fs-5 text-center" id="staticBackdropLabel">
              REGISTRATION FORM
            </h1>
            <button
              type="reset"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <!-- message container -->
            <div id="msg_container"></div>

            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="">Full Name:</label>
                  <input
                    required
                    type="text"
                    class="form-control form-control-md"
                    name="fullname"
                  />
                </div>
                <div class="form-group mt-2">
                  <label for="">Contact Number:</label>
                  <input
                    required
                    type="text"
                    class="form-control form-control-md"
                    name="contact_no"
                    pattern="\d{11}" 
                    title="Please enter a 11-digit cellphone number"
                  />
                </div>
                <div class="form-group mt-2">
                  <label for="">Gender:</label>
                  <select required name="gender" class="form-select">
                    <option disabled selected class="d-none"></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="">Email:</label>
                  <input
                    required
                    type="email"
                    class="form-control form-control-md"
                    name="email"
                  />
                </div>
                <div class="form-group mt-2">
                  <label for="">Address:</label>
                  <input
                    required
                    type="address"
                    class="form-control form-control-md"
                    name="address"
                  />
                </div>
                <div class="form-group mt-2">
                  <label for="">Age:</label>
                  <input
                    required
                    type="number"
                    class="form-control form-control-md"
                    name="age"
                  />
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="">Password:</label>
                  <input
                    required
                    type="password"
                    class="form-control form-control-md"
                    name="password"
                  />
                </div>
                <div class="form-group mt-2">
                  <label for="">Birthday:</label>
                  <input
                    required
                    type="date"
                    class="form-control form-control-md"
                    name="birthday"
                  />
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
          <div class="modal-footer">
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

    <script>
      $(document).ready(function () {
        const abortController = new AbortController();
        $(".btn_cancel").on("click", function () {
          abortController.abort();
          setTimeout(function() {
            location.reload();
          }, 1000);
        });

        $("#register").on("submit", function (ev) {
          ev.preventDefault();
          const data = $(this).serialize();
          btnTrigger(
            ".btn_submit",
            true,
            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Please wait..'
          );

          const signal = abortController.signal;
          axios
            .post("./handle_register.php", data, { signal })
            .then(function (res) {
              btnTrigger(".btn_submit", false, "Submit");
              $("#msg_container").html(res.data);
              if(res.data == '') {
                Swal.fire(
                  "Congratulations!",
                  "You have successfully registered",
                  "success"
                );
              }
            })
            .catch(function (error) {
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

        function btnTrigger(s, disabled, str) {
          $(s).html(str);
          $(s).prop("disabled", disabled);
        }
      });
    </script>
  </body>
</html>
