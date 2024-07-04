<?php
   require_once "register-user.php"
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
               <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
            </ul>
         </div>
      </div>
   </nav>
   <main class="main d-flex flex-column align-items-center vh-100">
      <?php
         if(isset($errorMsg)){
            echo "
            <div class=\"error-container px-5 py-3 mt-4\">
               $errorMsg
            </div>
            ";
         }
         if(isset($successMsg)){
            echo "
            <div class=\"success-container px-5 py-3 mt-4\">
               $successMsg
            </div>
            ";
         }
         // spacing
         if(!isset($successMsg)&& !isset($errorMsg)){
            echo "<div class=\"mt-5\"></div>";
         }
      ?>
      <div class="container-fluid login-card px-5 mt-3 w-75">
         <!-- Register form -->
         <div class="my-4">
            <h2>Register</h2>
         </div>
         <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
            <div class="row">
               <div class="col">
                  <div class="form-group mb-2">
                     <label for="firstName">First Name</label>
                     <input type="text" class="form-control" name="firstName" placeholder="Bruce">
                   </div>
               </div>
               <div class="col">
                  <div class="form-group mb-2">
                     <label for="lastName">Last Name</label>
                     <input type="text" class="form-control" name="lastName" placeholder="Wayne">
                   </div>
               </div>
            </div>
            <div class="form-group mb-2">
               <label for="email">Email</label>
               <input type="email" class="form-control w-100" name="email" placeholder="batman@justiceleague.com">
            </div>
            <div class="form-group mb-2">
               <label for="password">Password</label>
               <input type="password" class="form-control w-100" name="password">
            </div>
            <div class="form-group mb-2">
               <label for="password">Confirm Password</label>
               <input type="password" class="form-control w-100" name="confirmPassword">
            </div>
            <button type="submit" name="register" class="w-50 btn btn-primary my-4 mx-auto d-block py-2">Sign Up</button>
         </form>
      </div>
   </main>
   <footer>

   </footer>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>
</body>

</html>