<?php
require('inc/links.php');
require('inc/header.php');
require('inc/db_config.php');

$room_id = isset($_GET['room_id']) ? (int)$_GET['room_id'] : 0;
// Room definitions with capacity limits
$rooms = [
  1 => ['name'=>'Alcala Regular','price'=>1499,'image'=>'images/rooms/1.jpg','capacity'=>5],
  2 => ['name'=>'Justine Regular','price'=>1999,'image'=>'images/rooms/2.png','capacity'=>5],
  3 => ['name'=>'Xu Regular','price'=>2999,'image'=>'images/rooms/3.png','capacity'=>5],
  4 => ['name'=>'Lafuente Regular','price'=>3499,'image'=>'images/rooms/4.png','capacity'=>5],
  5 => ['name'=>'Alcala Villa','price'=>4999,'image'=>'images/rooms/alcalavilla.png','capacity'=>5],
];

if($room_id === 0 || !isset($rooms[$room_id])){
  echo '<div class="container my-5"><div class="alert alert-warning">Room not found. <a href="rooms.php">Back to rooms</a></div></div>';
  require('inc/footer.php');
  exit;
}
$room = $rooms[$room_id];
if (session_status() === PHP_SESSION_NONE) session_start();

// Fetch blocked dates for this room from database
$blocked_dates = [];
try {
  $stmt = $con->prepare("
    SELECT checkin, checkout 
    FROM reservations 
    WHERE room_id = ? 
    AND status IN ('confirmed', 'pending', 'checked_in')
  ");
  $stmt->bind_param('i', $room_id);
  $stmt->execute();
  $result = $stmt->get_result();
  
  while($row = $result->fetch_assoc()) {
    $blocked_dates[] = [
      'checkin' => $row['checkin'],
      'checkout' => $row['checkout']
    ];
  }
  $stmt->close();
} catch(Exception $e) {
  // If table doesn't exist yet, continue with empty blocked dates
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Confirm Booking</title>
  <?php require('inc/links.php'); ?>
  <style>
    .blocked-date {
      background-color: #ffebee !important;
      text-decoration: line-through;
      color: #999 !important;
      cursor: not-allowed !important;
    }
    .capacity-warning {
      background-color: #fff3cd;
      border: 1px solid #ffc107;
      padding: 10px;
      border-radius: 5px;
      margin-bottom: 15px;
    }
  </style>
</head>
<body class="bg-light">
  <div class="container my-5">
    <div class="row">
      <div class="row mb-3">
        <div class="col-12">
          <h2 class="fw-bold">Confirm Booking</h2>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent p-0">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item"><a href="rooms.php">Rooms</a></li>
              <li class="breadcrumb-item active" aria-current="page">Confirm Booking</li>
            </ol>
          </nav>
        </div>
      </div>
      
      <div class="col-md-7">
        <div class="card">
          <div class="container my-5"></div>
          <img src="<?= htmlspecialchars($room['image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($room['name']) ?>">
          <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($room['name']) ?></h5>
            <p class="card-text">₱<?= number_format($room['price'],2) ?> per night</p>
            <p class="card-text"><small class="text-muted">Maximum capacity: <?= $room['capacity'] ?> bookings</small></p>
          </div>
        </div>
      </div>
      
      <div class="col-md-5">
        <div class="card p-3">
          <h5>Booking Details</h5>
          
          <div id="capacityWarning" class="capacity-warning d-none">
            <strong>⚠️ Capacity Alert:</strong>
            <p class="mb-0 mt-1">This room is fully booked for the selected dates. Please choose different dates.</p>
          </div>
          
          <form id="bookingForm">
            <input type="hidden" name="room_id" value="<?= $room_id ?>">
            <input type="hidden" name="room_capacity" value="<?= $room['capacity'] ?>">
            
            <div class="mb-2">
              <label class="form-label">Name</label>
              <input class="form-control" name="name" id="nameInput" value="<?= htmlspecialchars($_SESSION['user_name'] ?? '') ?>" required pattern="[A-Za-z\s]+" title="Please enter letters only (no numbers)">
              <small class="text-muted">Letters only, no numbers</small>
            </div>
            
            <div class="mb-2">
              <label class="form-label">Phone</label>
              <input class="form-control" name="phone" id="phoneInput" type="tel" value="<?= htmlspecialchars($_SESSION['user_phone'] ?? '') ?>" required pattern="[0-9]{10,11}" title="Please enter 10-11 digits only">
              <small class="text-muted">Numbers only (10-11 digits)</small>
            </div>
            
            <div class="mb-2">
              <label class="form-label">Address</label>
              <textarea name="address" class="form-control" rows="2"></textarea>
            </div>
            
            <div class="row gx-2">
              <div class="col-6 mb-2">
                <label class="form-label">Check-in</label>
                <input type="date" name="checkin" id="checkin" class="form-control" required>
              </div>
              <div class="col-6 mb-2">
                <label class="form-label">Check-out</label>
                <input type="date" name="checkout" id="checkout" class="form-control" required>
              </div>
            </div>
            
            <div class="mb-2">
              <label class="form-label">Guests</label>
              <div class="row gx-2">
                <div class="col-6 mb-2">
                  <label class="form-label">Adults</label>
                  <select id="adults" name="adults" class="form-select shadow-none">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                  </select>
                </div>
                <div class="col-6 mb-2">
                  <label class="form-label">Children</label>
                  <select id="children" name="children" class="form-select shadow-none">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
                </div>
              </div>
            </div>
            
            <div class="mb-2">
              <strong>No. of days: <span id="nights">0</span></strong><br>
              <strong>Total: ₱<span id="total">0.00</span></strong>
            </div>

            <div class="d-grid gap-2">
              <button type="button" id="gcashBtn" class="btn btn-success">Pay with GCash</button>
              <button type="button" id="paymongoBtn" class="btn btn-info">Pay with PAYMAYA</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

<?php require('inc/footer.php'); ?>

<script>
const pricePerNight = <?= json_encode($room['price']) ?>;
const roomCapacity = <?= json_encode($room['capacity']) ?>;
const blockedDates = <?= json_encode($blocked_dates) ?>;

// Input validation
document.getElementById('nameInput').addEventListener('input', function(e) {
  this.value = this.value.replace(/[0-9]/g, '');
});

document.getElementById('phoneInput').addEventListener('input', function(e) {
  this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11);
});

// Check if date range overlaps with any blocked dates
function isDateRangeBlocked(checkin, checkout) {
  const start = new Date(checkin);
  const end = new Date(checkout);
  
  for(let blocked of blockedDates) {
    const blockedStart = new Date(blocked.checkin);
    const blockedEnd = new Date(blocked.checkout);
    
    // Check if ranges overlap
    if(start < blockedEnd && end > blockedStart) {
      return true;
    }
  }
  return false;
}

// Check capacity for date range
async function checkCapacity(checkin, checkout) {
  const formData = new FormData();
  formData.append('room_id', <?= $room_id ?>);
  formData.append('checkin', checkin);
  formData.append('checkout', checkout);
  formData.append('capacity', roomCapacity);
  
  try {
    const response = await fetch('check_room_capacity.php', {
      method: 'POST',
      body: formData
    });
    const data = await response.json();
    return data;
  } catch(e) {
    console.error('Capacity check failed:', e);
    return {available: true, current: 0};
  }
}

// Calculate nights and total
async function calc() {
  const inpt = document.getElementById('checkin').value;
  const out = document.getElementById('checkout').value;
  
  if(!inpt || !out) return;
  
  const d1 = new Date(inpt);
  const d2 = new Date(out);
  const diff = Math.ceil((d2 - d1) / (1000*60*60*24));
  const nights = diff > 0 ? diff : 0;
  
  document.getElementById('nights').innerText = nights;
  document.getElementById('total').innerText = (nights * pricePerNight).toFixed(2);
  
  // Check capacity
  if(nights > 0) {
    const capacityCheck = await checkCapacity(inpt, out);
    const warningDiv = document.getElementById('capacityWarning');
    const gcashBtn = document.getElementById('gcashBtn');
    const paymongoBtn = document.getElementById('paymongoBtn');
    
    if(!capacityCheck.available) {
      warningDiv.classList.remove('d-none');
      gcashBtn.disabled = true;
      paymongoBtn.disabled = true;
    } else {
      warningDiv.classList.add('d-none');
      gcashBtn.disabled = false;
      paymongoBtn.disabled = false;
    }
  }
}

document.getElementById('checkin').addEventListener('change', calc);
document.getElementById('checkout').addEventListener('change', calc);

// Set minimum date to today
const today = new Date().toISOString().split('T')[0];
document.getElementById('checkin').min = today;
document.getElementById('checkout').min = today;

// Enforce total guests <= 6
function enforceGuestLimit(){
  const adultsSel = document.getElementById('adults');
  const childrenSel = document.getElementById('children');
  if(!adultsSel || !childrenSel) return;
  const MAX = 6;

  function adjustOptions(){
    const adults = parseInt(adultsSel.value || '1',10);
    const maxChildren = Math.max(0, MAX - adults);
    
    for(let i = childrenSel.options.length - 1; i>=0; i--){
      const val = parseInt(childrenSel.options[i].value,10);
      if(val > maxChildren){
        if(childrenSel.selectedIndex === i){
          childrenSel.value = String(maxChildren);
        }
        childrenSel.remove(i);
      }
    }
    
    for(let i=0;i<=maxChildren;i++){
      let exists = false;
      for(let j=0;j<childrenSel.options.length;j++){
        if(parseInt(childrenSel.options[j].value,10) === i){ exists = true; break; }
      }
      if(!exists){
        const opt = document.createElement('option');
        opt.value = String(i);
        opt.text = String(i);
        childrenSel.appendChild(opt);
      }
    }
  }

  adultsSel.addEventListener('change', ()=>{ adjustOptions(); });
  adjustOptions();
}

enforceGuestLimit();

async function doPayment(provider){
  const form = document.getElementById('bookingForm');
  const name = form.querySelector('[name="name"]').value.trim();
  const phone = form.querySelector('[name="phone"]').value.trim();
  const checkin = form.querySelector('[name="checkin"]').value;
  const checkout = form.querySelector('[name="checkout"]').value;
  const nights = parseInt(document.getElementById('nights').innerText || '0', 10);

  // Validation
  if(!name){ alert('Please enter your name.'); return; }
  if(/[0-9]/.test(name)){ alert('Name cannot contain numbers.'); return; }
  if(!phone){ alert('Please enter your phone number.'); return; }
  if(!/^[0-9]{10,11}$/.test(phone)){ alert('Phone must be 10-11 digits only.'); return; }
  if(!checkin){ alert('Please select a check-in date.'); return; }
  if(!checkout){ alert('Please select a check-out date.'); return; }
  if(!nights || nights <= 0){ alert('Please select valid dates (at least 1 night).'); return; }

  // Check capacity one more time before payment
  const capacityCheck = await checkCapacity(checkin, checkout);
  if(!capacityCheck.available) {
    alert(`Sorry, this room is fully booked for the selected dates. Currently ${capacityCheck.current} out of ${roomCapacity} bookings.`);
    return;
  }

  const createEndpoint = provider === 'paymongo' ? 'paymongo_create.php' : 'gcash_create.php';
  const createData = new FormData();
  createData.append('room_id', form.querySelector('[name="room_id"]').value);
  createData.append('nights', nights);
  createData.append('price', pricePerNight);
  createData.append('name', name);
  createData.append('phone', phone);
  createData.append('checkin', checkin);
  createData.append('checkout', checkout);

  const createRes = await fetch(createEndpoint, {method:'POST', body: createData});
  const createJson = await createRes.json();
  let popupUrl = null;
  
  if(createJson && createJson.success && createJson.checkout_url){
    popupUrl = createJson.checkout_url;
  } else {
    const params = new URLSearchParams();
    params.set('provider', provider);
    params.set('room_id', form.querySelector('[name="room_id"]').value);
    params.set('nights', nights);
    params.set('price', pricePerNight);
    params.set('name', name);
    params.set('phone', phone);
    params.set('checkin', checkin);
    params.set('checkout', checkout);
    popupUrl = `provider_mock/${provider}_checkout.php?` + params.toString();
  }
  
  const w = 480, h = 720;
  const left = (screen.width/2) - (w/2);
  const top = (screen.height/2) - (h/2);
  const popup = window.open(popupUrl, 'checkout', `width=${w},height=${h},left=${left},top=${top}`);

  if(!popup){
    alert('Popup was blocked. Falling back to inline demo payment.');
    const fallbackData = new FormData(form);
    fallbackData.append('provider', provider);
    fallbackData.append('price', pricePerNight);
    fallbackData.append('nights', nights);
    const res = await fetch('payment_demo.php', {method:'POST', body: fallbackData});
    const json = await res.json();
    if(json.success){
      fallbackData.append('transaction_id', json.transaction_id);
      const saveRes = await fetch('save_booking.php', {method:'POST', body: fallbackData});
      const saveJson = await saveRes.json();
      if(saveJson.success){ 
        alert('Booking confirmed! Booking id: ' + saveJson.reservation_id); 
        window.location.href='index.php'; 
      } else { 
        alert('Booking save failed: ' + (saveJson.error || 'Unknown')); 
      }
    } else { 
      alert('Payment failed (demo).'); 
    }
    return;
  }

  function onMessage(e){
    try{
      if(e.origin !== window.location.origin) return;
    } catch(err){}

    const data = e.data || {};
    if(data.type === 'payment_result'){
      window.removeEventListener('message', onMessage);
      if(popup) try{ popup.close(); }catch(e){}
      
      if(data.success){
        if(data.reservation_id){
          const tx = data.transaction_id || '';
          const queuedParam = data.queued ? '&queued=1' : '';
          const tokenParam = data.status_token ? '&token=' + encodeURIComponent(data.status_token) : '';
          const roomParam = data.room_id ? '&room_id=' + encodeURIComponent(data.room_id) : '';
          window.location.href = 'thank_you.php?tx=' + encodeURIComponent(tx) + '&rid=' + encodeURIComponent(data.reservation_id) + queuedParam + tokenParam + roomParam;
          return;
        }

        const saveForm = new FormData(form);
        if(data.transaction_id) saveForm.append('transaction_id', data.transaction_id);
        saveForm.append('provider', provider);
        saveForm.append('price', pricePerNight);
        saveForm.append('nights', nights);
        
        fetch('save_booking.php', {method:'POST', body: saveForm}).then(async r=>{
          const text = await r.text();
          let saveJson = null;
          try{ 
            saveJson = JSON.parse(text); 
          } catch(e){
            alert('Save failed: server returned invalid response.');
            console.error('Invalid JSON response from save_booking:', text);
            return;
          }
          
          if(saveJson.success){
            const tx = saveJson.transaction_id || saveJson.transaction_ref || '';
            const queuedParam = saveJson.queued ? '&queued=1' : '';
            const tokenParam = saveJson.status_token ? '&token=' + encodeURIComponent(saveJson.status_token) : '';
            const roomParam = saveJson.room_id ? '&room_id=' + encodeURIComponent(saveJson.room_id) : '';
            window.location.href = 'thank_you.php?tx=' + encodeURIComponent(tx) + '&rid=' + encodeURIComponent(saveJson.reservation_id || '') + queuedParam + tokenParam + roomParam;
          } else {
            alert('Booking save failed: ' + (saveJson.error || 'Unknown'));
          }
        }).catch(err=>{ alert('Save failed: '+err.message); });
      } else {
        alert('Payment cancelled or failed: ' + (data.error || 'Unknown'));
      }
    }
  }

  window.addEventListener('message', onMessage);
}

document.getElementById('gcashBtn').addEventListener('click', ()=>doPayment('gcash'));
document.getElementById('paymongoBtn').addEventListener('click', ()=>doPayment('paymongo'));
</script>
</body>
</html>