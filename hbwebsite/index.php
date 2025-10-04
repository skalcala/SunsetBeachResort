<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUNSET BEACH RESORT AND HOTEL - HOME</title>
    <link rel="icon" type="image/png" href="logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css"/>
    <?php require('inc/links.php'); ?>

</head>
<body class="bg-light">
<?php require('inc/header.php'); ?>

<!-- Carousel -->

    <div class="container-fluid px-lg-4 mt-4">
        <!-- Swiper -->
        <div class="swiper swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="images/carousel/1.png" class="w-100 d-block">
                </div>
                <div class="swiper-slide">
                    <img src="images/carousel/2.png" class="w-100 d-block">
                </div>
                <div class="swiper-slide">
                    <img src="images/carousel/3.png" class="w-100 d-block">
                </div>
                <div class="swiper-slide">
                    <img src="images/carousel/4.png" class="w-100 d-block">
                </div>
                <div class="swiper-slide">
                    <img src="images/carousel/5.png" class="w-100 d-block">
                </div>
                <div class="swiper-slide">
                    <img src="images/carousel/6.png" class="w-100 d-block">
                </div>
            </div>
        </div>
    </div>
<!-- --- Check Availablitiy form  --- -->
<div class="container availablitiy-form">
  <div class="row">
    <div class="col-lg-12 bg-white shadow p-4 rounded">
      <h5 class="mb-4">Cheking Booking Availablitiy</h5>
  <form>
            <div class="row align-items-end">
              <div class="col-lg-3 mb-3">
                <label class="form-label" style="font-weight: 500;">Check-in</label>
                <input type="date" class="form-control shadow-none">
              </div>
              <div class="col-lg-3 mb-3">
                <label class="form-label" style="font-weight: 500;">Check-out</label>
                <input type="date" class="form-control shadow-none">
            </div>
            <div class="col-lg-3 mb-3">
                <label class="form-label" style="font-weight: 500;">Adult</label>
                  <select class="form-select shadow-none">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                  </select>
            </div>
            <div class="col-lg-2 mb-3">
                <label class="form-label" style="font-weight: 500;">Children</label>
                  <select class="form-select shadow-none">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                  </select>
            </div>
            <div class="col-lg-1 mb-lg-3 mt-2">
                <button type="submit" class="btn btn-white shadow-none custom-bg">Submit</button>
            </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- --- Our Rooms --- -->

<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR ROOMS</h2>

<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                <img src="images/rooms/1.jpg" class="card-img-top">
                <div class="card-body">
                    <h5>Alcala Regular</h5>
                    <h6 class="mb-4">₱1,499 per night</h6>
                    <div class="features mb-4"> 
                        <h6 class="mb-1">Features</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
    <i class="bi bi-door-closed me-1"></i>1 Room
</span>
<span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
    <i class="bi bi-badge-wc me-1"></i>1 Bathroom
</span>
<span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
    <i class="bi bi-house-door me-1"></i>1 Balcony
</span>
<span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
    <i class="bi bi-couch me-1"></i>1 Sofa
</span>
<span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
    <i class="bi bi-cup-hot me-1"></i>1 Kitchen
</span>
                    </div>
                    <div class="facilities mb-4">
                        <h6 class="mb-1">Facilities</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                            <i class="bi bi-wifi me-1"></i>Wifi
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                            <i class="bi bi-television me-1"></i>Television
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                            <i class="bi bi-cup-straw me-1"></i>Breakfast
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                            <i class="bi bi-people me-1"></i>Room Service
                        </span>
                    </div>
                    <div class="guests mb-4">
                        <h6 class="mb-1">Guests</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                            <i class="bi bi-adult me-1"></i>5 Adults
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                            <i class="bi bi-children me-1"></i>4 Children
                        </span>
                    </div>
                    <div class="rating mb-4">
                        <h6 class="mb-1">Rating</h6>
                        <span class="badge rounded-pill bg-light">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                        </span> 
                        <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                            5/5 Excellent
                        </span>
                    </div>
                    <div class="d-flex justify-content-evenly mb-2">
                        <a href="#" class="btn btn-sm btn-primary shadow-none" style="background-color: #003355; border-color: #003355;">Book Now</a>
                        <a href="#" class="btn btn-sm btn-outline-primary shadow-none" style="color: #003355; border-color: #003355;">More Details</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                <img src="images/rooms/2.png" class="card-img-top">
                <div class="card-body">
                    <h5>Justine Regular</h5>
                    <h6 class="mb-4">₱1,999 per night</h6>
                    <div class="features mb-4"> 
                        <h6 class="mb-1">Features</h6>
                          <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
    <i class="bi bi-door-closed me-1"></i>1 Room
</span>
<span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
    <i class="bi bi-badge-wc me-1"></i>1 Bathroom
</span>
<span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
    <i class="bi bi-house-door me-1"></i>1 Balcony
</span>
<span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
    <i class="bi bi-couch me-1"></i>1 Sofa
</span>
<span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
    <i class="bi bi-cup-hot me-1"></i>1 Kitchen
