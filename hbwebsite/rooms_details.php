<?php
// Updated rooms_details.php - layout similar to provided screenshot
require('inc/links.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Room Details</title>
  <link rel="icon" type="image/png" href="logo.png">
  <?php require('inc/links.php'); ?>
  <style>
    /* Minor tweaks to match screenshot spacing */
    .room-image { max-height: 420px; object-fit: cover; }
    .detail-card { border-radius: 6px; box-shadow: 0 6px 18px rgba(0,0,0,0.08); }
    .star { color: #f6c94d; }
  </style>
</head>
<body class="bg-light">
  <?php require('inc/header.php'); ?>

<?php
// In-memory room dataset (extendable)
$rooms = [
  1 => [
    'name'=>'Alcala Regular',
    'price'=>'1,499',
    'images'=>['images/rooms/1.jpg'],
    'features'=>['1 Room','1 Bathroom','1 Balcony','1 Sofa','1 Kitchen'],
    'facilities'=>['Wifi','Television','Breakfast','Room Service'],
    'adults'=>5,'children'=>4,'area'=>'28 sq. m.','rating'=>4,
    'description'=>'Cozy regular room with all basic amenities, comfortable for families and couples.',
    'comments'=>[
      ['author'=>'Maria','rating'=>5,'text'=>'Clean room and friendly staff. Great value.'],
      ['author'=>'John','rating'=>4,'text'=>'Nice location and comfy bed.'],
    ],
  ],
  2 => [
    'name'=>'Justine Regular',
    'price'=>'1,999',
    'images'=>['images/rooms/2.png'],
    'features'=>['1 Room','1 Bathroom','1 Balcony','1 Sofa','1 Kitchen'],
    'facilities'=>['Wifi','Television','Breakfast','Room Service'],
    'adults'=>5,'children'=>4,'area'=>'30 sq. m.','rating'=>4,
    'description'=>'Comfortable regular room with modern facilities and pleasant views.',
    'comments'=>[
      ['author'=>'Alex','rating'=>4,'text'=>'Good service, room was spotless.'],
    ],
  ],
  3 => [
    'name'=>'Xu Regular',
    'price'=>'2,999',
    'images'=>['images/rooms/3.png'],
    'features'=>['1 Room','1 Bathroom','1 Balcony','1 Sofa','1 Kitchen'],
    'facilities'=>['Wifi','Breakfast','Room Service'],
    'adults'=>5,'children'=>4,'area'=>'32 sq. m.','rating'=>5,
    'description'=>'Spacious regular room with premium services and excellent location.',
    'comments'=>[
      ['author'=>'Liza','rating'=>5,'text'=>'Amazing stay — highly recommended!'],
      ['author'=>'Mark','rating'=>5,'text'=>'Elegant room and great breakfast.'],
    ],
  ],
  4 => [
    'name'=>'Lafuente Regular',
    'price'=>'3,499',
    'images'=>['images/rooms/4.png'],
    'features'=>['1 Room','1 Bathroom','1 Balcony','1 Sofa','1 Kitchen'],
    'facilities'=>['Wifi','Television','Breakfast','Room Service'],
    'adults'=>5,'children'=>4,'area'=>'35 sq. m.','rating'=>4,
    'description'=>'Classic regular room with comfortable amenities and warm decor.',
    'comments'=>[
      ['author'=>'Ben','rating'=>4,'text'=>'Spacious and quiet.'],
    ],
  ],
  5 => [
    'name'=>'Alcala Villa',
    'price'=>'4,999',
    'images'=>['images/rooms/alcalavilla.png'],
    'features'=>['Private Pool','3 Bedrooms','2 Bathrooms'],
    'facilities'=>['Wifi','Television','Breakfast','Room Service','Swimming Pool'],
    'adults'=>6,'children'=>4,'area'=>'120 sq. m.','rating'=>5,
    'description'=>'Luxury villa with private pool and spacious living area — perfect for groups.',
    'comments'=>[
      ['author'=>'Sophie','rating'=>5,'text'=>'We had a fantastic family vacation in this villa.'],
    ],
  ],
  6 => [
    'name'=>'Justine Villa',
    'price'=>'7,999',
    'images'=>['images/rooms/xuvilla.png'],
    'features'=>['Private Pool','4 Bedrooms','3 Bathrooms'],
    'facilities'=>['Wifi','Television','Breakfast','Room Service','Swimming Pool'],
    'adults'=>8,'children'=>6,'area'=>'200 sq. m.','rating'=>5,
    'description'=>'Premium villa with elegant interiors and modern facilities.',
    'comments'=>[
      ['author'=>'Ivy','rating'=>5,'text'=>'Spacious and luxurious, superb amenities.'],
    ],
  ],
  7 => [
    'name'=>'Xu Villa',
    'price'=>'8,999',
    'images'=>['images/rooms/110.png'],
    'features'=>['Private Pool','Spa','Gym'],
    'facilities'=>['Wifi','Television','Breakfast','Room Service','Swimming Pool','Spa'],
    'adults'=>10,'children'=>6,'area'=>'250 sq. m.','rating'=>5,
    'description'=>'Ultra-luxury villa with private spa and gym.',
    'comments'=>[
      ['author'=>'Oliver','rating'=>5,'text'=>'Top-notch experience and great staff.'],
    ],
  ],
  8 => [
    'name'=>'Lafuente Villa',
    'price'=>'9,999',
    'images'=>['images/rooms/laf.png'],
    'features'=>['Private Pool','Spa','Gym','Conference Room'],
    'facilities'=>['Wifi','Television','Breakfast','Room Service','Swimming Pool','Spa','Gym'],
    'adults'=>12,'children'=>6,'area'=>'320 sq. m.','rating'=>5,
    'description'=>'Signature villa offering top-tier amenities for corporate and family stays.',
    'comments'=>[
      ['author'=>'Natalie','rating'=>5,'text'=>'Perfect for our corporate retreat.'],
    ],
  ],
];

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if($id === 0 || !isset($rooms[$id])){
  echo '<div class="container my-5"><div class="alert alert-warning">Room not found. <a href="rooms.php">Back to rooms</a></div></div>';
  require('inc/footer.php');
  exit;
}
$room = $rooms[$id];
?>

<div class="container my-5">
  <div class="row mb-3">
    <div class="col-12">
      <h2 class="fw-bold"><?= htmlspecialchars($room['name']) ?></h2>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent p-0">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="rooms.php">Rooms</a></li>
          <li class="breadcrumb-item active" aria-current="page"><?= htmlspecialchars($room['name']) ?></li>
        </ol>
      </nav>
      
    </div>
  </div>

  <div class="row g-4">
    <div class="col-lg-7">
      <div id="roomCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <?php foreach($room['images'] as $i => $img): ?>
            <div class="carousel-item <?= $i===0? 'active':'' ?>">
              <img src="<?= $img ?>" class="d-block w-100 rounded room-image" alt="<?= htmlspecialchars($room['name']) ?>">
            </div>
          <?php endforeach; ?>
        </div>
        <?php if(count($room['images'])>1): ?>
          <button class="carousel-control-prev" type="button" data-bs-target="#roomCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#roomCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        <?php endif; ?>
      </div>
    </div>

    <div class="col-lg-5">
      <div class="p-4 bg-white detail-card">
        <div class="d-flex justify-content-between align-items-start">
          <div>
            <h3 class="mb-1">₱<?= htmlspecialchars($room['price']) ?> per night</h3>
            <div>
              <?php for($s=0;$s<$room['rating'];$s++): ?>
                <i class="bi bi-star-fill star"></i>
              <?php endfor; ?>
            </div>
          </div>
        </div>

        <hr>

        <h6>Features</h6>
        <div class="mb-3">
          <?php foreach($room['features'] as $f): ?>
            <span class="badge rounded-pill bg-light text-dark me-1"><?= htmlspecialchars($f) ?></span>
          <?php endforeach; ?>
        </div>

        <h6>Facilities</h6>
        <div class="mb-3">
          <?php foreach($room['facilities'] as $fac): ?>
            <span class="badge rounded-pill bg-light text-dark me-1"><?= htmlspecialchars($fac) ?></span>
          <?php endforeach; ?>
        </div>

        <h6>Guests</h6>
        <div class="mb-3">
          <span class="badge rounded-pill bg-light text-dark me-1"><?= htmlspecialchars($room['adults']) ?> Adults</span>
          <span class="badge rounded-pill bg-light text-dark me-1"><?= htmlspecialchars($room['children']) ?> Children</span>
        </div>

        <h6>Area</h6>
        <p class="mb-3"><?= htmlspecialchars($room['area']) ?></p>

        <a href="booking.php?room_id=<?= $id ?>" class="btn btn-success w-100" style="background-color:#18b39b; border-color:#18b39b;">Book Now</a>
      </div>
    </div>
  </div>
</div>

<div class="container my-4">
  <div class="row">
    <div class="col-12">
      <div class="bg-white p-4 rounded shadow-sm">
        <h5>Description</h5>
        <p class="mb-0"><?= htmlspecialchars($room['description']) ?></p>
      </div>
    </div>
  </div>

  <div class="row my-4">
    <div class="col-12">
      <div class="bg-white p-4 rounded shadow-sm">
        <h5>Guest Reviews</h5>
        <?php if(!empty($room['comments'])): ?>
          <?php foreach($room['comments'] as $c): ?>
            <div class="border-bottom py-3">
              <strong><?= htmlspecialchars($c['author']) ?></strong>
              <div class="small text-muted">
                <?php for($r=0;$r<$c['rating'];$r++): ?>
                  <i class="bi bi-star-fill star"></i>
                <?php endfor; ?>
              </div>
              <p class="mb-0 mt-2"><?= htmlspecialchars($c['text']) ?></p>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <p class="text-muted">No reviews yet.</p>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<?php require('inc/footer.php'); ?>

</body>
</html>