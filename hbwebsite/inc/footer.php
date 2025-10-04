<div class="container-fluid bg-white mt-5"> <!-- px-0 removes left/right padding -->
  <div class="row"> <!-- g-0 removes gutters; m-0 ensures no margin -->
    <div class="col-lg-4 p-4"> <!-- px-0 to remove padding on columns -->
      <h3 class="h-font fw-bold fs-3 mb-2">SUNSET BEACH RESORT AND HOTEL</h3>
      <p>
        Experience the ultimate beachfront getaway at Sunset Beach Resort and Hotel,
        where luxury meets tranquility. Our stunning oceanfront property offers breathtaking views,
        world-class amenities, and exceptional service to ensure an unforgettable stay.
      </p>
    </div>
    <div class="col-lg-4 p-4">
      <h5 class="mb-3">Links</h5>
      <a href="#" class="d-block mb-2 text-decoration-none text-dark">Home</a>
      <a href="#" class="d-block mb-2 text-decoration-none text-dark">Rooms</a>
      <a href="#" class="d-block mb-2 text-decoration-none text-dark">Services</a>
      <a href="#" class="d-block mb-2 text-decoration-none text-dark">Contact Us</a>
      <a href="#" class="d-block mb-2 text-decoration-none text-dark">About Us</a>    
    </div>
    <div class="col-lg-4 p-4">
      <h5 class="mb-3">Follow Us</h5>
      <a href="#" class="d-inline-block mb-3 text-decoration-none text-dark mb-2">
        <i class="bi bi-facebook me-1"></i> Facebook
      </a><br>
      <a href="#" class="d-inline-block mb-3 text-decoration-none text-dark mb-2">
        <i class="bi bi-instagram me-1"></i> Instagram
      </a><br>
      <a href="#" class="d-inline-block mb-3 text-decoration-none text-dark">
        <i class="bi bi-twitter me-1"></i> Twitter
      </a>
    </div>
  </div>
</div>
<h6 class="text-center bg-dark text-white p-3 m-0">© 2025 Sunset Beach Resort &amp; Hotel. All rights reserved.</h6>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
  function setActive()
  {
  }

  let register_form = document.getElementById('register-form');
  register_form.addEventListener('submit', (e) => {
    e.preventDefault();
    let data = new FormData();
    data.append('name', register_form.elements['name'].value);
    data.append('email', register_form.elements['email'].value);
    data.append('phone', register_form.elements['phone'].value);
    data.append('address', register_form.elements['address'].value);
    data.append('pincode', register_form.elements['pincode'].value);
    data.append('dob', register_form.elements['dob'].value);
    data.append('pass', register_form.elements['pass'].value);
    data.append('cpass', register_form.elements['cpass'].value);
    data.append('profile', register_form.elements['profile'].files[0]);
    data.append('register', '');
    
    var myModal = document.getElementById('registerModal');
    var modal = bootstrap.Modal.getInstance(myModal); // Returns a Bootstrap modal instance

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/login_register.php", true);

    xhr.onload = function() {
      if (this.responseText == 'pass_mismatch') {
        alert('Password Mismatch');
      } else if (this.responseText == 'email_already') {
        alert('Email Already Registered');
      } else if (this.responseText == 'phone_already') {
        alert('Phone Number Already Registered');
      } else if (this.responseText == 'inserted') {
        alert('Registration Successful');
        register_form.reset();
        $('#registerModal').modal('hide');
      } else {
        alert('Something went wrong');
      }
    }

    xhr.send(data);
  });
  setActive()
</script>