</span>
                    </div>
                    <div class="facilities mb-4"> 
                        <h6 class="mb-1">Facilities</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                            <i class="bi bi-wifi me-1"></i>Wifi
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                            <i class="bi bi-television me-1"></i>Television
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                            <i class="bi bi-cup-straw me-1"></i>Breakfast
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                            <i class="bi bi-people me-1"></i>Room Service
                        </span>
                    </div>
                    <div class="guests mb-4"> 
                        <h6 class="mb-1">Guests</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                            <i class="bi bi-adult me-1"></i>5 Adults
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                            <i class="bi bi-children me-1"></i>4 Children
                        </span>
                    </div>
                    <div class="rating mb-4"> 
                        <h6 class="mb-1">Rating</h6>
                        <span class="badge rounded-pill bg-light">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                            5/5 Excellent
                        </span>
                    </div>
                    <div class="d-flex justify-content-evenly mb-2">
                        <a href="#" class="btn btn-sm btn-primary shadow-none" style="background-color: #003355; border-color: #003355;">Book Now</a>
                        <a href="#" class="btn btn-sm btn-outline-primary shadow-none" style="color: #003355; border-color: #003355;">More Details</a>  
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                <img src="images/rooms/3.png" class="card-img-top">
                <div class="card-body">
                    <h5>Xu Regular</h5>
                    <h6 class="mb-4">₱2,499 per night</h6>
                    <div class="features mb-4">
                        <h6 class="mb-1">Features</h6>
                          <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
    <i class="bi bi-door-closed me-1"></i>1 Room
</span>
<span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
    <i class="bi bi-badge-wc me-1"></i>1 Bathroom
</span>
<span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
    <i class="bi bi-house-door me-1"></i>1 Balcony
</span>
<span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
    <i class="bi bi-couch me-1"></i>1 Sofa
</span>
<span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
    <i class="bi bi-cup-hot me-1"></i>1 Kitchen
</span>
                    </div>
                    <div class="facilities mb-4"> 
                        <h6 class="mb-1">Facilities</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                            <i class="bi bi-wifi me-1"></i>Wifi
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                            <i class="bi bi-television me-1"></i>Television
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                            <i class="bi bi-cup-straw me-1"></i>Breakfast
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                            <i class="bi bi-people me-1"></i>Room Service
                        </span>
                    </div>

                    <div class="guests mb-4"> 
                        <h6 class="mb-1">Guests</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                            <i class="bi bi-adult me-1"></i>5 Adults
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                            <i class="bi bi-children me-1"></i>4 Children
                        </span>
                    </div>
                    <div class="rating mb-4">
                        <h6 class="mb-1">Rating</h6>
                        <span class="badge rounded-pill bg-light">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                            5/5 Excellent
                        </span>
                    </div>
                    <div class="d-flex justify-content-evenly mb-2">
                        <a href="#" class="btn btn-sm btn-primary shadow-none" style="background-color: #003355; border-color: #003355;">Book Now</a>
                        <a href="#" class="btn btn-sm btn-outline-primary shadow-none" style="color: #003355; border-color: #003355;">More Details</a>
                        </div>
                </div>
            </div>
          </div>
          <div class="col-lg-12 text-center mt-5">
              <a href="#" class="btn btn-sm btn-outline-dark shadow-none" style="color: #003355; border-color: #003355;">More Rooms</a>
            </div>
        </div>
    </div>    



<!-- --- OUR SERVICES --- -->            
  <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR SERVICES</h2>

 <div class="container">
  <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
    <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
      <img src="images/services/wifi.svg" class="service-icon" alt="Free Wi-Fi">
      <h5 class="mt-3">Free Wi-Fi</h5>
    </div>
    <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
      <img src="images/services/air.svg" class="service-icon" alt="Air Conditioner">
      <h5 class="mt-3">Air Conditioner</h5>
    </div>
    <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
      <img src="images/services/tv.svg" class="service-icon" alt="Television">
      <h5 class="mt-3">Television</h5>
    </div>
    <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
      <img src="images/services/spa.svg" class="service-icon" alt="Spa">
      <h5 class="mt-3">Spa</h5>
    </div>
    <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
      <img src="images/services/heat.svg" class="service-icon" alt="Room Heater">
      <h5 class="mt-3">Room Heater</h5>
    </div>
    <div class="col-lg-12 text-center mt-3">
      <a href="#" class="btn btn-sm btn-outline-dark shadow-none" style="color: #003355; border-color: #003355;">More Services</a>
    </div>
  </div>
</div>
    



<!-- --- Our TESTIMONIAL--- -->

<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">TESTIMONIALS</h2>
 
