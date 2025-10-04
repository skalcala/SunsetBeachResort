<?php
$host = 'localhost';
$user = 'root';
$pass = 'Annaramos14';

// Connect directly to the intended database for this project
$db = 'resortdb';

$GLOBALS['con'] = mysqli_connect($host, $user, $pass, $db);

if (!$GLOBALS['con']) {
    // If the preferred DB doesn't exist, attempt to connect without DB to provide a clearer error
    $con_test = @mysqli_connect($host, $user, $pass);
    if (!$con_test) {
        die("Database access failed: " . mysqli_connect_error());
    }
    // Inform about missing database
    die("Could not connect to database '$db'. Available DBs: " . implode(', ', array_map(function($r){ return $r[0]; }, mysqli_fetch_all(mysqli_query($con_test, 'SHOW DATABASES')))));
}

// ✅ Sanitize input to prevent XSS / injection
function filteration($data){
    foreach($data as $key => $value){
        $value = trim($value);
        $value = stripslashes($value);
        $value = strip_tags($value);
        $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        $data[$key] = $value;
    }
    return $data;
}

// ✅ Generic SELECT function
function select($sql, $values, $datatypes){
    $con = $GLOBALS['con'];
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            $error = mysqli_error($con);
            mysqli_stmt_close($stmt);
            die("Select execution error: $error");
        }
    } else {
        die("Select preparation error: " . mysqli_error($con));
    }
}

// ✅ Generic INSERT function
function insert($sql, $values, $datatypes){
    $con = $GLOBALS['con'];
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            $error = mysqli_error($con);
            mysqli_stmt_close($stmt);
            die("Insert execution error: $error");
        }
    } else {
        die("Insert preparation error: " . mysqli_error($con));
    }
}

// ✅ Generic UPDATE function
function update($sql, $values, $datatypes){
    $con = $GLOBALS['con'];
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            $error = mysqli_error($con);
            mysqli_stmt_close($stmt);
            die("Update execution error: $error");
        }
    } else {
        die("Update preparation error: " . mysqli_error($con));
    }
}

// ✅ Generic DELETE function
function delete($sql, $values, $datatypes){
    $con = $GLOBALS['con'];
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            $error = mysqli_error($con);
            mysqli_stmt_close($stmt);
            die("Delete execution error: $error");
        }
    } else {
        die("Delete preparation error: " . mysqli_error($con));
    }
}

// Helper: check if a table exists in the connected database
function tableExists($table) {
    $con = $GLOBALS['con'];
    $table = mysqli_real_escape_string($con, $table);
    $res = mysqli_query($con, "SHOW TABLES LIKE '$table'");
    return ($res && mysqli_num_rows($res) > 0);
}

// ✅ Check if room is available for a specific date
function isRoomAvailable($room_id, $date){
    // Use canonical table name `room_availability` created in schema.sql
    if (!tableExists('room_availability')) {
        return false;
    }
    $sql = "SELECT is_available FROM room_availability WHERE room_id = ? AND available_date = ?";
    $res = select($sql, [$room_id, $date], 'is');

    if ($res && mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        return $row['is_available'] == 1;
    }
    return false; // No record means unavailable
}
?>
