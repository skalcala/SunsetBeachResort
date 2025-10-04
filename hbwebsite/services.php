<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUNSET BEACH RESORT AND HOTEL - SERVICES</title>
    <link rel="icon" type="image/png" href="logo.png">
    <?php require('inc/links.php'); ?>
    <style>
      .pop{
        transition: transform 0.3s, border-top-color 0.3s;
      }
      .pop:hover{
        border-top-color: #f34208 !important;
        transform: scale(1.03);
      }
      /* make cards full height within their column so buttons/footers align */
      .service-card {
        min-height: 220px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
      }
      /* smaller hover effect on very small screens */
      @media (max-width: 480px){
        .pop:hover{
          transform: none;
        }
      }
    </style>
</head>
<body class="bg-light">
   <?php require('inc/header.php'); ?>

   <div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center">OUR SERVICES</h2>
    <div class="h-line bg-dark mx-auto" style="width:120px; height:4px;"></div>
    <p class="text-center mt-3 mx-auto" style="max-width:900px;">
      At Sunset Beach Resort and Hotel, we pride ourselves on offering a wide range of exceptional services to ensure your stay is both comfortable and memorable. Our dedicated team is committed to providing top-notch hospitality and personalized experiences for every guest.
    </p>
   </div>

   <div class="container">
    <div class="row g-4">
      <div class="col-12 col-sm-6 col-md-4">
        <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop service-card">
          <div class="d-flex align-items-center mb-3">
            <img src="images/services/wifi.svg" alt="Free Wi-Fi" style="width:35px;height:35px;" class="flex-shrink-0">
            <h5 class="m-0 ms-3">Free Wi-Fi</h5>
          </div>
          <p class="mb-0">Stay connected with our complimentary high-speed Wi‑Fi available throughout the resort.</p>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-md-4">
        <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop service-card">
          <div class="d-flex align-items-center mb-3">
            <img src="images/services/air.svg" alt="Air Conditioner" style="width:35px;height:35px;" class="flex-shrink-0">
            <h5 class="m-0 ms-3">Air Conditioner</h5>
          </div>
          <p class="mb-0">Enjoy a cool and comfortable environment in all our rooms with state-of-the-art air conditioning systems.</p>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-md-4">
        <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop service-card">
          <div class="d-flex align-items-center mb-3">
            <img src="images/services/tv.svg" alt="Television" style="width:35px;height:35px;" class="flex-shrink-0">
            <h5 class="m-0 ms-3">Television</h5>
          </div>
          <p class="mb-0">Stay entertained with our wide selection of cable and satellite TV channels available in every room.</p>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-md-4">
        <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop service-card">
          <div class="d-flex align-items-center mb-3">
            <img src="images/services/spa.svg" alt="Spa" style="width:35px;height:35px;" class="flex-shrink-0">
            <h5 class="m-0 ms-3">Spa</h5>
          </div>
          <p class="mb-0">Relax and rejuvenate at our full-service spa offering a variety of treatments and therapies designed to pamper you.</p>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-md-4">
        <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop service-card">
          <div class="d-flex align-items-center mb-3">
            <img src="images/services/heat.svg" alt="Room Heater" style="width:35px;height:35px;" class="flex-shrink-0">
            <h5 class="m-0 ms-3">Room Heater</h5>
          </div>
          <p class="mb-0">Keep warm and comfortable during cooler evenings with our efficient in-room heaters.</p>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-md-4">
        <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop service-card">
          <div class="d-flex align-items-center mb-3">
            <img src="images/services/geyser.svg" alt="Geyser" style="width:35px;height:35px;" class="flex-shrink-0">
            <h5 class="m-0 ms-3">Geyser</h5>
          </div>
          <p class="mb-0">Enjoy hot showers on demand with our modern geyser systems installed in all bathrooms.</p>
        </div>
      </div>
    </div>

    <div class="row mt-4">
      <div class="col-12 text-center">
        <a href="rooms.php" class="btn btn-primary shadow-none me-2" style="background-color:#003355; border-color:#003355;">Explore Rooms</a>
        <a href="contact.php" class="btn btn-outline-primary shadow-none" style="color:#003355; border-color:#003355;">Contact Us</a>
      </div>
    </div>
   </div>

  <?php require('inc/footer.php'); ?>

</body>
</html>