<?php
   require_once "submit-msg.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Lightweight</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <link rel="stylesheet" href="assets/styles/common.css">
</head>
<body class="main">
   <!-- top bar -->
   <nav class="navbar navbar-expand-md top-navbar">
      <div class="container-fluid">
         <h1>
            <a class="navbar-brand" href="#">Lightweight</a>
         </h1>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <img class="nav-button" width="25px" src="./assets/img/menu-symbol.svg"/>
          </button>
         <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
               <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
               <li class="nav-item"><a class="nav-link" href="services.html">Services</a></li>
               <li class="nav-item"><a class="nav-link" href="gallery.html">Gallery</a></li>
               <li class="nav-item"><a class="nav-link" href="workout-planner.html">Workout Planner</a></li>
               <li class="nav-item"><a class="nav-link" href="about-us.html">About Us</a></li>
               <li class="nav-item"><a class="nav-link" href="contact-us.php">Contact Us</a></li>
               <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
            </ul>
         </div>
      </div>
   </nav>
   <main class="main d-flex flex-row">
      <div class="container-fluid m-5">
         <div class="row">
            <div class="col-6">
               <div class="contact-card">
                  <!-- our office section -->
                  <div class="mb-3">
                     <h2>Our Office</h2>
                  </div>
                  <div class="mb-3">
                     <iframe 
                     src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.295875833723!2d106.80133567458952!3d-6.224663760962081!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f14e455ccd9f%3A0xd635e33c7c001b3d!2sfX%20Sudirman!5e0!3m2!1sen!2sid!4v1720096895351!5m2!1sen!2sid" 
                     class="w-100"
                     style="border:0;" 
                     allowfullscreen="" 
                     loading="lazy" 
                     referrerpolicy="no-referrer-when-downgrade">
                     </iframe>
                  </div>
                  <div class="row">
                     <div class="col-1">
                        <div class="contact-card-icon">
                           <img src="assets/icons/location-pin.png" alt="">
                        </div>
                     </div>
                     <p class="col-11">fX Sudirman, Jl. Jenderal Sudirman, 
                        <br>Kecamatan Tanah Abang, Kota Jakarta Pusat, 
                        <br>Daerah Khusus Ibukota Jakarta 10270</p>
                  </div>
               </div>
            </div>
            <div class="col-6 h-100">
               <div class="contact-card h-100">
                  <!-- our office section -->
                  <div class="mb-5">
                     <h2>Get in Touch</h2>
                  </div>
                  <!-- contacts table -->
                  <div class="container">
                     <div class="row">
                        <div class="col-1">
                           <div class="contact-card-icon">
                              <img src="assets/icons/mail.png" alt="">
                           </div>
                        </div>
                        <p class="col-11">customer.service<wbr/>@lightweight.com</p>
                     </div>
                     <div class="row">
                        <div class="col-1">
                           <div class="contact-card-icon">
                              <img src="assets/icons/phone.png" alt="">
                           </div>
                        </div>
                        <p class="col-11">+62-1234-56789</p>
                     </div>
                     <div class="row">
                        <div class="col-1">
                           <div class="contact-card-icon">
                              <img src="assets/icons/instagram-white-icon.png" alt="">
                           </div>
                        </div>
                        <p class="col-11">@lightweight</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col">
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
               ?>
               <div class="contact-card <?php if(isset($successMsg)) echo "d-none";?>">
                  <!-- our office section -->
                  <div class="mb-3">
                     <h2>Message Us</h2>
                  </div>
                  <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col">
                              <div class="form-group mb-2">
                                 <label for="firstName">First Name</label>
                                 <input type="text" class="form-control" name="firstName" placeholder="Bruce" required>
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
                           <input type="email" class="form-control" name="email" placeholder="batman@justiceleague.com" required>
                        </div>
                        <div class="form-group mb-2">
                           <label for="phoneNumber">Phone Number</label>
                           <input type="text" class="form-control" name="phoneNumber" placeholder="+12-2345-6789">
                        </div>
                        <div class="form-group mb-2">
                           <label for="subject">Subject</label>
                           <input type="text" class="form-control" name="subject" placeholder="Im batman" required>
                        </div>
                        <div class="form-group mb-2">
                           <label for="message">Message</label>
                           <textarea class="form-control" name="message" rows="3"
                              placeholder="Not the hero Gotham needs" required></textarea>
                         </div>
                        <button name="submit-msg" type="submit" class="btn btn-primary mt-3">Submit</button>
                     </div>
                   </form>
               </div>
            </div>
         </div>
      </div>
   </main>
   <footer>

   </footer>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>