<div class="container">
   <div class="swiper swiper-testimonial">
    <div class="swiper-wrapper mb-5">

      <div class="swiper-slide bg-white p-4">
      <div class="profile d-flex align-items-center mb-3">
        <img src="images/features/kyle.jpg" width="30px">
        <h6 class="m-0 ms-2">Sandro Kyle Alcala</h6>
      </div>
        <p class="testimonial">“Our stay was outstanding from the moment we arrived. 
          The check-in process was quick and effortless. Our room was spotless and beautifully decorated, 
          with a comfortable bed that guaranteed a great night’s sleep. 
          Every staff member greeted us warmly and offered helpful tips for exploring the city. 
          I would happily recommend this hotel to anyone seeking a relaxing getaway.”
        </p>
        <div class="rating">
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i> 
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
        </div>
      </div>

      <div class="swiper-slide bg-white p-4">
      <div class="profile d-flex align-items-center mb-3">
        <img src="images/features/xu.jpg" width="30px">
        <h6 class="m-0 ms-2">Wenzeng Xu</h6>
      </div>
        <p class="testimonial">“This hotel exceeded all our expectations. The lobby felt welcoming and elegant, setting the tone for our visit.
           Housekeeping kept everything sparkling clean each day. We especially appreciated the attentive service from the front desk, who arranged transportation and dinner reservations for us. 
           We can’t wait to come back for another visit.”
        </p>
        <div class="rating">
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i> 
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
        </div>
      </div>
      <div class="swiper-slide bg-white p-4">
      <div class="profile d-flex align-items-center mb-3">
        <img src="images/features/gab.jpg" width="30px">
        <h6 class="m-0 ms-2">Gabriel Castro</h6>
      </div>
        <p class="testimonial">“I had an amazing experience during my stay.  
    The location was perfect—close to shops, restaurants, and key attractions.  
    The amenities exceeded my expectations, especially the pool and spa area,  
    which made my trip even more enjoyable.  
    The staff went above and beyond to make sure I felt comfortable.  
    I can’t wait to come back for another visit!”  

        </p>
        <div class="rating">
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i> 
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
        </div>
      </div>

       <div class="swiper-slide bg-white p-4">
      <div class="profile d-flex align-items-center mb-3">
        <img src="images/features/mat.jpg" width="30px">
        <h6 class="m-0 ms-2">Matthew Lafuente</h6>
      </div>
        <p class="testimonial">“From the moment we arrived, everything felt smooth and welcoming.  
    The check-in process was fast and easy.  
    Our bed was incredibly comfortable, and the room was tastefully decorated.  
    The hotel’s design created a very elegant atmosphere.  
    It’s the kind of place that makes you want to extend your trip.”   

        </p>
        <div class="rating">
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-half text-warning"></i>
        </div>
      </div>

    </div>
    <div class="swiper-pagination"></div>
  </div>
</div>

<!-- --- Our Reach Us--- -->

<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">REACH US</h2>
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
      <iframe class=w-100 height="320" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3862.195598470778!2d120.97830537510482!3d14.530801585947335!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397cb3444b5672b%3A0xe6c66549896c0362!2sNational%20University%20MOA!5e0!3m2!1sen!2sph!4v1758474517093!5m2!1sen!2sph"   loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="col-lg-4 col-md-4">
      <div class="bg-white p-4 rounded mb-4">
        <h5>Call Us</h5>
        <a href="tel: +63 9123456789" class="d-inline-block mb-2 text-decoration-none text-dark">
          <i class="bi bi-telephone-fill"></i> +63 9123456789
        </a><br>
        <a href="tel: +63 9876543210" class="d-inline-block text-decoration-none text-dark">
          <i class="bi bi-telephone-fill"></i> +63 9876543210
        </a>
      </div>
      <div class="bg-white p-4 rounded mb-4">
        <h5>Follow us</h5>
        <a href="#" class="d-inline-block mb-3">
          <span class="badge bg-light text-dark fs-6 p-2">
          <i class="bi bi-facebook me-1"></i> Facebook
          </span>
        </a><br>
        <a href="#" class="d-inline-block mb-3">
          <span class="badge bg-light text-dark fs-6 p-2">
          <i class="bi bi-instagram me-1"></i> Instagram
           </span>
        </a><br>
        <a href="#" class="d-inline-block mb-3">
          <span class="badge bg-light text-dark fs-6 p-2">
          <i class="bi bi-twitter me-1"></i> Twitter
           </span>
        </a>
    </div>
  </div>
</div>
</div>


<!-- --- Our Reach Us--- -->
<!-- Our Reach Us / Footer-like Section -->
  <?php require('inc/footer.php'); ?>




    
    <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
    <script>
      var swiper = new Swiper(".swiper-container", {
        spaceBetween: 30,
        effect: "fade",
        loop: true,
        autoplay: {   
            delay: 3500,
            disableOnInteraction: false,
        },
      });
    
   var swiper = new Swiper(".swiper-testimonial", {
  effect: "coverflow",
  grabCursor: true,
  centeredSlides: true,
  initialSlide: 1, // Center the second slide (index starts at 0)
  slidesPerView: "auto",
  coverflowEffect: {
    rotate: 50,
    stretch: 0,
    depth: 100,
    modifier: 1,
    slideShadows: false,
  },
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
  }
});
  
  
  

        function toggleRegPassword() {
            var pass = document.getElementById('reg_password');
            var confirm = document.getElementById('reg_confirm_password');
            var type = document.getElementById('showRegPassword').checked ? 'text' : 'password';
            if(pass) pass.type = type;
            if(confirm) confirm.type = type;
        }
    </script>
</body>
</html>