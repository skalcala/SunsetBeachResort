<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUNSET BEACH RESORT AND HOTEL - ABOUT</title>
    <link rel="icon" type="image/png" href="logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css"/>
    <?php require('inc/links.php'); ?>
    <style>
      .box{
        border-top-color: #f34208 !important;
      }
      .box:hover{
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.2);
      }
    </style>
</head>
<body class="bg-light">

   <?php require('inc/header.php'); ?>

<div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center">ABOUT US</h2>
    <div class="h-line bg-dark"></div>
    <p class="text-center mt-3">
      At Sunset Beach Resort and Hotel, we pride ourselves on offering a wide range of exceptional<br> services to ensure your stay is both comfortable and memorable. Our dedicated team is committed to <br>providing top-notch hospitality and personalized experiences for every guest.
    </p>
   </div>
   
   <div class="container">
    <div class="row justify-content-between align-items-center">
      <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-1 order-2">
       
        <h3 class="mb-3">Welcome to Sunset Beach Resort and Hotel</h3>
        <p>
          Nestled along the pristine shores of a tropical paradise, Sunset Beach Resort and Hotel offers an unparalleled blend of luxury, comfort, and natural beauty. Our resort is designed to provide guests with a serene escape from the hustle and bustle of everyday life, where they can unwind and rejuvenate in a tranquil setting.
          Our accommodations are thoughtfully designed to cater to the needs of every traveler, whether you're seeking a romantic getaway, a family vacation, or a solo adventure. Each room and suite is elegantly furnished with modern amenities, ensuring a comfortable and memorable stay.
          At Sunset Beach Resort and Hotel, we are committed to providing exceptional service and creating unforgettable experiences for our guests. From our world-class dining options to our array of recreational activities, we strive to exceed your expectations at every turn.
          We invite you to explore our website to learn more about our offerings and discover why Sunset Beach Resort and Hotel is the perfect destination for your next vacation. We look forward to welcoming you and making your stay truly special.
        </p>
         
      </div>
      <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-md-2 order-1">
        <img src="images/features/kyle.jpg" class="w-100 rounded shadow">
      </div>
    </div>
  </div>

  <div class="container mt-5">
    <div class="row">
      <div class="col-lg-3 col-md-6 mb-4 px-4">
        <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
          <img src="images/about/hotel.svg" width="70px">
          <h4 class="mt-3">100+ ROOMS</h4>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-4 px-4">
        <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
          <img src="images/about/customers.svg" width="70px">
          <h4 class="mt-3">1000+ CUSTOMERS</h4>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-4 px-4">
        <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
          <img src="images/about/rating.svg" width="70px">
          <h4 class="mt-3">500+ REWIEWS</h4>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-4 px-4">
        <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
          <img src="images/about/staff.svg" width="70px">
          <h4 class="mt-3">200+ STAFFS</h4>
        </div>
      </div>
      
    </div>
  </div>


  <h3 class="my-5 fw-bold h-font text-center">MANAGEMENT TEAM</h3>

  <div class="container px-4">
    <div class="swiper mySwiper">
      <div class="swiper-wrapper mb-5">
        <div class="swiper-slide bg-white text-center overflow-hidden rounded">
          <img src="images/features/kyle.jpg" class="w-100">
          <h5 class="mt-2">Sandro Kyle Alcala</h5>
          <p>Ceo</p>  
        </div>
         <div class="swiper-slide bg-white text-center overflow-hidden rounded">
            <img src="images/features/gab.jpg" class="w-100">
          <h5 class="mt-2">Justine Gabriel Castro</h5>
          <p>Operations Manager</p>
          </div>
         <div class="swiper-slide bg-white text-center overflow-hidden rounded">
         <img src="images/features/xu.jpg" class="w-100">
          <h5 class="mt-2">Wenzeng Xu</h5>
          <p>Head Chef</p>
         </div>
         <div class="swiper-slide bg-white text-center overflow-hidden rounded">
          <img src="images/features/mat.jpg" class="w-100">
          <h5 class="mt-2">Matthew Lafuente</h5>
          <p>Marketing Head</p>
        </div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>



  <?php require('inc/footer.php'); ?>

 <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>

  <script>
      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 4,
        spaceBetween: 40,
        pagination: {
          el: ".swiper-pagination",
         
        },
        breakpoints: {
          320: {
            slidesPerView: 1,
          },
          640: {
            slidesPerView: 1,
          },
          768: {
            slidesPerView: 2,
          },
          1024: {
            slidesPerView: 3,
          },
        },
      });
  </script>

    

</body>
</html>