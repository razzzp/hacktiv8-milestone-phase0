<?php
   require_once "login-user.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Lightweight</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <link rel="stylesheet" href="assets/styles/common.css">
   <link rel="stylesheet" href="assets/styles/services.css">
</head>

<body class="main">
   <!-- top bar -->
   <nav class="navbar navbar-expand-md top-navbar">
      <div class="container-fluid">
         <h1>
            <a class="navbar-brand" href="#">Lightweight</a>
         </h1>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <img class="nav-button" width="25px" src="./assets/img/menu-symbol.svg" />
         </button>
         <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
               <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
               <li class="nav-item"><a class="nav-link" href="services.html">Services</a></li>
               <li class="nav-item"><a class="nav-link" href="gallery.html">Gallery</a></li>
               <li class="nav-item"><a class="nav-link" href="workout-planner.html">Workout Planner</a></li>
               <li class="nav-item"><a class="nav-link" href="about-us.html">About Us</a></li>
               <li class="nav-item"><a class="nav-link" href="contact-us.html">Contact Us</a></li>
               <li class="nav-item"><a class="nav-link" href="login.html">Login</a></li>
            </ul>
         </div>
      </div>
   </nav>
   <main class="main d-flex flex-column align-items-center vh-100">
      <div class="container-fluid login-card px-5 mt-5">
         <!-- our office section -->

         <div class="my-5">
            <h2>Login</h2>
         </div>
         <form>
            <div class="form-group mb-4">
               <label for="email">Email</label>
               <input type="email" class="form-control-lg w-100" name="email" placeholder="batman@justiceleague.com">
            </div>
            <div class="form-group mb-4">
               <label for="password">Password</label>
               <input type="password" class="form-control-lg w-100" name="password">
            </div>
            <div class="form-check">
               <input type="checkbox" class="form-check-input" id="remember">
               <label class="form-check-label" for="remember">Remember Me</label>
             </div>
            <button type="submit" class="w-50 btn btn-primary my-5 mx-auto d-block py-2">Login</button>
         </form>
         <p class="text-center mx-auto">Don't have an account? <a href="register.php"><b>Sign Up</b></a></p>
      </div>
   </main>
   <footer>

   </footer>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>
</body>

</html>