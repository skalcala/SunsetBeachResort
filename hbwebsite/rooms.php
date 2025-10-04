<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUNSET BEACH RESORT AND HOTEL - ROOMS</title>
    <link rel="icon" type="image/png" href="logo.png">
    <?php require('inc/links.php'); ?>
    
</head>
<body class="bg-light">
  <?php require('inc/header.php'); ?>

  <div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center">OUR ROOMS</h2>
    <div class="h-line bg-dark"></div>
  </div>

<div class="container">
  <div class="row">
  <div class="col-lg-3 col-md-12 ,mb-lg-0 mb-4 px-0">
    
      <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
        <div class="container-fluid flex-lg-column align-items-stretch">
        <h4 class="mt-2">FILTERS</h4>
          <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="filterDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
            <div class="border bg-light p-3 rounded mb-3">
              <h4 class="mb-3" style="font-size: 18px;">Check Availability</h4>
              <label class="form-label">Check-in</label>
              <input type="date" class="form-control shadow-none mb-3">
              <label class="form-label">Check-out</label>
              <input type="date" class="form-control shadow-none mb-3"> 
              </div>

              <div class="border bg-light p-3 rounded mb-3">
              <h4 class="mb-3" style="font-size: 18px;">Services</h4>
              <div class="mb-2">  
                <input type="checkbox" id="service1" value="Room Service" class="form-check-input shadow-none me-1 service-checkbox">
                <label class="form-check-label" for="service1">Room Service</label>
              </div>
              <div class="mb-2">
                <input type="checkbox" id="service2" value="Swimming Pool" class="form-check-input shadow-none me-1 service-checkbox">
                <label class="form-check-label" for="service2">Swimming Pool</label>
                </div>
              <div class="mb-2">
                <input type="checkbox" id="service3" value="Spa" class="form-check-input shadow-none me-1 service-checkbox">
                <label class="form-check-label" for="service3">Spa</label>
                </div>
              <div class="mb-2">
                <input type="checkbox" id="service4" value="Gym" class="form-check-input shadow-none me-1 service-checkbox">
                <label class="form-check-label" for="service4">Gym</label>
                </div>
              <div class="mb-2">
                <input type="checkbox" id="service5" value="Wifi" class="form-check-input shadow-none me-1 service-checkbox">
                <label class="form-check-label" for="service5">Wi-Fi</label>
                </div>
              <div class="mb-2">
                <input type="checkbox" id="service6" value="Breakfast" class="form-check-input shadow-none me-1 service-checkbox">
                <label class="form-check-label" for="service6">Breakfast</label>
                </div>
              <div class="mb-2">
                <input type="checkbox" id="service7" value="AC" class="form-check-input shadow-none me-1 service-checkbox">
                <label class="form-check-label" for="service7">AC</label>
                </div>
              <div class="mb-2">  
                <input type="checkbox" id="service8" value="Television" class="form-check-input shadow-none me-1 service-checkbox">
                <label class="form-check-label" for="service8">TV</label>
                </div>
              <div class="mb-2">  
                <input type="checkbox" id="service9" value="Laundry" class="form-check-input shadow-none me-1 service-checkbox">
                <label class="form-check-label" for="service9">Laundry</label>
                </div>
              <div class="mb-2">  
                <input type="checkbox" id="service10" value="Parking" class="form-check-input shadow-none me-1 service-checkbox">
                <label class="form-check-label" for="service10">Parking</label>
                </div>
              <div class="mb-2">  
                <input type="checkbox" id="service11" value="Restaurant" class="form-check-input shadow-none me-1 service-checkbox">
                <label class="form-check-label" for="service11">Restaurant</label>
                </div>
              <div class="mb-2">  
                <input type="checkbox" id="service12" value="Bar" class="form-check-input shadow-none me-1 service-checkbox">
                <label class="form-check-label" for="service12">Bar</label>
                </div>
              <div class="mb-2">  
                <input type="checkbox" id="service13" value="Conference Room" class="form-check-input shadow-none me-1 service-checkbox">
                <label class="form-check-label" for="service13">Conference Room</label>
                </div>
              
              
              </div>

             

              <div class="border bg-light p-3 rounded mb-3">
                <h4 class="mb-3" style="font-size: 18px;">GUESTS</h4>
                <div class="d-flex">
                  <div class="me-3" style="flex:1;">
                    <label class="form-label" for="filterAdults">Adults</label>
                    <input id="filterAdults" type="number" min="0" class="form-control shadow-none mb-3" placeholder="e.g. 2">
                  </div>
                  <div style="flex:1;">
                    <label class="form-label" for="filterChildren">Children</label>
                    <input id="filterChildren" type="number" min="0" class="form-control shadow-none mb-3" placeholder="e.g. 1">
                  </div>
                </div>
            </div>

              <div class="d-flex justify-content-between p-3">
                <button id="applyFilters" class="btn btn-sm btn-primary shadow-none" style="background-color:#003355; border-color:#003355;">Apply Filters</button>
                <button id="resetFilters" class="btn btn-sm btn-outline-secondary shadow-none">Reset</button>
              </div>
          </div>
    </nav>
    </div>
    <div class="col-lg-9 col-md-12 px-4">
      <!-- Search and sort toolbar -->
      <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="d-flex align-items-center">
          <input id="searchInput" type="text" class="form-control shadow-none me-2" placeholder="Search rooms by name or feature" style="max-width:360px;">
          <select id="sortSelect" class="form-select shadow-none" style="max-width:200px;">
            <option value="default">Sort: Recommended</option>
            <option value="price-asc">Price: Low to High</option>
            <option value="price-desc">Price: High to Low</option>
            <option value="name-asc">Name: A → Z</option>
            <option value="name-desc">Name: Z → A</option>
          </select>
        </div>
        <div>
          <span id="resultsCount" class="text-muted">Showing all rooms</span>
        </div>
      </div>
  <div id="noResults" class="bg-white p-4 rounded shadow text-center d-none mb-4">No rooms match your filters. Try adjusting the search or resetting filters.</div>

  <div id="roomsList">
  <div class="card mb-4 border-o shadow room-card" data-name="Alcala Regular" data-price="1499" data-services="Wifi,Television,Breakfast,Room Service" data-adults="5" data-children="4"> 
        <div class="row g-0 p-3 align-items-center">
          <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
            <img src="images/rooms/1.jpg" class="img-fluid rounded">
          </div>
          <div class="col-md-5 px-lg-3 px-md-3 px-0">
            <h5 class="mb-3">Alcala Regular</h5>
           <div class="features mb-3"> 
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

                    <div class="facilities mb-3"> 
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
                     <div class="guests"> 
                        <h6 class="mb-1">Guests</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                            <i class="bi bi-adult me-1"></i>5 Adults
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                            <i class="bi bi-children me-1"></i>4 Children
                        </span>
                </div>
                </div>
          <div class="col-md-2 text-alighn-center">
             <h6 class="mb-4">₱1,499 per night</h6>
            <a href="booking.php?room_id=1" class="btn btn-sm w-100 btn-primary shadow-none mb-2" style="background-color: #003355; border-color: #003355;">Book Now</a>
            <a href="rooms_details.php?id=1" class="btn btn-sm w-100 btn-outline-primary shadow-none" style="color: #003355; border-color: #003355;">More Details</a>
          </div>
          
        </div>
      </div>

  <div class="card mb-4 border-o shadow room-card" data-name="Justine Regular" data-price="1999" data-services="Wifi,Television,Breakfast,Room Service" data-adults="5" data-children="4"> 
        <div class="row g-0 p-3 align-items-center">
          <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
            <img src="images/rooms/2.png" class="img-fluid rounded">
          </div>
          <div class="col-md-5 px-lg-3 px-md-3 px-0">
            <h5 class="mb-3">Justine Regular</h5>
          <div class="features mb-3"> 
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

                    <div class="facilities mb-3"> 
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
                    <div class="guests"> 
                        <h6 class="mb-1">Guests</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                            <i class="bi bi-adult me-1"></i>5 Adults
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                            <i class="bi bi-children me-1"></i>4 Children
                        </span>
                    </div>
                    </div>
                    <div class="col-md-2 text-alighn-center">
                      <h6 class="mb-4">₱1,999 per night</h6>
                        <a href="booking.php?room_id=2" class="btn btn-sm w-100 btn-primary shadow-none mb-2" style="background-color: #003355; border-color: #003355;">Book Now</a>
                        <a href="rooms_details.php?id=2" class="btn btn-sm w-100 btn-outline-primary shadow-none" style="color: #003355; border-color: #003355;">More Details</a>
                    </div>
          
        </div>
      </div>

  <div class="card mb-4 border-o shadow room-card" data-name="Xu Regular" data-price="2999" data-services="Wifi,Television,Breakfast,Room Service" data-adults="5" data-children="4"> 
        <div class="row g-0 p-3 align-items-center">
          <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
            <img src="images/rooms/3.png" class="img-fluid rounded">
          </div>
          <div class="col-md-5 px-lg-3 px-md-3 px-0">
            <h5 class="mb-3">Xu Regular</h5>
          <div class="features mb-3"> 
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

                    <div class="facilities mb-3"> 
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
                    <div class="guests"> 
                        <h6 class="mb-1">Guests</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                            <i class="bi bi-adult me-1"></i>5 Adults
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                            <i class="bi bi-children me-1"></i>4 Children
                        </span>
                    </div>
                    </div>
                    <div class="col-md-2 text-alighn-center">
                      <h6 class="mb-4">₱2,999 per night</h6>
                        <a href="booking.php?room_id=3" class="btn btn-sm w-100 btn-primary shadow-none mb-2" style="background-color: #003355; border-color: #003355;">Book Now</a>
                        <a href="rooms_details.php?id=3" class="btn btn-sm w-100 btn-outline-primary shadow-none" style="color: #003355; border-color: #003355;">More Details</a>
                    </div>
          
        </div>
      </div>


  <div class="card mb-4 border-o shadow room-card" data-name="Lafuente Regular" data-price="3499" data-services="Wifi,Television,Breakfast,Room Service" data-adults="5" data-children="4"> 
        <div class="row g-0 p-3 align-items-center">
          <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
            <img src="images/rooms/4.png" class="img-fluid rounded">
          </div>
          <div class="col-md-5 px-lg-3 px-md-3 px-0">
            <h5 class="mb-3">Lafuente Regular</h5>
          <div class="features mb-3"> 
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

                    <div class="facilities mb-3"> 
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
                    <div class="guests"> 
                        <h6 class="mb-1">Guests</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                            <i class="bi bi-adult me-1"></i>5 Adults
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                            <i class="bi bi-children me-1"></i>4 Children
                        </span>
                    </div>
                    </div>
                    <div class="col-md-2 text-alighn-center">
                      <h6 class="mb-4">₱3,499 per night</h6>
                        <a href="booking.php?room_id=4" class="btn btn-sm w-100 btn-primary shadow-none mb-2" style="background-color: #003355; border-color: #003355;">Book Now</a>
                        <a href="rooms_details.php?id=4" class="btn btn-sm w-100 btn-outline-primary shadow-none" style="color: #003355; border-color: #003355;">More Details</a>
                    </div>
          
        </div>
      </div>


  <div class="card mb-4 border-o shadow room-card" data-name="Alcala Villa" data-price="4999" data-services="Wifi,Television,Breakfast,Room Service,Swimming Pool" data-adults="5" data-children="4"> 
        <div class="row g-0 p-3 align-items-center">
          <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
            <img src="images/rooms/alcalavilla.png" class="img-fluid rounded">
          </div>
          <div class="col-md-5 px-lg-3 px-md-3 px-0">
            <h5 class="mb-3">Alcala Villa</h5>
          <div class="features mb-3"> 
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

                    <div class="facilities mb-3"> 
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
                    <div class="guests"> 
                        <h6 class="mb-1">Guests</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                            <i class="bi bi-adult me-1"></i>5 Adults
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                            <i class="bi bi-children me-1"></i>4 Children
                        </span>
                    </div>
                    </div>
                    <div class="col-md-2 text-alighn-center">
                      <h6 class="mb-4">₱4,999 per night</h6>
                        <a href="booking.php?room_id=5" class="btn btn-sm w-100 btn-primary shadow-none mb-2" style="background-color: #003355; border-color: #003355;">Book Now</a>
                        <a href="rooms_details.php?id=5" class="btn btn-sm w-100 btn-outline-primary shadow-none" style="color: #003355; border-color: #003355;">More Details</a>
                    </div>
          
        </div>
      </div>

  <div class="card mb-4 border-o shadow room-card" data-name="Justine Villa" data-price="7999" data-services="Wifi,Television,Breakfast,Room Service,Swimming Pool" data-adults="5" data-children="4"> 
        <div class="row g-0 p-3 align-items-center">
          <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
            <img src="images/rooms/xuvilla.png" class="img-fluid rounded">
          </div>
          <div class="col-md-5 px-lg-3 px-md-3 px-0">
            <h5 class="mb-3">Justine Villa</h5>
          <div class="features mb-3"> 
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

                    <div class="facilities mb-3"> 
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
                    <div class="guests"> 
                        <h6 class="mb-1">Guests</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                            <i class="bi bi-adult me-1"></i>5 Adults
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                            <i class="bi bi-children me-1"></i>4 Children
                        </span>
                    </div>
                    </div>
                    <div class="col-md-2 text-alighn-center">
                      <h6 class="mb-4">₱7,999 per night</h6>
                        <a href="booking.php?room_id=6" class="btn btn-sm w-100 btn-primary shadow-none mb-2" style="background-color: #003355; border-color: #003355;">Book Now</a>
                        <a href="rooms_details.php?id=6" class="btn btn-sm w-100 btn-outline-primary shadow-none" style="color: #003355; border-color: #003355;">More Details</a>
                    </div>
          
        </div>
      </div>

  <div class="card mb-4 border-o shadow room-card" data-name="Xu Villa" data-price="8999" data-services="Wifi,Television,Breakfast,Room Service,Swimming Pool,Spa" data-adults="5" data-children="4"> 
        <div class="row g-0 p-3 align-items-center">
          <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
            <img src="images/rooms/110.png" class="img-fluid rounded">
          </div>
          <div class="col-md-5 px-lg-3 px-md-3 px-0">
            <h5 class="mb-3">Xu Villa</h5>
          <div class="features mb-3"> 
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

                    <div class="facilities mb-3"> 
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
                    <div class="guests"> 
                        <h6 class="mb-1">Guests</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                            <i class="bi bi-adult me-1"></i>5 Adults
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                            <i class="bi bi-children me-1"></i>4 Children
                        </span>
                    </div>
                    </div>
                    <div class="col-md-2 text-alighn-center">
                      <h6 class="mb-4">₱8,999 per night</h6>
                        <a href="booking.php?room_id=7" class="btn btn-sm w-100 btn-primary shadow-none mb-2" style="background-color: #003355; border-color: #003355;">Book Now</a>
                        <a href="rooms_details.php?id=7" class="btn btn-sm w-100 btn-outline-primary shadow-none" style="color: #003355; border-color: #003355;">More Details</a>
                    </div>
          
        </div>
      </div>

  <div class="card mb-4 border-o shadow room-card" data-name="Lafuente Villa" data-price="9999" data-services="Wifi,Television,Breakfast,Room Service,Swimming Pool,Spa,Gym" data-adults="5" data-children="4"> 
        <div class="row g-0 p-3 align-items-center">
          <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
            <img src="images/rooms/laf.png" class="img-fluid rounded">
          </div>
          <div class="col-md-5 px-lg-3 px-md-3 px-0">
            <h5 class="mb-3">Lafuente Villa</h5>
          <div class="features mb-3"> 
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

                    <div class="facilities mb-3"> 
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
                    <div class="guests"> 
                        <h6 class="mb-1">Guests</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                            <i class="bi bi-adult me-1"></i>5 Adults
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                            <i class="bi bi-children me-1"></i>4 Children
                        </span>
                    </div>
                    </div>
                    <div class="col-md-2 text-alighn-center">
                      <h6 class="mb-4">₱9,999 per night</h6>
                        <a href="booking.php?room_id=8" class="btn btn-sm w-100 btn-primary shadow-none mb-2" style="background-color: #003355; border-color: #003355;">Book Now</a>
                        <a href="rooms_details.php?id=8" class="btn btn-sm w-100 btn-outline-primary shadow-none" style="color: #003355; border-color: #003355;">More Details</a>
                    </div>
          
        </div>
      </div>






    </div>


    

    
  </div>
