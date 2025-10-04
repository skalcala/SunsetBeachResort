<?php
require_once __DIR__ . '/../inc/db_config.php';
require_once __DIR__ . '/../inc/essentials.php';
require_once __DIR__ . '/../inc/sendgrid-php/sendgrid-php.php';

function send_mail($to_email, $name, $token) {
    $mail = new \SendGrid\Mail\Mail();
    $mail->setFrom("sbeachresorthotel@gmail.com", "Sunset Beach Resort & Hotel");
    $mail->setSubject("Please verify your email address");
    $mail->addTo($to_email, $name);

    // Auto-detect base URL
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
    $base = $protocol . $_SERVER['HTTP_HOST'] . '/hbwebsite/';
    $verify_link = $base . 'email_confirm.php?email=' . urlencode($to_email) . '&token=' . urlencode($token);

    $mail->addContent(
        "text/html",
        "<p>Click the link below to verify your email address:</p>
        <p><a href='$verify_link'>CLICK HERE TO VERIFY YOUR EMAIL ADDRESS</a></p>
        <h1>Welcome to Sunset Beach Resort & Hotel</h1>
        <p>Thank you for registering with us!</p>
        <p>If you have any questions, feel free to reach out.</p>
        <p>Best regards,<br>Sunset Beach Resort & Hotel Team</p>"
    );

    $apiKey = getenv('SENDGRID_API_KEY') ?: (defined('SENDGRID_API_KEY') ? SENDGRID_API_KEY : null);
    if (empty($apiKey)) {
        error_log('SENDGRID_API_KEY not set');
        return 0;
    }

    $sendgrid = new \SendGrid($apiKey);
    try {
        $response = $sendgrid->send($mail);
        return ($response->statusCode() >= 200 && $response->statusCode() < 300) ? 1 : 0;
    } catch (Exception $e) {
        error_log('SendGrid exception: ' . $e->getMessage());
        return 0;
    }
}

/* ============================
   REGISTER
   ============================ */
if (isset($_POST['register'])) {
    $data = filteration($_POST);

    // Password validation
    if (empty($data['pass']) || empty($data['cpass']) || $data['pass'] !== $data['cpass']) {
        echo 'pass_mismatch';
        exit;
    }

    // Check if email or phone already exists
    $u_exist = select("SELECT * FROM `users` WHERE `email`=? OR `phonenum`=?", [$data['email'], $data['phonenum']], "ss");
    if (mysqli_num_rows($u_exist) != 0) {
        $u_exist_fetch = mysqli_fetch_assoc($u_exist);
        if ($u_exist_fetch['email'] == $data['email']) {
            echo 'email_already';
        } else {
            echo 'phone_already';
        }
        exit;
    }

    // Handle picture upload
    if (isset($_FILES['profile']) && $_FILES['profile']['error'] === UPLOAD_ERR_OK) {
        $allowed_types = ['image/jpeg', 'image/png', 'image/webp'];
        $file_type = mime_content_type($_FILES['profile']['tmp_name']);
        $file_size = $_FILES['profile']['size'];

        if (!in_array($file_type, $allowed_types)) {
            echo 'invalid_image';
            exit;
        }

        if ($file_size > 2 * 1024 * 1024) { // 2 MB limit
            echo 'large_image';
            exit;
        }

        $ext = pathinfo($_FILES['profile']['name'], PATHINFO_EXTENSION);
        $img_name = 'IMG_' . time() . ".$ext";
        $upload_path = __DIR__ . '/../uploads/users/' . $img_name;

        if (move_uploaded_file($_FILES['profile']['tmp_name'], $upload_path)) {
            $img = $img_name;
        } else {
            echo 'upd_failed';
            exit;
        }
    } else {
        echo 'no_image';
        exit;
    }

    // Generate verification token
    try {
        $token = bin2hex(random_bytes(16));
    } catch (Exception $e) {
        $token = bin2hex(openssl_random_pseudo_bytes(16));
    }

    // Send verification email
    if (!send_mail($data['email'], $data['name'], $token)) {
        echo 'mail_failed';
        exit;
    }

    // Hash the password
    $enc_pass = password_hash($data['pass'], PASSWORD_BCRYPT);

    // Insert into users table
    $query = "INSERT INTO `users` 
        (`name`, `email`, `phonenum`, `profile`, `address`, `pincode`, `dob`, `password`) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $values = [
        $data['name'],
        $data['email'],
        $data['phonenum'],
        $img,
        $data['address'],
        $data['pincode'],
        $data['dob'],
        $enc_pass
    ];

    if (insert($query, $values, 'ssssssss')) {
        $user_id = mysqli_insert_id($GLOBALS['con']);
        $expires = date('Y-m-d H:i:s', strtotime('+1 day'));
        $tres = insert("INSERT INTO verification_tokens (user_id, token, expires_at) VALUES (?, ?, ?)", [$user_id, $token, $expires], 'iss');
        echo $tres ? 'inserted' : 'ins_failed_token';
        exit;
    } else {
        echo 'ins_failed';
        exit;
    }
}

/* ============================
   LOGIN
   ============================ */
if (isset($_POST['login'])) {
    $data = filteration($_POST);

    $u_exist = select("SELECT * FROM `users` WHERE `email`=?", [$data['email']], "s");

    if (mysqli_num_rows($u_exist) == 0) {
        echo 'invalid_email';
        exit;
    }

    $u_fetch = mysqli_fetch_assoc($u_exist);

    if (!password_verify($data['pass'], $u_fetch['password'])) {
        echo 'invalid_pass';
    } else {
        if ($u_fetch['is_verified'] == 0) {
            echo 'not_verified';
        } else if ($u_fetch['is_active'] == 0) {
            echo 'inactive';
        } else {
            session_start();
            $_SESSION['user_login'] = true;
            $_SESSION['user_id'] = $u_fetch['id'];
            $_SESSION['user_name'] = $u_fetch['name'];
            echo 'login_success';
        }
    }
    exit;
}
?>
