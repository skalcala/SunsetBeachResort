<?php


define('SITE_URL', 'http://localhost/hbwebsite/'); // Adjust as needed

require_once __DIR__ . '/db_config.php';

// Only handle direct POST to this file. When included by other scripts, don't auto-run.
if (realpath(__FILE__) === realpath($_SERVER['SCRIPT_FILENAME'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
        $data = filteration($_POST);

    $name     = $data['name'];
    $email    = $data['email'];
    $phone    = $data['phonenum'];
    $address  = $data['address'];
    $pincode  = $data['pincode'];
    $dob      = $data['dob'];
    $pass     = $data['pass'];
    $cpass    = $data['cpass'];

    // Password match validation
    if ($pass !== $cpass) {
        die("Passwords do not match!");
    }

    // Email check (prevent duplicate)
    $check_email = select("SELECT id FROM users WHERE email = ?", [$email], "s");
    if (mysqli_num_rows($check_email) > 0) {
        die("Email already registered.");
    }

    // Save profile picture
    $profile_name = $_FILES['profile']['name'];
    $profile_tmp = $_FILES['profile']['tmp_name'];
    $profile_path = '../uploads/users/' . time() . '_' . basename($profile_name);

    // Create upload folder if it doesn't exist
    if (!file_exists('../uploads/users')) {
        mkdir('../uploads/users', 0777, true);
    }

    if (!move_uploaded_file($profile_tmp, $profile_path)) {
        die("Failed to upload profile image.");
    }

    // Hash password before saving
    $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

    // Determine which user table exists and insert accordingly
    $con = $GLOBALS['con'];
    $has_users = (mysqli_num_rows(mysqli_query($con, "SHOW TABLES LIKE 'users'")) > 0);
    $has_user_cred = (mysqli_num_rows(mysqli_query($con, "SHOW TABLES LIKE 'user_cred'")) > 0);

    if ($has_users) {
        // Insert into modern `users` table
        $res = insert("INSERT INTO users (name, email, phone, picture, address, pincode, dob, password_hash) VALUES (?, ?, ?, ?, ?, ?, ?, ?)", 
            [$name, $email, $phone, $profile_path, $address, $pincode, $dob, $hashed_password],
            "ssssssss"
        );

        if ($res == 1) {
            $user_id = mysqli_insert_id($con);
            $token = bin2hex(random_bytes(16));
            $expires = date('Y-m-d H:i:s', strtotime('+1 day'));
            // insert token if table exists
            if (mysqli_num_rows(mysqli_query($con, "SHOW TABLES LIKE 'verification_tokens'")) > 0) {
                insert("INSERT INTO verification_tokens (user_id, token, expires_at) VALUES (?,?,?)", [$user_id, $token, $expires], 'iss');
            }
            echo "Registration successful!";
        } else {
            echo "Something went wrong!";
        }
    } elseif ($has_user_cred) {
        // Fallback to legacy `user_cred` table if present
        $res = insert("INSERT INTO user_cred (name, email, phonenum, profile, address, pincode, dob, password, token) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)", 
            [$name, $email, $phone, $profile_path, $address, $pincode, $dob, $hashed_password, ''],
            "sssssssss"
        );

        if ($res == 1) {
            echo "Registration successful!";
        } else {
            echo "Something went wrong!";
        }
    } else {
        die('No user table found in database.');
    }
    }
}






define('SENDGRID_API_KEY', "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");
function adminLogin() {
    session_start();
    if(!(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true)) {
        header("location: index.php");
        exit;
    }
}

function alert($type, $msg) {
    $bs_class = ($type == "success") ? "alert-success" : "alert-danger";
    echo <<<alert
        <div class="alert $bs_class alert-dismissible fade show custom-alert" role="alert">
            <strong class="me-3">$msg</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    alert;
}
?>