<?php session_start();
include('../../connection/config.php');

$adminU = $_POST['userEmail'];
$adminPstr = $_POST['userPassword'];
$adminP = hash('sha256', $adminPstr);
$ip_add = $_SERVER['REMOTE_ADDR'];
$logIns_d = date('Y/m/d');
$logIns_t = date("h:i:s");
$aUser_check = mysqli_query($con, "SELECT * FROM `ec_employee` WHERE `email` = '" . $adminU . "' ");
$aUser_count = mysqli_num_rows($aUser_check);

if ($aUser_count > 0) {

    $aUser_table = mysqli_fetch_assoc($aUser_check);
    $db_pass = $aUser_table['password'];
    $user_token = $aUser_table['email'];

    if ($adminP == $db_pass) {
        $logInQuery = mysqli_query($con, "UPDATE `ec_employee` SET `last_login_date`='$logIns_d',`last_login_time`='$logIns_t',`ip_address`='$ip_add' WHERE `email` = '" . $adminU . "' ");
        $login_att = mysqli_query($con, "INSERT INTO `ec_login_attempts`(`user_name`, `password`, `login_date`, `login_time`, `ip_address`, `status`) VALUES ('$adminU','$adminP','$logIns_d','$logIns_t','$ip_add','Pass')");
        echo json_encode(array('status' => true, 'message' => 'Login Successfully Enjoy Your Account'));
        $_SESSION['adminToken'] = $user_token;
    } else {
        $login_att = mysqli_query($con, "INSERT INTO `ec_login_attempts`(`user_name`, `password`, `login_date`, `login_time`, `ip_address`, `status`) VALUES ('$adminU','$adminP','$logIns_d','$logIns_t','$ip_add','Fail')");
        echo json_encode(array('status' => false, 'message' => 'Wrong Password Entered !'));
    }
} else {
    $login_att = mysqli_query($con, "INSERT INTO `ec_login_attempts`(`user_name`, `password`, `login_date`, `login_time`, `ip_address`, `status`) VALUES ('$adminU','$adminP','$logIns_d','$logIns_t','$ip_add','Fail')");
    echo json_encode(array('status' => false, 'message' => 'Invalid email !'));
}
