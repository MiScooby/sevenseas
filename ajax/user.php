<?php include('../connection/config.php');
require_once '../emailer/mail.class.php';

$four_digit_code = rand(1000, 9999);

if (isset($_POST['formType']) && $_POST['formType'] == "registrationForm") {
    $regName = $_POST['regName'];
    $regEmail = $_POST['regEmail'];
    $regMobile = $_POST['regMobile'];
    $regPassword = $_POST['regPassword'];
    $userP = hash('sha256', $regPassword);

    $addUser = mysqli_query($con, "INSERT INTO `user`(`name`, `mobile`, `email`, `password`) VALUES ('$regName','$regMobile','$regEmail','$userP')");
    if ($addUser) {
        $addOtp = mysqli_query($con, "INSERT INTO `temp_table`( `email`, `otp`) VALUES ('$regEmail','$four_digit_code')");
        if ($addOtp) {
            $data['status'] = true;
            $data['email'] = $regEmail;
            $data['message'] = "otp sent on your entered email";
            include '../emailer_html/otp/index.php';
            $title = "Seven Seas - visa portal";
            $sub = "Registration OTP Code";
            $client = new HttpMail($regEmail);
            $client->send($title, $sub, $msg);
        } else {
            $data['status'] = false;
            $data['message'] = "error occur";
        }
    } else {
        $data['status'] = false;
        $data['message'] = "error occur";
    }
}

if (isset($_POST['formType']) && $_POST['formType'] == "otpForm") {
    $otp_reg = $_POST['otp_reg'];
    $user_email = $_POST['user_email'];

    $getOtp = mysqli_query($con, "SELECT * FROM `temp_table` WHERE `email`='$user_email'  ORDER BY `id` DESC");
    $getOtpCount = mysqli_num_rows($getOtp);
    if ($getOtpCount > 0) {
        $getOtpData = mysqli_fetch_array($getOtp)['otp'];
        if ($getOtpData == $otp_reg) {
            $isd = mysqli_query($con, "UPDATE `user` SET `verfied`='yes',`status`='1'  WHERE `email`='$user_email'");
            if ($isd) {
                $_SESSION['user_id'] = $user_email;
                $data['status'] = true;
                $data['message'] = "verified";
            } else {
                $data['status'] = false;
                $data['message'] = "error occur";
            }
        } else {
            $data['status'] = false;
            $data['message'] = "otp wrong";
        }
    } else {
        $data['status'] = false;
        $data['message'] = "error occur";
    }
}

if (isset($_POST['formType']) && $_POST['formType'] == "loginForm") {
    $loginEmail = $_POST['loginEmail'];
    $loginPassword = $_POST['loginPassword'];
    $userP = hash('sha256', $loginPassword);

    $getUser = mysqli_query($con, "SELECT * FROM `user` WHERE `email`='$loginEmail' AND `trash`='0' AND `status`='1' AND `verfied`='yes' ");
    if (mysqli_num_rows($getUser) > 0) {
        $getUserD = mysqli_fetch_array($getUser);
        if ($getUserD['password'] == $userP) {
            $_SESSION['user_id'] = $loginEmail;
            $data['status'] = true;
            $data['message'] = "Login done";
        } else {
            $data['status'] = false;
            $data['message'] = "Wrong Password Entered !!";
        }
    } else {
        $data['status'] = false;
        $data['message'] = "User a/c not found";
    }
}
echo json_encode($data);