</div>
</div>
</div>




  <?php require('inc/footer.php'); ?>
  <!-- Client-side filtering, sorting and search for rooms -->
  <script>
  (function(){
    const serviceCheckboxes = Array.from(document.querySelectorAll('.service-checkbox'));
    const applyBtn = document.getElementById('applyFilters');
    const resetBtn = document.getElementById('resetFilters');
    const searchInput = document.getElementById('searchInput');
    const sortSelect = document.getElementById('sortSelect');
    const roomsList = document.getElementById('roomsList');
    const noResults = document.getElementById('noResults');
    const resultsCount = document.getElementById('resultsCount');

    function getSelectedServices(){
      return serviceCheckboxes.filter(cb => cb.checked).map(cb => cb.value.toLowerCase());
    }

    function parsePriceFromAttr(el){
      const p = el.getAttribute('data-price');
      return p ? Number(p) : Infinity;
    }

    function matchesServices(roomEl, selectedServices){
      if(selectedServices.length === 0) return true;
      const services = (roomEl.getAttribute('data-services')||'').toLowerCase();
      return selectedServices.every(s => services.indexOf(s) !== -1);
    }

    function matchesSearch(roomEl, query){
      if(!query) return true;
      query = query.trim().toLowerCase();
      const name = (roomEl.getAttribute('data-name')||'').toLowerCase();
      const services = (roomEl.getAttribute('data-services')||'').toLowerCase();
      return name.indexOf(query) !== -1 || services.indexOf(query) !== -1;
    }

    function applyFilters(){
      const selected = getSelectedServices();
      const query = searchInput.value || '';
      const roomEls = Array.from(document.querySelectorAll('.room-card'));
      let visibleCount = 0;

      roomEls.forEach(el => {
        const okServices = matchesServices(el, selected);
        const okSearch = matchesSearch(el, query);
        const show = okServices && okSearch;
        el.style.display = show ? '' : 'none';
        if(show) visibleCount++;
      });

      // update results count and no-results
      const total = roomEls.length;
      if(visibleCount === total){
        resultsCount.textContent = `Showing all rooms`;
      } else {
        resultsCount.textContent = `${visibleCount} room${visibleCount===1?'':'s'} found`;
      }
      noResults.classList.toggle('d-none', visibleCount !== 0);
    }

    function resetFilters(){
      serviceCheckboxes.forEach(cb => cb.checked = false);
      searchInput.value = '';
      sortSelect.value = 'default';
      // show all rooms and restore original order
      originalOrder.forEach(el => roomsList.appendChild(el));
      document.querySelectorAll('.room-card').forEach(el => el.style.display = '');
      resultsCount.textContent = 'Showing all rooms';
      noResults.classList.add('d-none');
    }

    let originalOrder = [];
    function sortRooms(){
      const mode = sortSelect.value;
      const roomEls = Array.from(roomsList.querySelectorAll('.room-card'));
      if(mode === 'default'){
        // restore original order
        originalOrder.forEach(el => roomsList.appendChild(el));
        return;
      }

      let sorted = roomEls.slice();
      if(mode === 'price-asc'){
        sorted.sort((a,b) => parsePriceFromAttr(a) - parsePriceFromAttr(b));
      } else if(mode === 'price-desc'){
        sorted.sort((a,b) => parsePriceFromAttr(b) - parsePriceFromAttr(a));
      } else if(mode === 'name-asc'){
        sorted.sort((a,b) => a.getAttribute('data-name').localeCompare(b.getAttribute('data-name')));
      } else if(mode === 'name-desc'){
        sorted.sort((a,b) => b.getAttribute('data-name').localeCompare(a.getAttribute('data-name')));
      }

      sorted.forEach(el => roomsList.appendChild(el));
    }

    // event listeners
    applyBtn.addEventListener('click', function(e){ e.preventDefault(); applyFilters(); });
    resetBtn.addEventListener('click', function(e){ e.preventDefault(); resetFilters(); });
    searchInput.addEventListener('input', function(){ applyFilters(); });
    sortSelect.addEventListener('change', function(){ sortRooms(); });

    // Initial setup
    (function init(){
      originalOrder = Array.from(roomsList.querySelectorAll('.room-card'));
      const total = originalOrder.length;
      resultsCount.textContent = `Showing ${total} rooms`;
    })();

  })();
  </script>

  </body>
  </html>




    

