<?php
$page = basename($_SERVER['PHP_SELF']);
// Ensure session is started so we can show login state
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<nav class="navbar navbar-expand-lg px-lg-2 shadow-sm sticky-top" style="background-color: #003355;">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="logo.png" alt="Logo" width="70" height="70" class="me-3">
                <div>
                    <span class="h-font fw-bold fs-3" style="color:#fff;">SUNSET</span><br>
                    <span class="fs-5" style="color:#fff;">BEACH RESORT AND HOTEL</span>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="d-flex align-items-center ms-auto">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link me-2 <?php if($page == 'index.php') echo 'active'; ?>" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2 <?php if($page == 'rooms.php') echo 'active'; ?>" href="rooms.php">Rooms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2 <?php if($page == 'services.php') echo 'active'; ?>" href="services.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2 <?php if($page == 'contact.php') echo 'active'; ?>" href="contact.php">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2 <?php if($page == 'about.php') echo 'active'; ?>" href="about.php">About Us</a>
                    </li>
                    </ul>
                    <?php if(!isset($_SESSION['user_id'])): ?>
                        <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" style="background-color: #003355; color: #fff; border: 1px solid #fff;" data-bs-toggle="modal" data-bs-target="#loginModal">
                            Login
                        </button>
                        <button type="button" class="btn btn-outline-dark shadow-none" style="background-color: #003355; color: #fff; border: 1px solid #fff;" data-bs-toggle="modal" data-bs-target="#registerModal">
                            Register
                        </button>
                    <?php else: ?>
                        <div class="dropdown">
                            <button class="btn btn-outline-light dropdown-toggle" style="background-color: #003355; color: #fff; border: 1px solid #fff;" type="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                                Hi, <?php echo htmlspecialchars($_SESSION['user_name'] ?? 'User'); ?>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                                <li><a class="dropdown-item" href="#" id="profileLink" data-bs-toggle="modal" data-bs-target="#profileModal">Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="logout.php" id="logoutLink">Logout</a></li>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

        <!-- Modal: Profile -->
        <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="profileModalLabel">Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="profileContent">
                            <p><strong>Name:</strong> <span id="pf_name"></span></p>
                            <p><strong>Email:</strong> <span id="pf_email"></span></p>
                            <p><strong>Phone:</strong> <span id="pf_phone"></span></p>
                            <p><strong>Role:</strong> <span id="pf_role"></span></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="logout.php" class="btn btn-danger" id="profileLogoutBtn">Logout</a>
                    </div>
                </div>
            </div>
        </div>

    <!-- Modal: Login -->
    <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                <form id="loginForm" action="login.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center" id="loginModalLabel">
                            <i class="bi bi-person-circle fs-3 me-2"></i> User Login
                        </h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" name="email" id="login_email" class="form-control shadow-none" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" id="login_password" class="form-control shadow-none">
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <button type="submit" class="btn btn-primary shadow-none" style="background-color: #003355; border-color: #003355;">Login</button>
                            <a href="javascript:void(0)" class="text-secondary text-decoration-none">Forgot Password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal: Register -->
    <div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <form id="registerForm" action="ajax/login_register.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="register" value="1">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center" id="registerModalLabel">
                            <i class="bi bi-person-lines-fill fs-3 me-2"></i>User Register
                        </h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                            Note: Your details must match with your ID (National ID, Postal ID, Passport, Driving License etc.) that you will be required to submit during check-in.
                        </span>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" id="reg_name" class="form-control shadow-none" required >
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" id="reg_email" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Phone Number</label>
                                    <input  type="text" name="phonenum" id="reg_phone" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Picture</label>
                                    <input name="profile" type="file" accept=".jpg, .jpeg, .png, .webp" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-12 ps-0 mb-3">
                                    <label class="form-label">Address</label>
                                    <textarea name="address" id="reg_address" class="form-control shadow-none" rows="1" required></textarea>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Pincode</label>
                                    <input name="pincode" type="text" id="reg_pincode" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Date of birth</label>
                                    <input name="dob" type="date" id="reg_dob" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control shadow-none" name="pass" id="reg_password" required>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control shadow-none" name="cpass" id="reg_confirm_password" required>
                                </div>
                                <div class="col-md-12 ps-0 mb-3">
                                    <input type="checkbox" id="showRegPassword" onclick="toggleRegPassword()"> Show Password
                                </div>
                            </div>
                        </div>
                        <div class="text-center my-1">
                            <button type="submit" class="btn btn-primary shadow-none" style="background-color: #003355; border-color: #003355;">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

 